<?php
session_start();
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php");
    exit();
}
$applicant = $_SESSION['applicant'];

// Include database connection
include('../config/database.php');

// Fetch the applicant's profile picture from the personal_information table
$user_id = $applicant['id'];
$stmt = $conn->prepare("SELECT passport_photo FROM personal_information WHERE applicant_id = ?");
$stmt->execute([$user_id]);
$profilePicture = $stmt->fetchColumn();

// If no profile picture is found, use a default placeholder
if (!$profilePicture) {
    $profilePicture = '/assets/images/profile-placeholder.png';
}
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
    /* Brand section */
    .brand {
      display: flex;
      align-items: center;
    }
    .brand img {
      height: 40px;
      width: 40px;
      border-radius: 50%;
      object-fit: cover;
    }
    .brand span {
      font-size: 1.25rem;
      font-weight: bold;
      margin-left: 10px;
    }
    /* User menu */
    .user-menu {
      position: relative;
    }
    .user-menu .dropdown-toggle {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
    }
    .user-menu img {
      height: 40px;
      width: 40px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 8px;
    }
    .user-menu span {
      font-size: 1rem;
      font-weight: 500;
    }
    .dropdown-menu {
      min-width: 150px;
      right: 0;
      left: auto;
    }
    body {
      padding-top: 70px; /* Ensure content isn't hidden behind the fixed header */
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
      <!-- User Dropdown Menu -->
      <div class="user-menu dropdown">
        <a href="#" class="dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?= htmlspecialchars($profilePicture) ?>" alt="Profile Picture">
          <span><?= htmlspecialchars($applicant['first_name']) ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="settings.php">Settings</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </header>

  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
