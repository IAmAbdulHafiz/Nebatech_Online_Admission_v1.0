<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEBATECH - Payment Form</title>
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            padding-top: 70px;
            padding-bottom: 60px;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-primary {
            background: #ff6a00;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            padding: 12px;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: #e55c00;
        }
        .alert {
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include("includes/header.php"); ?>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center" style="color: #002060;">Payment Form</h2>
                        <p class="text-center">Application Fee: <b>GH₵100</b></p>
                        <p class="text-center">Fill the form below to complete your payment</p>

                        <?php if (!empty($_SESSION['error_message'])) : ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
                        <?php endif; ?>

                        <form method="POST" action="api/hubtel_payment.php">
                            <div class="mb-3">
                                <label><i class="fas fa-user"></i> Full Name:</label>
                                <input type="text" name="customer_name" class="form-control" placeholder="Enter full name" required>
                            </div>
                            <div class="mb-3">
                                <label><i class="fas fa-envelope"></i> Email:</label>
                                <input type="email" name="customer_email" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                <label><i class="fas fa-phone"></i> Phone Number (For Serial & PIN):</label>
                                <input type="text" name="customer_phone" class="form-control" placeholder="Enter phone number" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-money-check-alt"></i> Pay with Hubtel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
