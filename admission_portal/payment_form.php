<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Portal</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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
        }
        .payment-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
        }
        .payment-card h2 {
            text-align: center;
            color: #002060;
            font-weight: bold;
            margin-bottom: 20px;
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

    <div class="payment-container">
        <div class="payment-card">
            <h2><i class="fas fa-credit-card"></i> Pay for Admission Form</h2>

            <?php if (!empty($_SESSION['success_message'])) : ?>
                <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
            <?php endif; ?>

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
                    <label><i class="fas fa-mobile-alt"></i> Mobile Money Number:</label>
                    <input type="text" name="payment_phone" class="form-control" placeholder="Enter payment number" required>
                </div>
                <div class="mb-3">
                    <label><i class="fas fa-wallet"></i> Mobile Money Provider:</label>
                    <select name="channel" class="form-control" required>
                        <option value="mtn-gh">MTN</option>
                        <option value="vodafone-gh">Vodafone</option>
                        <option value="tigo-gh">AirtelTigo</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-money-check-alt"></i> Pay with Hubtel
                </button>
            </form>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include("../includes/public_footer.php"); ?>

</body>
</html>
