<?php 
session_start();
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];
include('../config/database.php');

// Handle password change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $error_message = "New password and confirm password do not match.";
    } else {
        $stmt = $conn->prepare("SELECT password FROM applicants WHERE id = ?");
        $stmt->execute([$applicant['id']]);
        $stored_password = $stmt->fetchColumn();

        if (password_verify($current_password, $stored_password)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE applicants SET password = ? WHERE id = ?");
            $stmt->execute([$hashed_password, $applicant['id']]);
            $success_message = "Password changed successfully.";
        } else {
            $error_message = "Current password is incorrect.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings - Nebatech Admissions</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <style>
    body {
      background: #f8f9fa;
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column;
    }
    /* Main content: on desktop, shifted right by 250px; on mobile, margin is removed */
    .main-content {
      margin-left: 250px;
      padding: 20px;
      position: relative;
      z-index: 1;
      flex: 1;
    }
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
      }
    }
    /* Content container styling */
    .content {
      max-width: 600px;
      margin: auto;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-group {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <?php include("includes/header.php"); ?>
  <?php include("includes/sidebar.php"); ?>

  <div class="main-content">
    <div class="content">
      <h2 class="mb-3 text-center">Change Password</h2>
      <?php if (isset($success_message)): ?>
          <div class="alert alert-success"><?= $success_message ?></div>
      <?php elseif (isset($error_message)): ?>
          <div class="alert alert-danger"><?= $error_message ?></div>
      <?php endif; ?>
      <form action="settings.php" method="post">
          <div class="form-group">
              <label for="current_password" class="form-label">Current Password</label>
              <input type="password" id="current_password" name="current_password" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="new_password" class="form-label">New Password</label>
              <input type="password" id="new_password" name="new_password" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="confirm_password" class="form-label">Confirm New Password</label>
              <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
          </div>
          <div class="text-center mt-4">
              <button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
          </div>
      </form>
    </div>
  </div>

  <?php include("../includes/footer.php"); ?>
  <script src="../assets/js/jquery-3.7.1.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>