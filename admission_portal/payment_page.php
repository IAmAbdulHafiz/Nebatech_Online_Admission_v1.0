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
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            padding-top: 70px;
            padding-bottom: 60px;
        }
        .container {
            max-width: 800px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #002060;
            color: #fff;
            border-radius: 15px 15px 0 0;
            text-align: center;
            padding: 20px;
            font-size: 24px;
        }
        iframe {
            width: 100%;
            height: 600px;
            border: none;
            border-radius: 0 0 15px 15px;
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include("includes/header.php"); ?>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                Complete Your Payment
            </div>
            <div class="card-body">
                <iframe src="<?php echo htmlspecialchars($checkoutUrl); ?>"></iframe>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include("../includes/footer_public.php"); ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
