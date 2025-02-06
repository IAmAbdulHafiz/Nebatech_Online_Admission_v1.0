<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Portal</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <!-- Include Header -->
    <?php include("includes/header.php"); ?>

    <div class="container mt-5">
        <h2 class="text-center">Pay for Admission Form</h2>

        <?php if (!empty($_SESSION['success_message'])) : ?>
            <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error_message'])) : ?>
            <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
        <?php endif; ?>

        <form method="POST" action="../api/hubtel_payment.php">
            <div class="mb-3">
                <label>Full Name:</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="customer_email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phone Number:</label>
                <input type="text" name="customer_phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Mobile Money Provider:</label>
                <select name="channel" class="form-control">
                    <option value="mtn-gh">MTN</option>
                    <option value="vodafone-gh">Vodafone</option>
                    <option value="tigo-gh">AirtelTigo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Pay with Hubtel</button>
        </form>
    </div>
    <!-- Include Footer -->
    <?php include("includes/footer.php"); ?>
</body>
</html>