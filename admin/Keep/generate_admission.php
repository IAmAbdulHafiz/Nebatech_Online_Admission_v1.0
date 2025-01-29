<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

// Ensure 'id' key is defined
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: Applicant ID not provided.");
}

$applicant_id = $_GET['id'];

// Fetch applicant details
$query = "
    SELECT 
        a.id AS applicant_id, 
        pi.first_name, pi.middle_name, pi.last_name, pi.email, pi.phone_number, 
        ps.program_name, ps.program_fee, 
        s.status 
    FROM applicants a
    LEFT JOIN personal_information pi ON a.id = pi.application_id
    LEFT JOIN program_selections ps ON a.id = ps.application_id AND ps.choice_number = 1
    LEFT JOIN admission_status s ON a.id = s.applicant_id
    WHERE a.id = :id
";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $applicant_id, PDO::PARAM_INT);
$stmt->execute();
$applicant = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$applicant) {
    die("Error: Applicant not found.");
}

// Generate admission letter content
$content = "
    <h1>Admission Letter</h1>
    <p>Dear " . htmlspecialchars($applicant['first_name'] . ' ' . $applicant['middle_name'] . ' ' . $applicant['last_name']) . ",</p>
    <p>We are pleased to inform you that you have been accepted into the " . htmlspecialchars($applicant['program_name']) . " program.</p>
    <p>Program Fee: " . htmlspecialchars($applicant['program_fee']) . "</p>
    <p>Status: " . htmlspecialchars($applicant['status']) . "</p>
    <p>Admissions Office</p>
";

// Use a library like FPDF or Dompdf to generate PDF
require_once '../libs/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($content);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("admission_letter_{$applicant['applicant_id']}.pdf");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Admission Letter</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            padding-top: 70px; /* Height of the fixed header */
            padding-bottom: 70px; /* Height of the fixed footer */
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 70px; /* Height of the fixed header */
            bottom: 70px; /* Height of the fixed footer */
            left: 0;
            background-color: #FFA500;
            padding-top: 20px;
            overflow-y: auto;
        }
        .content {
            margin-left: 250px; /* Width of the sidebar */
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Generate Admission Letter</h2>
        <p>Generating admission letter for <?php echo htmlspecialchars($applicant['first_name'] . ' ' . $applicant['middle_name'] . ' ' . $applicant['last_name']); ?>...</p>
    </div>

    <?php include("../includes/footer.php"); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>