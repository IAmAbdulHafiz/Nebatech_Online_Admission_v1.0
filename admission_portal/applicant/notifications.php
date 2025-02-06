<?php
session_start();
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];

// Include database connection
include('../config/database.php');

// Fetch all notifications from the database
$stmt = $conn->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$applicant['id']]);
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mark all notifications as read
$stmt = $conn->prepare("UPDATE notifications SET is_read = 1 WHERE user_id = ?");
$stmt->execute([$applicant['id']]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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
            justify-content: center;
            align-items: center;
            margin-top: 10vh;
            margin-bottom: 10vh;
        }
        .content {
            flex: 1;
            padding: 20px;
            max-width: 800px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .notification-card {
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .notification-card h5 {
            margin-bottom: 10px;
        }
        .notification-card p {
            margin-bottom: 5px;
        }
        .notification-card .timestamp {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">
        <div class="content">
            <h3>Notifications</h3>
            <?php if (count($notifications) > 0): ?>
                <?php foreach ($notifications as $notification): ?>
                    <div class="notification-card">
                        <h5>New Update</h5>
                        <p><?= htmlspecialchars($notification['message']) ?></p>
                        <p class="timestamp"><?= htmlspecialchars(date("F j, Y, g:i a", strtotime($notification['created_at']))) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No new notifications.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
