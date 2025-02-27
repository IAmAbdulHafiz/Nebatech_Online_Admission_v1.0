<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/notifications.php
include("../config/database.php");
include("../includes/functions.php");

// Fetch notification logs
$logQuery = "SELECT l.*, a.first_name, a.surname FROM notification_logs l 
             JOIN applicants a ON l.applicant_id = a.id 
             ORDER BY l.created_at DESC";
$logStmt = $conn->prepare($logQuery);
$logStmt->execute();
$logs = $logStmt->fetchAll(PDO::FETCH_ASSOC);

// Handle deleting a notification log
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_notification'])) {
    $log_id = $_POST['log_id'];

    // Delete notification log from the database
    $deleteQuery = "DELETE FROM notification_logs WHERE id = :log_id";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->execute([':log_id' => $log_id]);

    // Redirect to avoid resubmission
    header("Location: notifications.php");
    exit;
}
?>
<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Notifications</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to fetch new notifications
        function fetchNotifications() {
            $.ajax({
                url: 'fetch_notifications.php',
                method: 'GET',
                success: function(data) {
                    $('#notification-list').html(data);
                }
            });
        }

        // Fetch notifications every 10 seconds
        setInterval(fetchNotifications, 10000);
    </script>
    <style>
        body {
            padding-top: 100px;
            padding-bottom: 70px;
            background-color: #f4f6f9;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .content {
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
    <h2 class="text-center mb-4">Notifications</h2>

    <div class="card">
        <div class="card-body">
            <!-- Real-time Notifications -->
            <div id="notification-list"></div>

            <!-- Notification Logs -->
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Applicant Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logs as $log): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($log['id']); ?></td>
                                <td><?php echo htmlspecialchars($log['first_name'] . ' ' . $log['surname']); ?></td>
                                <td><?php echo htmlspecialchars($log['type']); ?></td>
                                <td><?php echo htmlspecialchars($log['status']); ?></td>
                                <td><?php echo htmlspecialchars($log['message']); ?></td>
                                <td><?php echo htmlspecialchars($log['created_at']); ?></td>
                                <td>
                                    <form action="notifications.php" method="POST" class="d-inline">
                                        <input type="hidden" name="log_id" value="<?php echo $log['id']; ?>">
                                        <button type="submit" name="delete_notification" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- End Notification Logs -->
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
</body>
</html>