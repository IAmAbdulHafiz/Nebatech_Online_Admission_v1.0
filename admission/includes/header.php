<?php
// Ensure applicant session data is available.
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php");
    exit();
}
$applicant = $_SESSION['applicant'];

// Use a profile picture from the applicant record, or fallback if not available.
$profilePic = isset($applicant['profile_picture']) ? $applicant['profile_picture'] : '/assets/images/profile-placeholder.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Applicant Dashboard - Nebatech Admissions</title>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    /* Dashboard Header Styles */
    .dashboard-header {
      background-color: #002060; /* Dark blue */
      color: #fff;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1050;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      padding: 10px 20px;
    }
    .dashboard-header .container-fluid {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .dashboard-header .brand {
      display: flex;
      align-items: center;
    }
    .dashboard-header .brand img {
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 10px;
    }
    .dashboard-header .brand span {
      font-size: 1.25rem;
      font-weight: bold;
    }
    .dashboard-header .user-info .profile {
      display: flex;
      align-items: center;
    }
    .dashboard-header .user-info .profile img {
      height: 40px;
      width: 40px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 8px;
    }
    .dashboard-header .user-info .profile span {
      font-size: 1rem;
      font-weight: 500;
    }
    /* Ensure body content does not hide under the fixed header */
    body {
      padding-top: 70px;
    }
  </style>
</head>
<body>
  <header class="dashboard-header">
    <div class="container-fluid">
      <!-- Brand Section -->
      <div class="brand">
        <a href="/admission/index.php" class="text-white text-decoration-none">
          <img src="/assets/images/logo.png" alt="Nebatech Logo">
          <span>Nebatech Admissions</span>
        </a>
      </div>
      <!-- Applicant Profile Section -->
      <div class="user-info">
        <div class="profile">
          <img src="<?= htmlspecialchars($profilePic) ?>" alt="Profile Picture">
          <span><?= htmlspecialchars($applicant['first_name'] . ' ' . $applicant['surname']) ?></span>
        </div>
      </div>
    </div>
  </header>
  <!-- The rest of your dashboard page content goes here -->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>