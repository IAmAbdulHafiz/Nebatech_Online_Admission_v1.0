<?php 
session_start();

if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];
include('../config/database.php');

// Retrieve admission status from the admission_status table using applicant_id
$query = "SELECT status, remarks, updated_at FROM admission_status WHERE applicant_id = :applicant_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":applicant_id", $applicant['id']);
$stmt->execute();
$status = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admission Status - Nebatech Admissions</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <style>
    body {
      background: #f8f9fa;
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column;
    }
    /* Main content takes the sidebar into account on desktop */
    .main-content {
      margin-left: 250px;
      padding: 20px;
      position: relative;
      z-index: 1; /* Lower than sidebar for mobile overlay */
      flex: 1;
    }
    @media (max-width: 768px) {
      /* On mobile, you can either remove the margin or leave it—if the sidebar toggles in, its z-index ensures it overlaps */
      .main-content {
        margin-left: 0;
      }
    }
    .status-card {
      border: 1px solid #ddd;
      border-radius: 0.5rem;
      padding: 20px;
      background-color: #f9f9f9;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .status-card h3 {
      margin-bottom: 20px;
    }
    .status-card p {
      margin-bottom: 10px;
    }
    .status-card .updated-at {
      font-size: 0.9rem;
      color: #6c757d;
    }
    .status-card .remarks {
      margin-top: 20px;
    }
    .status-card .btn-success {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <!-- Header and Sidebar -->
  <?php include("includes/header.php"); ?>
  <?php include("includes/sidebar.php"); ?>

  <!-- Main Content Area -->
  <div class="main-content">
    <div class="container">
      <!-- Welcome & Basic Info -->
      <div class="mb-4">
        <h2 class="mb-3">Admission Status</h2>
        <p>Applicant: <strong><?= htmlspecialchars($applicant['first_name'] . ' ' . $applicant['surname']) ?></strong></p>
        <p>Serial Number: <strong><?= htmlspecialchars($applicant['serial_number']) ?></strong></p>
      </div>
      
      <!-- Admission Status Card -->
      <div class="status-card mt-4">
        <h3>Status</h3>
        <?php if ($status): ?>
          <p><strong><?= htmlspecialchars($status['status']) ?></strong></p>
          <p class="updated-at">Last updated: <?= htmlspecialchars(date("F j, Y, g:i a", strtotime($status['updated_at']))) ?></p>
          <div class="remarks">
            <h5>Remarks:</h5>
            <p><?= htmlspecialchars($status['remarks']) ?></p>
          </div>
          <?php if ($status['status'] === 'Approved'): ?>
            <a href="print_admission_letter.php" class="btn btn-success">Download Admission Letter</a>
          <?php endif; ?>
        <?php else: ?>
          <p><strong>Status not available</strong></p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <?php include("includes/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
