<?php
session_start();
if (!isset($_SESSION['checkout_url'])) {
    header("Location: payment_form.php");
    exit();
}
$checkoutUrl = $_SESSION['checkout_url'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Payment</title>
    <style>
        iframe {
            width: 100%;
            height: 600px;
            border: none;
        }
    </style>
</head>
<body>
    <h2>Complete Your Payment</h2>
    <iframe src="<?php echo htmlspecialchars($checkoutUrl); ?>"></iframe>
</body>
</html>
