<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['applicant'])) {
    header("Location: login.php");
    exit();
}

$applicant = $_SESSION['applicant'];
include('../config/database.php');

// Retrieve application status from the applicant record if available; default otherwise.
$applicationStatus = isset($applicant['application_status']) ? $applicant['application_status'] : 'Not Started';

// Fetch notifications for the applicant.
$stmt = $conn->prepare("SELECT * FROM notifications WHERE user_id = ? AND is_read = 0 ORDER BY created_at DESC");
$stmt->execute([$applicant['id']]);
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
$unreadCount = count($notifications);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Applicant Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      min-height: 100vh;
    }
    /* Main content layout taking the sidebar into account */
    .main-content {
      margin-left: 250px;
      padding: 20px;
    }
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
      }
    }
    /* Modern progress bar */
    .progress {
      height: 30px;
      background-color: #e9ecef;
      border-radius: 15px;
      overflow: hidden;
    }
    .progress-bar {
      font-size: 1rem;
      font-weight: bold;
      line-height: 30px;
    }
    /* Notification badge styling */
    .notification-badge {
      position: absolute;
      top: 10px;
      right: 10px;
      background: #dc3545;
      color: #fff;
      border-radius: 50%;
      padding: 5px 10px;
      font-size: 0.8rem;
    }
  </style>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

  <div class="main-content">
    <div class="container">
      <!-- Welcome & Basic Info -->
      <div class="mb-4">
        <h2 class="mb-3">Welcome, <?= htmlspecialchars($applicant['first_name'] . ' ' . $applicant['surname']) ?></h2>
        <p class="lead">Serial Number: <strong><?= htmlspecialchars($applicant['serial_number']) ?></strong></p>
      </div>
      
      <!-- Application Progress Card -->
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Your Application Progress</h5>
          <p>Status: <strong><?= htmlspecialchars($applicationStatus) ?></strong></p>
          <?php
            // Define progress percentage based on status.
            if ($applicationStatus === 'Not Started') {
              $progress = 0;
            } elseif ($applicationStatus === 'Pending') {
              $progress = 50;
            } elseif ($applicationStatus === 'Approved') {
              $progress = 100;
            } else {
              $progress = 0;
            }
          ?>
          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100">
              <?= $progress ?>%
            </div>
          </div>
          <div class="mt-3">
            <?php if ($applicationStatus === 'Not Started'): ?>
              <a href="personal_info.php" class="btn btn-primary">Start Application</a>
            <?php elseif ($applicationStatus === 'Pending' || $applicationStatus === 'Approved'): ?>
              <a href="view_application.php" class="btn btn-info">View Application</a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Quick Links Section -->
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <i class="bi bi-file-earmark-text-fill display-4 text-primary"></i>
              <h5 class="card-title mt-3">View Application</h5>
              <a href="view_application.php" class="btn btn-primary">View</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <i class="bi bi-clipboard-check-fill display-4 text-success"></i>
              <h5 class="card-title mt-3">Admission Status</h5>
              <a href="admission_status.php" class="btn btn-success">Check Status</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center shadow-sm">
            <div class="card-body">
              <i class="bi bi-printer display-4 text-warning"></i>
              <h5 class="card-title mt-3">Print Admission Letter</h5>
              <a href="print_admission_letter.php" class="btn btn-warning">Print</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Notifications Section -->
      <div class="card shadow-sm">
        <div class="card-body position-relative">
          <h5 class="card-title">Notifications</h5>
          <?php if ($unreadCount > 0): ?>
            <span class="notification-badge"><?= $unreadCount ?></span>
          <?php endif; ?>
          <?php if ($unreadCount > 0): ?>
            <ul class="list-group list-group-flush">
              <?php foreach($notifications as $notification): ?>
                <li class="list-group-item">
                  <?= htmlspecialchars($notification['message']) ?>
                  <small class="text-muted float-end"><?= date("M d, Y H:i", strtotime($notification['created_at'])) ?></small>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <p class="mb-0">No new notifications.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php include("../includes/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', function () {
        const currentLeft = window.getComputedStyle(sidebar).left;
        if (currentLeft === '0px') {
            sidebar.style.left = '-250px';
            toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
        } else {
            sidebar.style.left = '0px';
            toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
        }
    });
});
</script>

</body>
</html>
