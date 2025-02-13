<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $project = htmlspecialchars($_POST['project']);
    $budget = htmlspecialchars($_POST['budget']);
    $timeline = htmlspecialchars($_POST['timeline']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Prepare email content
    $to = "info@nebatech.com";
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

    // Additional headers
    $headers .= "From: <$email>" . "\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Quote request sent successfully.";
    } else {
        echo "Failed to send quote request.";
    }
} else {
    echo "Invalid request method.";
}
?>
