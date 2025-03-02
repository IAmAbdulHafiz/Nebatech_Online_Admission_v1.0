<?php
// filepath: /c:/xampp/htdocs/GitHub/online-admission-system/includes/functions.php

require_once '../vendor/autoload.php';
use Twilio\Rest\Client;


if (!function_exists('addNotification')) {
    function addNotification($user_id, $message) {
        global $conn;
        $query = "INSERT INTO notifications (user_id, message, status, created_at) VALUES (:user_id, :message, 'unread', NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->execute();
    }
}

if (!function_exists('fetchNotifications')) {
    function fetchNotifications($user_id) {
        global $conn;
        $query = "SELECT * FROM notifications WHERE user_id = :user_id AND is_read = 0 ORDER BY created_at DESC";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
function addNotificationLog($applicant_id, $type, $status, $message) {
    var_dump($applicant_id); // Ensure this outputs an integer
    global $conn;
    $query = "INSERT INTO notification_logs (applicant_id, type, status, message, created_at) VALUES (:applicant_id, :type, :status, :message, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':applicant_id', $applicant_id, PDO::PARAM_INT);
    $stmt->bindParam(':type', $type, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);
    $stmt->execute();
}

if (!function_exists('addNotificationLog')) {
    function addNotificationLog($applicant_id, $type, $status, $message) {
        global $conn;
        $query = "INSERT INTO notification_logs (applicant_id, type, status, message, created_at) VALUES (:applicant_id, :type, :status, :message, NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':applicant_id', $applicant_id, PDO::PARAM_INT);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->execute();
    }
}

// Function to send email alert
if (!function_exists('sendEmailAlert')) {
    function sendEmailAlert($to, $subject, $message) {
        $headers = "From: no-reply@yourdomain.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        mail($to, $subject, $message, $headers);
    }
}

// Function to send SMS alert
if (!function_exists('sendSmsAlert')) {
    function sendSmsAlert($to, $message) {
        $sid = 'your_twilio_sid';
        $token = 'your_twilio_token';
        $client = new Client($sid, $token);

        $client->messages->create(
            $to,
            [
                'from' => 'your_twilio_number',
                'body' => $message
            ]
        );
    }
}

function logAction($user_id, $action, $details = null) {
    global $conn;
    $query = "INSERT INTO logs (user_id, action, details) VALUES (:user_id, :action, :details)";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':user_id' => $user_id,
        ':action' => $action,
        ':details' => $details
    ]);
}
?>