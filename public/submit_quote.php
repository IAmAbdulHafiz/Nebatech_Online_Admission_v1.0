<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $project = htmlspecialchars($_POST['project']);
    $budget = htmlspecialchars($_POST['budget']);
    $timeline = htmlspecialchars($_POST['timeline']);

    $to = "info@nebatech.com"; // Replace with your email address
    $subject = "New Quote Request from $name";
    $message = "
    <html>
    <head>
    <title>New Quote Request</title>
    </head>
    <body>
    <h2>New Quote Request</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Project Details:</strong> $project</p>
    <p><strong>Estimated Budget:</strong> $budget</p>
    <p><strong>Timeline:</strong> $timeline</p>
    </body>
    </html>
    ";

    // Set content-type header for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        header("Location: request-quote.php?success=1");
        exit();
    } else {
        echo "Error sending email.";
    }
} else {
    header("Location: request-quote.php");
    exit();
}
?>
