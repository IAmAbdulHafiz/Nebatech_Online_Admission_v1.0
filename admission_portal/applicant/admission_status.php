<?php
session_start();
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];

// Fetch admission status from the database (example query)
include("../config/database.php");
$query = "SELECT status, remarks, updated_at FROM admission_status WHERE applicant_id = :applicant_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":applicant_id", $applicant['id']);
$stmt->execute();
$status = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Status</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
        .main-content {
            display: flex;
            flex: 1;
            margin-top: 70px; /* Adjusted for fixed header */
        }
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            margin-left: 250px; /* Adjusted for sidebar width */
        }
        .status-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .status-card h3 {
            margin-bottom: 20px;
        }
        .status-card p {
            margin-bottom: 10px;
        }
        .status-card .updated-at {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .status-card .remarks {
            margin-top: 20px;
        }
        .status-card .btn-success {
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 10px;
            }
            .main-content {
                margin-top: 60px; /* Adjusted for fixed header */
            }
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">
        <div class="content">
            <h2>Admission Status</h2>
            <p>Applicant: <strong><?php echo htmlspecialchars($applicant['first_name'] . ' ' . $applicant['surname']); ?></strong></p>
            <p>Serial Number: <strong><?php echo htmlspecialchars($applicant['serial_number']); ?></strong></p>

            <!-- Admission Status Section -->
            <div class="status-card mt-4">
                <h3>Status</h3>
                <?php if ($status): ?>
                    <p><strong><?php echo htmlspecialchars($status['status']); ?></strong></p>
                    <p class="updated-at">Last updated: <?php echo htmlspecialchars(date("F j, Y, g:i a", strtotime($status['updated_at']))); ?></p>
                    <div class="remarks">
                        <h5>Remarks:</h5>
                        <p><?php echo htmlspecialchars($status['remarks']); ?></p>
                    </div>
                    <?php if ($status['status'] === 'Approved'): ?>
                        <a href="print_admission_letter.php" class="btn btn-success">Download Admission Letter</a>
                    <?php endif; ?>
                <?php else: ?>
                    <p><strong>Status not available</strong></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>