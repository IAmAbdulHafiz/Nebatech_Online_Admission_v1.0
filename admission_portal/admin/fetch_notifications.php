<?php
include("../config/database.php");
include("../includes/functions.php");

// Fetch new notifications
$query = "SELECT n.*, a.first_name, a.surname FROM notifications n 
          JOIN applicants a ON n.user_id = a.id 
          WHERE n.is_read = 0 
          ORDER BY n.created_at DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($notifications as $notification) {
    echo "<div class='alert alert-info'>
            <strong>New Notification:</strong> " . htmlspecialchars($notification['message']) . "
            <br><small>From: " . htmlspecialchars($notification['first_name'] . ' ' . $notification['surname']) . " at " . htmlspecialchars($notification['created_at']) . "</small>
          </div>";

    // Example usage of email and SMS alerts
    sendEmailAlert($notification['email'], "New Notification", $notification['message']);
    sendSmsAlert("+1234567890", "New Notification: " . $notification['message']);
}

// Mark notifications as read
$updateQuery = "UPDATE notifications SET is_read = 1 WHERE is_read = 0";
$conn->prepare($updateQuery)->execute();
?>