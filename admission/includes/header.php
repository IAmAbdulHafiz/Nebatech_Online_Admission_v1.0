<?php
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php");
    exit();
}
$applicant = $_SESSION['applicant'];
include('../config/database.php');

// Fetch profile picture
$user_id = $applicant['id'];
$stmt = $conn->prepare("SELECT passport_photo FROM personal_information WHERE applicant_id = ?");
$stmt->execute([$user_id]);
$profilePicture = $stmt->fetchColumn();

if (!$profilePicture) {
    $profilePicture = '../assets/images/profile-placeholder.png';
}

// Fetch unread notifications count
$stmt = $conn->prepare("SELECT COUNT(*) FROM notifications WHERE user_id = ? AND is_read = 0");
$stmt->execute([$applicant['id']]);
$unreadCount = $stmt->fetchColumn();
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
      width: 70px;
      object-fit: cover;
    }
    .brand span {
      font-size: 1.25rem;
      font-weight: bold;
      margin-left: 10px;
    }
    /* Notification Icon */
    .notification-icon {
      position: relative;
      margin-right: 15px;
    }
    .notification-icon a {
      color: #fff;
      text-decoration: none;
      font-size: 1.8rem;
    }
    .notification-icon .badge {
      position: absolute;
      top: -5px;
      right: -5px;
      background: red;
      color: #fff;
      border-radius: 50%;
      padding: 2px 6px;
      font-size: 0.75rem;
    }
    /* User menu (visible on desktop) */
    .user-menu {
      position: relative;
    }
    .d-none.d-md-block {
      /* Bootstrap classes: hidden on mobile, visible on md+ */
    }
    .user-menu .dropdown-toggle {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
      cursor: pointer;
    }
    .user-menu img {
      height: 40px;
      width: 40px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 8px;
    }
    .dropdown-menu {
      min-width: 150px;
      right: 0;
      left: auto;
    }
    body {
      padding-top: 70px; /* Prevent content from being hidden behind the fixed header */
    }
    /* Modern Toggle Button */
    .toggle-btn {
      background: none;
      border: none;
      color: #fff;
      font-size: 1.8rem;
      cursor: pointer;
      transition: transform 0.3s ease;
    }
    .toggle-btn:hover {
      color: #FFA500;
    }
    .toggle-btn.active i {
      transform: rotate(90deg);
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
          <span class="d-none d-md-inline">Nebatech Admissions</span>
        </a>
      </div>
      <!-- Right Side: Notification and User Menu -->
      <div class="d-flex align-items-center">
        <!-- Notification Icon -->
        <div class="notification-icon d-none d-md-block">
          <a href="/admission/notifications.php">
            <i class="fas fa-bell"></i>
            <?php if ($unreadCount > 0): ?>
              <span class="badge"><?= $unreadCount ?></span>
            <?php endif; ?>
          </a>
        </div>
        <!-- User Dropdown Menu (hidden on mobile) -->
        <div class="user-menu dropdown d-none d-md-block">
          <a href="#" class="dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= htmlspecialchars($profilePicture) ?>" alt="Profile Picture">
            <span><?= htmlspecialchars($applicant['first_name'] . ' ' . $applicant['surname']) ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="settings.php">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
          </ul>
        </div>
        <!-- Sidebar Toggle Button for Mobile -->
        <button id="sidebarToggle" class="toggle-btn d-md-none">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>
  </header>

  <!-- Include Sidebar (for mobile navigation) -->
  <?php include 'includes/sidebar.php'; ?>

  <!-- Footer Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.getElementById('sidebar');
      const toggleBtn = document.getElementById('sidebarToggle');

      if (toggleBtn) {
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
      }
    });
  </script>
</body>
</html>