<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include("../config/database.php");
require_once('../libs/twilio/autoload.php');

use Twilio\Rest\Client;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch applicant details
    $query = "SELECT * FROM applications WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $applicant = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($applicant) {
        $sid = 'AC65f7349095528b56abdfd5d9232336ba';
        $token = '9f88f31efe84852785dfa2eac0ff9f64';
        $twilio_number = '+12187577762';

        $client = new Client($sid, $token);

        $message = "Dear {$applicant['full_name']}, Congratulations! You have been admitted into the {$applicant['program']} program. Log in to the portal to download your admission letter.";

        try {
            $client->messages->create(
                $applicant['phone_number'],
                [
                    'from' => $twilio_number,
                    'body' => $message,
                ]
            );

            // Log success
            $logQuery = "INSERT INTO notification_logs (applicant_id, type, status, message) VALUES (:applicant_id, 'sms', 'success', :message)";
            $logStmt = $conn->prepare($logQuery);
            $logStmt->bindParam(':applicant_id', $id);
            $logStmt->bindParam(':message', $message);
            $logStmt->execute();

            echo "SMS sent successfully to {$applicant['phone_number']}.";
        } catch (Exception $e) {
            // Log failure
            $errorMessage = $e->getMessage();
            $logQuery = "INSERT INTO notification_logs (applicant_id, type, status, message) VALUES (:applicant_id, 'sms', 'failure', :message)";
            $logStmt = $conn->prepare($logQuery);
            $logStmt->bindParam(':applicant_id', $id);
            $logStmt->bindParam(':message', $errorMessage);
            $logStmt->execute();

            echo "Error: SMS could not be sent. Twilio Error: {$errorMessage}";
        }
    }
}
?>
