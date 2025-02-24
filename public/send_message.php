<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Example: Send email (requires proper server configuration)
    $to = "info@nebatech.com";
    $headers = "From: $email\r\n";
    $emailBody = "Name: $name\nEmail: $email\n\n$message";

    if (mail($to, $subject, $emailBody, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Failed to send your message. Please try again later.";
    }
}
?>
