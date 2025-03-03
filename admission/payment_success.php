<?php
session_start();

// Check if payment details exist, otherwise redirect to homepage
if (!isset($_SESSION['payment_details'])) {
    header("Location: admission.php"); 
    exit();
}

$paymentDetails = $_SESSION['payment_details'];
unset($_SESSION['payment_details']); // Clear session after displaying success message
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nebatech - Payment Successful</title>
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            text-align: center;
            padding-top: 50px;
        }
        .success-container {
            background: white;
            padding: 40px;
            border-radius: 0.5rem;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 550px;
            margin: auto;
        }
        .success-icon {
            font-size: 60px;
            color: #28a745;
            animation: pop 0.6s ease-in-out;
        }
        @keyframes pop {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .success-container h2 {
            color: #002060;
            font-weight: bold;
            margin-top: 15px;
        }
        .details {
            margin-top: 20px;
            text-align: left;
        }
        .details p {
            font-size: 16px;
            margin: 5px 0;
        }
        .btn-group {
            margin-top: 20px;
        }
        .btn-group a {
            display: block;
            margin: 10px 0;
            padding: 12px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
        }
        .btn-home {
            background: #002060;
            color: white;
        }
        .btn-dashboard {
            background: #ff6a00;
            color: white;
        }
        .btn-signup {
            background: #007bff;
            color: white;
        }
        .btn-home:hover, .btn-dashboard:hover, .btn-signup:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <div class="success-container">
        <i class="fas fa-check-circle success-icon"></i>
        <h2>Payment Successful!</h2>
        <p>Thank you for your payment. Below are the transaction details:</p>

        <div class="details">
            <p><strong>Transaction ID:</strong> <?php echo htmlspecialchars($paymentDetails['transaction_id']); ?></p>
            <p><strong>Amount Paid:</strong> GHS <?php echo number_format($paymentDetails['amount'], 2); ?></p>
            <p><strong>Payment Method:</strong> <?php echo strtoupper(htmlspecialchars($paymentDetails['payment_method'])); ?></p>
            <p><strong>Date:</strong> <?php echo date("F j, Y, g:i a", strtotime($paymentDetails['date'])); ?></p>
        </div>

        <div class="btn-group">
            <a href="index.php" class="btn-home"><i class="fas fa-home"></i> Back to Home</a>
            <a href="signup.php" class="btn-signup"><i class="fas fa-user-plus"></i> Continue to Sign Up</a>
        </div>
    </div>

</body>
</html>