<?php
session_start();
include("config/database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM applicants WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));

        // Store the token in the database with an expiration time
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
        $stmt->execute([$email, $token]);

        // Send the reset link to the user's email
        $resetLink = "http://nebatech.com/reset_password_confirm.php?token=" . $token;
        mail($email, "Password Reset Request", "Click the link to reset your password: " . $resetLink);

        $success = "A password reset link has been sent to your email.";
    } else {
        $error = "No account found with that email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - NTSS</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #002060, #0056b3);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .reset-container {
            background: #fff;
            color: #333;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        .reset-container h3 {
            color: #002060;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-primary {
            background-color: #002060;
            border-color: #002060;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-text {
            color: #666;
            font-size: 0.9rem;
        }

        .reset-footer {
            text-align: center;
            margin-top: 10px;
        }

        .reset-footer a {
            color: #0056b3;
            text-decoration: none;
        }

        .reset-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include("includes/public_header.php"); ?>
    <!-- Reset Password Form -->
    <div class="reset-container">
        <h3>Reset Your Password</h3>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form method="POST" action="reset_password.php">
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
        </form>

        <!-- Footer Links -->
        <div class="reset-footer mt-3">
            <p>Remembered your password? <a href="login.php">Login</a></p>
        </div>
    </div>
    <?php include("includes/public_footer.php"); ?>
    <!-- Include Bootstrap Bundle and jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
