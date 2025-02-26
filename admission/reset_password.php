<?php
session_start();
include("../config/database.php");

// Initialize messages
$msg = "";
$error = "";

// If the form is submitted via POST:
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Phase 1: Processing email submission to request a password reset.
    if (isset($_POST['email'])) {
        $email = trim($_POST['email']);

        // Check if the email exists in the applicants table.
        $stmt = $conn->prepare("SELECT * FROM applicants WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Generate a reset token.
            $token = bin2hex(random_bytes(16));

            // Update the applicant record with the reset token.
            $stmt = $conn->prepare("UPDATE applicants SET reset_token = :token WHERE email = :email");
            $stmt->execute(['token' => $token, 'email' => $email]);

            // Create a reset link.
            $resetLink = "https://admissions.nebatech.com/admission/reset_password.php?token=" . $token;

            // Send the reset link via email. (This is a basic example using mail().)
            $subject = "Password Reset Request - Nebatech Admissions";
            $message = "Hello,
            
            We received a request to reset the password for your Nebatech Admissions account.
            
            If you initiated this request, please click the link below to reset your password:
            " . $resetLink . "
            
            Please note:
            - This reset link is valid for 30 minutes only.
            - If you do not reset your password within this time, you will need to request a new password reset.
            
            If you did not request a password reset, please ignore this email or contact our support team immediately at support@nebatech.com.
            
            Thank you,
            Nebatech Admissions Team";
            $headers = "From: no-reply@nebatech.com\r\n";
            

            if (mail($email, $subject, $message, $headers)) {
                $msg = "An email has been sent to your address with instructions to reset your password.";
            } else {
                $error = "Failed to send reset email. Please try again later.";
            }
        } else {
            $error = "No account found with that email.";
        }
    }
    // Phase 2: Processing new password submission (when a token is provided).
    elseif (isset($_POST['new_password'], $_POST['confirm_password'], $_POST['token'])) {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $token = $_POST['token'];

        if ($new_password !== $confirm_password) {
            $error = "Passwords do not match.";
        } else {
            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE applicants SET password = :password, reset_token = NULL WHERE reset_token = :token");
            if ($stmt->execute(['password' => $hashedPassword, 'token' => $token])) {
                $msg = "Your password has been reset successfully. You will be redirected to the login page in 5 seconds.";
                header("Refresh:5; url=login.php");
            } else {
                $error = "Failed to update the password. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password - Nebatech Admission Portal</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <style>
    .reset-container {
      background: #fff;
      margin: 4rem auto;
      padding: 30px;
      border-radius: 0.5rem;
      max-width: 500px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .reset-container h3 {
      text-align: center;
      color: #002060;
      margin-bottom: 20px;
    }
    .form-control {
      margin-bottom: 15px;
    }
    .alert {
      text-align: center;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <?php include 'includes/header_login_register.php'; ?>
  <div class="container">
    <div class="reset-container">
      <?php if ($msg): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($msg); ?></div>
      <?php endif; ?>
      <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>

      <?php if (!isset($_GET['token'])): ?>
        <!-- Phase 1: Email submission form -->
        <h3>Reset Password</h3>
        <form action="reset_password.php" method="POST">
          <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
          <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
        </form>
      <?php else: ?>
        <!-- Phase 2: New password form -->
        <?php $token = $_GET['token']; ?>
        <h3>Set New Password</h3>
        <form action="reset_password.php" method="POST">
          <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
          <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
          <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
  <?php include 'includes/footer.php'; ?>
</body>
</html>