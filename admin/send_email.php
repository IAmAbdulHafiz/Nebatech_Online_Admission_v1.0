<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include("../config/database.php");
require_once('../libs/phpmailer/PHPMailer.php');
require_once('../libs/phpmailer/SMTP.php');
require_once('../libs/phpmailer/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch applicant details
    $query = "SELECT * FROM applications WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $applicant = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($applicant) {
        $subject = "Your Admission Letter";
        $body = "
            Dear {$applicant['full_name']},<br><br>
            Congratulations! You have been admitted into the {$applicant['program']} program.<br>
            Please log in to the admission portal to download your admission letter.<br><br>
            Best regards,<br>
            Admissions Office
        ";

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.titan.email';
            $mail->SMTPAuth = true;
            $mail->Username = 'admissions@nebatech.com';
            $mail->Password = 'AbdulP@$$w0r_D';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('admissions@nebatech.com', 'Admissions Office');
            $mail->addAddress($applicant['email']);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();

            // Log success
            $logQuery = "INSERT INTO notification_logs (applicant_id, type, status, message) VALUES (:applicant_id, 'email', 'success', :message)";
            $logStmt = $conn->prepare($logQuery);
            $logStmt->bindParam(':applicant_id', $id);
            $logStmt->bindParam(':message', $body);
            $logStmt->execute();

            echo "Email sent successfully to {$applicant['email']}.";
        } catch (Exception $e) {
            // Log failure
            $errorMessage = $e->getMessage();
            $logQuery = "INSERT INTO notification_logs (applicant_id, type, status, message) VALUES (:applicant_id, 'email', 'failure', :message)";
            $logStmt = $conn->prepare($logQuery);
            $logStmt->bindParam(':applicant_id', $id);
            $logStmt->bindParam(':message', $errorMessage);
            $logStmt->execute();

            echo "Error: Email could not be sent. Mailer Error: {$errorMessage}";
        }
    }
}
?>

