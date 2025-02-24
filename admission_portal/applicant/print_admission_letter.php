<?php
session_start();
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];

// Include database connection
include('../config/database.php');

// Fetch the admission status and details from the database
$stmt = $conn->prepare("SELECT * FROM admission_status WHERE applicant_id = ?");
$stmt->execute([$applicant['id']]);
$admissionStatus = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$admissionStatus || $admissionStatus['status'] !== 'Approved') {
    header("Location: no_approved_admission.php");
    exit();
}

// Fetch the applicant's personal information
$stmt = $conn->prepare("SELECT * FROM personal_information WHERE application_id = (SELECT id FROM applications WHERE user_id = ?)");
$stmt->execute([$applicant['id']]);
$personalInfo = $stmt->fetch(PDO::FETCH_ASSOC);

// Generate QR code data
$qrData = "Applicant: " . htmlspecialchars($personalInfo['first_name'] . ' ' . $personalInfo['last_name']) . "\nProgram: " . htmlspecialchars($admissionStatus['program']) . "\nStart Date: " . htmlspecialchars($admissionStatus['start_date']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Admission Letter</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 70px; /* Height of the fixed header */
            padding-bottom: 70px; /* Height of the fixed footer */
        }

        .content {
            margin-left: 270px; /* Width of the sidebar */
            padding: 20px;
            height: calc(100vh - 140px); /* Full height minus header and footer */
            overflow-y: auto;
        }
        .card {
            margin-bottom: 50px;
        }
        .img-thumbnail {
            max-width: 150px;
        }
        .admission-letter {
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    <div class="content mt-5">
        <h2 class="mb-3 text-center">Admission Letter</h2>
        <div class="admission-letter" id="admissionLetter">
            <h3 class="text-center">Nebatech Software Solutions</h3>
            <h4 class="text-center">Admission Letter</h4>
            <p>Date: <?= date('Y-m-d') ?></p>
            <p>Dear <?= htmlspecialchars($personalInfo['first_name'] . ' ' . $personalInfo['last_name']) ?>,</p>
            <p>We are pleased to inform you that you have been admitted to Nebatech Software Solutions for the <?= htmlspecialchars($admissionStatus['program']) ?> program.</p>
            <p>Please find below your admission details:</p>
            <ul>
                <li><strong>Program:</strong> <?= htmlspecialchars($admissionStatus['program']) ?></li>
                <li><strong>Start Date:</strong> <?= htmlspecialchars($admissionStatus['start_date']) ?></li>
                <li><strong>Duration:</strong> <?= htmlspecialchars($admissionStatus['duration']) ?></li>
                <li><strong>Remarks:</strong> <?= htmlspecialchars($admissionStatus['remarks']) ?></li>
            </ul>
            <p>We look forward to welcoming you to our institution.</p>
            <p>Sincerely,</p>
            <p><strong>Nebatech Software Solutions</strong></p>
            <div class="qr-code">
                <canvas id="qrCode"></canvas>
            </div>
        </div>
        <div class="text-center mt-4">
            <button onclick="window.print()" class="btn btn-primary">Print Admission Letter</button>
            <button onclick="downloadPDF()" class="btn btn-success">Download as PDF</button>
        </div>
    </div>
    <?php include("../includes/footer.php"); ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script>
        // Generate QR code
        var qr = new QRious({
            element: document.getElementById('qrCode'),
            value: `<?= $qrData ?>`,
            size: 150
        });

        // Download admission letter as PDF
        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.fromHTML(document.getElementById('admissionLetter'), 15, 15, {
                'width': 170
            });
            doc.save('admission_letter.pdf');
        }
    </script>
</body>
</html>
