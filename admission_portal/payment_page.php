<?php
session_start();
if (!isset($_SESSION['checkout_url'])) {
    header("Location: payment_form.php");
    exit();
}
$checkoutUrl = htmlspecialchars($_SESSION['checkout_url']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Payment</title>
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .payment-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .payment-card {
            background: white;
            padding-top: 100px;
            border-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 550px;
            width: 100%;
            text-align: center;
        }
        .payment-card h2 {
            color: #002060;
            font-weight: bold;
        }
        iframe {
            width: 100%;
            height: 450px;
            border: none;
            border-radius: 8px;
            margin-top: 10px;
        }
        .btn-reload {
            background: #ff6a00;
            border: none;
            padding: 12px;
            width: 100%;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            margin-top: 10px;
            transition: 0.3s;
        }
        .btn-reload:hover {
            background: #e55c00;
        }
    </style>
</head>
<body>

    <!-- Include Header -->
    <?php include("includes/header.php"); ?>

    <div class="payment-container">
        <div class="payment-card">
            <h2><i class="fas fa-credit-card"></i> Complete Your Payment</h2>
            <p>Please complete your payment through the secured checkout page below.</p>

            <iframe id="paymentIframe" src="<?php echo $checkoutUrl; ?>"></iframe>

            <button class="btn-reload" onclick="reloadIframe()">
                <i class="fas fa-sync-alt"></i> Reload Payment Page
            </button>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include("includes/footer_public.php"); ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function reloadIframe() {
            document.getElementById('paymentIframe').src = '<?php echo $checkoutUrl; ?>';
        }
    </script>

</body>
</html>