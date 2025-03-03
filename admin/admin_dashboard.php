<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/admin_dashboard.php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

// Fetch quick stats
$total_applicants_query = "SELECT COUNT(*) AS total FROM applications";
$total_accepted_query = "SELECT COUNT(*) AS total FROM applications WHERE application_status = 'accepted'";
$total_rejected_query = "SELECT COUNT(*) AS total FROM applications WHERE application_status = 'rejected'";
$total_pending_query = "SELECT COUNT(*) AS total FROM applications WHERE application_status = 'pending'";
$total_notifications_query = "SELECT COUNT(*) AS total FROM notifications WHERE is_read = 0";

$total_applicants = $conn->query($total_applicants_query)->fetchColumn();
$total_accepted = $conn->query($total_accepted_query)->fetchColumn();
$total_rejected = $conn->query($total_rejected_query)->fetchColumn();
$total_pending = $conn->query($total_pending_query)->fetchColumn();
$total_notifications = $conn->query($total_notifications_query)->fetchColumn();

// Fetch recent activities
$recent_activities_query = "
    SELECT a.application_status, a.created_at, p.first_name, p.middle_name, p.last_name 
    FROM applications a
    JOIN personal_information p ON a.id = p.application_id
    ORDER BY a.created_at DESC LIMIT 5";
$recent_activities = $conn->query($recent_activities_query)->fetchAll(PDO::FETCH_ASSOC);

// Fetch data for charts
$monthly_signups_query = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS total FROM users GROUP BY month ORDER BY month DESC LIMIT 12";
$monthly_signups = $conn->query($monthly_signups_query)->fetchAll(PDO::FETCH_ASSOC);

$monthly_admissions_query = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS total FROM applications WHERE application_status = 'accepted' GROUP BY month ORDER BY month DESC LIMIT 12";
$monthly_admissions = $conn->query($monthly_admissions_query)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            padding-top: 100px;
            padding-bottom: 70px;
            background-color: #f4f6f9;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .content{
            margin-left: 250px;
            overflow-y: auto;
            width: auto;
        }
        .table-action-btn {
            padding: 5px 10px;
            font-size: 14px;
        }
        .table-action-btn i {
            margin-right: 5px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
            margin-left: 250px;
        }
        /* Responsive layout for mobile screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .content {
                margin-left: 250px;
            }
        }
        .notification {
            position: relative;
        }
        .notification .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            padding: 5px 10px;
            border-radius: 50%;
            background-color: red;
            color: white;
        }
        .chart-container {
            margin-top: 30px;
        }
        .chart-container canvas {
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Admin Dashboard</h2>
        <div class="row">
            <!-- Total Applicants Card with Icon -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users"></i> Total Applicants</h5>
                        <p class="card-text"><?php echo $total_applicants; ?></p>
                    </div>
                </div>
            </div>

            <!-- Accepted Applicants Card with Icon -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-check-circle"></i> Accepted Applicants</h5>
                        <p class="card-text"><?php echo $total_accepted; ?></p>
                    </div>
                </div>
            </div>

            <!-- Rejected Applicants Card with Icon -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-times-circle"></i> Rejected Applicants</h5>
                        <p class="card-text"><?php echo $total_rejected; ?></p>
                    </div>
                </div>
            </div>

            <!-- Pending Applicants Card with Icon -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-hourglass-half"></i> Pending Applicants</h5>
                        <p class="card-text"><?php echo $total_pending; ?></p>
                    </div>
                </div>
            </div>

            <!-- Notifications Card with Icon -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-bell"></i> Notifications</h5>
                        <p class="card-text"><?php echo $total_notifications; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-history"></i> Recent Activities</h5>
                <ul class="list-group">
                    <?php foreach ($recent_activities as $activity): ?>
                        <li class="list-group-item">
                            <?php echo htmlspecialchars($activity['first_name'] . ' ' . $activity['middle_name'] . ' ' . $activity['last_name']); ?> - <?php echo htmlspecialchars($activity['application_status']); ?> - <?php echo htmlspecialchars($activity['created_at']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Charts -->
        <div class="chart-container">
            <canvas id="signupsChart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="admissionsChart"></canvas>
        </div>
    </div>

    <script>
        // Monthly Signups Chart
        const signupsCtx = document.getElementById('signupsChart').getContext('2d');
        const signupsChart = new Chart(signupsCtx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(array_column($monthly_signups, 'month')); ?>,
                datasets: [{
                    label: 'Monthly Signups',
                    data: <?php echo json_encode(array_column($monthly_signups, 'total')); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Monthly Admissions Chart
        const admissionsCtx = document.getElementById('admissionsChart').getContext('2d');
        const admissionsChart = new Chart(admissionsCtx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(array_column($monthly_admissions, 'month')); ?>,
                datasets: [{
                    label: 'Monthly Admissions',
                    data: <?php echo json_encode(array_column($monthly_admissions, 'total')); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>