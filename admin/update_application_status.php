<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

include("../config/database.php");

// Ensure 'id' key is defined
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: Applicant ID not provided.");
}

$applicant_id = $_GET['id'];

// Fetch applicant details
$query = "
    SELECT 
        a.id AS applicant_id, 
        pi.first_name, pi.middle_name, pi.last_name, 
        s.status, s.remarks 
    FROM applicants a
    LEFT JOIN personal_information pi ON a.id = pi.applicant_id
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    // Check if the applicant_id exists in the admission_status table
    $check_query = "SELECT COUNT(*) FROM admission_status WHERE applicant_id = :id";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bindParam(':id', $applicant_id, PDO::PARAM_INT);
    $check_stmt->execute();
    $exists = $check_stmt->fetchColumn();

    if ($exists) {
        // Update existing record
        $update_query = "
            UPDATE admission_status 
            SET status = :status, remarks = :remarks 
            WHERE applicant_id = :id
        ";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $update_stmt->bindParam(':remarks', $remarks, PDO::PARAM_STR);
        $update_stmt->bindParam(':id', $applicant_id, PDO::PARAM_INT);
        $update_stmt->execute();
    } else {
        // Insert new record
        $insert_query = "
            INSERT INTO admission_status (applicant_id, status, remarks) 
            VALUES (:id, :status, :remarks)
        ";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bindParam(':id', $applicant_id, PDO::PARAM_INT);
        $insert_stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $insert_stmt->bindParam(':remarks', $remarks, PDO::PARAM_STR);
        $insert_stmt->execute();
    }

    header("Location: manage_applicants.php");
    exit();
}

include("../includes/header.php");
include("../includes/sidebar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Applicant Status</title>
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
        .form-control:disabled, .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
        }
        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title text-center">Update Applicant Status</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" value="<?php echo htmlspecialchars($applicant['first_name'] . ' ' . $applicant['middle_name'] . ' ' . $applicant['last_name']); ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="Pending" <?php echo $applicant['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="Accepted" <?php echo $applicant['status'] == 'Accepted' ? 'selected' : ''; ?>>Accepted</option>
                            <option value="Rejected" <?php echo $applicant['status'] == 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea id="remarks" name="remarks" class="form-control" rows="4"><?php echo htmlspecialchars($applicant['remarks']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>

    <?php include("../includes/footer.php"); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>