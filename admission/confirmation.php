<?php 
session_start();
if (!isset($_SESSION['application_submitted'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Submitted</title>
  <script src="../assets/js/jquery-3.7.1.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    /* Page wrapper for consistent dashboard layout */
    .page-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* Main content area */
    .content {
      margin-left: 270px; /* Sidebar width */
      padding: 20px;
      flex: 1;
      position: relative;
      z-index: 1;
    }
    @media (max-width: 768px) {
      .content {
        margin-left: 0;
      }
    }
    /* Footer and header padding */
    body {
      padding-top: 70px; /* Fixed header height */
      padding-bottom: 70px; /* Fixed footer height */
    }
  </style>
</head>
<body>
  <div class="page-wrapper">
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    
    <div class="content mt-5">
      <div class="container">
        <div class="card text-center">
          <div class="card-header">
            <h1>Application Submitted Successfully</h1>
          </div>
          <div class="card-body">
            <p class="card-text">Your application number is: <strong><?= $_SESSION['application_number'] ?></strong></p>
            <p class="card-text">You will receive an email once your admission is confirmed. Please check your portal regularly for updates.</p>
            <a href="view_application.php" class="btn btn-secondary">View Application</a>
          </div>
        </div>
      </div>
    </div>
    
    <?php include("../includes/footer.php"); ?>
  </div>
</body>
</html>