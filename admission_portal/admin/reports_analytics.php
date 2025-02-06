<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/reports_analytics.php
include("../config/database.php");

// Fetch application statistics
$appStatsQuery = "SELECT COUNT(*) AS total_applications, 
                         SUM(CASE WHEN application_status = 'Accepted' THEN 1 ELSE 0 END) AS accepted_applications,
                         SUM(CASE WHEN application_status = 'Rejected' THEN 1 ELSE 0 END) AS rejected_applications
                  FROM applications";
$appStatsStmt = $conn->prepare($appStatsQuery);
$appStatsStmt->execute();
$appStats = $appStatsStmt->fetch(PDO::FETCH_ASSOC);

// Fetch user activity
$userActivityQuery = "SELECT DATE(created_at) AS date, COUNT(*) AS signups 
                      FROM users 
                      GROUP BY DATE(created_at)";
$userActivityStmt = $conn->prepare($userActivityQuery);
$userActivityStmt->execute();
$userActivity = $userActivityStmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch admission rates
$admissionRatesQuery = "SELECT DATE(created_at) AS date, 
                               SUM(CASE WHEN application_status = 'Accepted' THEN 1 ELSE 0 END) AS accepted,
                               SUM(CASE WHEN application_status = 'Rejected' THEN 1 ELSE 0 END) AS rejected
                        FROM applications 
                        GROUP BY DATE(created_at)";
$admissionRatesStmt = $conn->prepare($admissionRatesQuery);
$admissionRatesStmt->execute();
$admissionRates = $admissionRatesStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Reports & Analytics</title>
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
    </style>
</head>
<body>

<div class="content">
    <h2 class="text-center mb-4">Reports & Analytics</h2>

    <div class="card">
        <div class="card-body">
            <!-- Application Statistics -->
            <h4>Application Statistics</h4>
            <p>Total Applications: <?php echo $appStats['total_applications']; ?></p>
            <p>Accepted Applications: <?php echo $appStats['accepted_applications']; ?></p>
            <p>Rejected Applications: <?php echo $appStats['rejected_applications']; ?></p>

            <!-- User Activity Chart -->
            <h4>User Activity</h4>
            <canvas id="userActivityChart"></canvas>

            <!-- Admission Rates Chart -->
            <h4>Admission Rates</h4>
            <canvas id="admissionRatesChart"></canvas>
        </div>
    </div>
</div>

<script>
    // User Activity Chart
    var userActivityCtx = document.getElementById('userActivityChart').getContext('2d');
    var userActivityChart = new Chart(userActivityCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode(array_column($userActivity, 'date')); ?>,
            datasets: [{
                label: 'Signups',
                data: <?php echo json_encode(array_column($userActivity, 'signups')); ?>,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'day'
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Admission Rates Chart
    var admissionRatesCtx = document.getElementById('admissionRatesChart').getContext('2d');
    var admissionRatesChart = new Chart(admissionRatesCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($admissionRates, 'date')); ?>,
            datasets: [{
                label: 'Accepted',
                data: <?php echo json_encode(array_column($admissionRates, 'accepted')); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }, {
                label: 'Rejected',
                data: <?php echo json_encode(array_column($admissionRates, 'rejected')); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'day'
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>