<?php 
session_start();
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}
$applicant = $_SESSION['applicant'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>No Approved Admission - Nebatech Admissions</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <style>
    body {
      background: #f8f9fa;
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column;
    }
    /* Main content layout: on desktop, content is pushed to the right by 250px; on mobile, margin is removed */
    .main-content {
      margin-left: 250px;
      padding: 20px;
      position: relative;
      z-index: 1;  /* Ensure main content is behind the sidebar when it overlaps on mobile */
      flex: 1;
    }
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
      }
    }
    .content {
      padding: 20px;
      max-width: 600px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
      width: 100%;
    }
    .content h2 {
      margin-bottom: 20px;
    }
    .content p {
      margin-bottom: 20px;
    }
    .content .btn {
      margin: 5px;
    }
  </style>
</head>
<body>
  <?php include("includes/header.php"); ?>
  <?php include("includes/sidebar.php"); ?>

  <div class="main-content">
    <div class="content">
      <h2>No Approved Admission</h2>
      <p>Dear <?= htmlspecialchars($applicant['first_name'] . ' ' . $applicant['surname']) ?>,</p>
      <p>Unfortunately, your admission status is not approved at this time. Please check back later or contact our support team for further assistance.</p>
      <div>
        <a href="admission_status.php" class="btn btn-primary">Retry Checking Status</a>
        <a href="contact_support.php" class="btn btn-secondary">Contact Support</a>
      </div>
    </div>
  </div>

  <?php include("includes/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
