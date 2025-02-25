<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];

// Include database connection
include('../config/database.php');

// Set a default application status.
// Alternatively, if your applicants table has an application_status column, use that.
// Example:
// $stmt = $conn->prepare("SELECT application_status FROM applicants WHERE id = ?");
// $stmt->execute([$applicant['id']]);
// $applicationStatus = $stmt->fetchColumn();
$applicationStatus = 'Not Started';

// Fetch notifications from the database
$stmt = $conn->prepare("SELECT * FROM notifications WHERE user_id = ? AND is_read = 0 ORDER BY created_at DESC");
$stmt->execute([$applicant['id']]);
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
$unreadCount = count($notifications);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .content {
            max-width: 1200px;
            margin-left: 250px; /* Width of the sidebar */
            margin-right: auto;
        }
        .card {
            margin-bottom: 20px;
        }
        .progress-bar-container {
            margin-top: 10px;
        }
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            border-radius: 50%;
            background-color: #dc3545;
            color: white;
            font-size: 0.75rem;
            width: 20px;
            height: 20px;
            text-align: center;
        }
        @media (max-width: 768px) {  
            .content {
                margin-left: 0;
                padding: 10px;
            }
            .content h2 {
                font-size: 1.5rem;
            }
            .content p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include("../includes/header.php"); ?>
    <?php include("../includes/sidebar.php"); ?>

    <div class="main-content">
        <div class="content">
            <h2>Welcome, <?= htmlspecialchars($applicant['first_name'] . ' ' . $applicant['surname']) ?></h2>
            <p>Serial Number: <strong><?= htmlspecialchars($applicant['serial_number']) ?></strong></p>

            <!-- Application Progress -->
            <div class="mt-4 py-4">
                <h3>Your Application</h3>
                <div class="progress-bar-container">
                    <strong>Current Status:</strong>
                    <div class="progress" style="height: 30px;">
                        <div class="progress-bar" role="progressbar" style="width: <?= $applicationStatus === 'Pending' ? '50%' : ($applicationStatus === 'Approved' ? '100%' : '0%') ?>;" aria-valuenow="<?= $applicationStatus === 'Pending' ? '50' : ($applicationStatus === 'Approved' ? '100' : '0') ?>" aria-valuemin="0" aria-valuemax="100">
                            <?= $applicationStatus === 'Pending' ? '50%' : ($applicationStatus === 'Approved' ? '100%' : '0%') ?>
                        </div>
                    </div>
                </div>
                <p>Status: <strong><?= htmlspecialchars($applicationStatus) ?></strong></p>
                <?php if ($applicationStatus === 'Not Started'): ?>
                    <a href="personal_info.php" class="btn btn-primary">Start Application</a>
                <?php endif; ?>
                <?php if ($applicationStatus === 'Pending' || $applicationStatus === 'Approved'): ?>
                    <a href="view_application.php" class="btn btn-info">View Application</a>
                <?php endif; ?>
            </div>

            <!-- Quick Links Section -->
            <div class="mt-4">
                <h3>Quick Links</h3>
                <div class="row">
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-file-earmark-text-fill" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-2">View Application</h5>
                                <a href="view_application.php" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-clipboard-check-fill" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-2">Admission Status</h5>
                                <a href="admission_status.php" class="btn btn-primary">Check Status</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-printer-fill" style="font-size: 2rem;"></i>
                                <h5 class="card-title mt-2">Print Admission Letter</h5>
                                <a href="print_admission_letter.php" class="btn btn-primary">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications Section -->
            <div class="mt-4 py-4">
                <h3>Notifications</h3>
                <div class="position-relative">
                    <div class="card">
                        <div class="card-body">
                            <i class="bi bi-bell-fill" style="font-size: 2rem;"></i>
                            <h5 class="card-title mt-2">New Updates</h5>
                            <p class="card-text">You have <?= $unreadCount ?> new updates regarding your application process.</p>
                            <a href="notifications.php" class="btn btn-warning">View All</a>
                            <?php if ($unreadCount > 0): ?>
                                <span class="notification-badge"><?= $unreadCount ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>