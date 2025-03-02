<?php
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php");
    exit();
}
$applicant = $_SESSION['applicant'];

// Include database connection
include('../config/database.php');

$user_id = $applicant['id'];
// Fetch the applicant's profile picture from personal_information using applicant_id
$stmt = $conn->prepare("SELECT passport_photo FROM personal_information WHERE applicant_id = ?");
$stmt->execute([$user_id]);
$profilePicture = $stmt->fetchColumn();

// If no profile picture is found, use a default placeholder
if (!$profilePicture) {
    $profilePicture = '../assets/images/profile-placeholder.png';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Applicant Dashboard - Nebatech Admissions</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <!-- Load Font Awesome for icons -->
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
    /* User menu */
    .user-menu {
      position: relative;
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
      padding-top: 70px; /* Prevent content from being hidden behind the fixed header */
    }
    /* Sidebar styles */
    aside#sidebar {
      width: 250px;
      background-color: rgba(0, 51, 102, 0.8);
      color: #fff;
      position: fixed;
      top: 70px;
      left: 0;
      height: calc(100% - 70px);
      transform: translateX(-100%);
      transition: transform 0.3s ease-in-out;
      z-index: 1040;
    }
    aside#sidebar.show {
      transform: translateX(0);
    }
    /* Improved toggle button design */
    .toggle-btn {
      background: none;
      border: none;
      color: #fff;
      font-size: 1.8rem;
      cursor: pointer;
      transition: color 0.3s ease, transform 0.3s ease;
    }
    .toggle-btn:hover {
      color: #FFA500;
    }
    .toggle-btn.active i {
      transform: rotate(90deg);
    }
    /* Sidebar navigation styles */
    aside#sidebar nav ul.nav {
      padding: 0;
      margin: 0;
      list-style: none;
      width: 100%;
    }
    aside#sidebar nav ul.nav li.nav-item {
      margin-bottom: 10px;
    }
    aside#sidebar nav ul.nav li.nav-item a.nav-link {
      color: #fff;
      padding: 10px;
      border-radius: 5px;
      display: block;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }
    aside#sidebar nav ul.nav li.nav-item a.nav-link:hover,
    aside#sidebar nav ul.nav li.nav-item a.nav-link.active {
      background-color: #FFA500;
      color: #fff;
    }
    @media (max-width: 768px) {
      aside#sidebar {
        width: 200px;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header class="dashboard-header">
    <div class="container-fluid">
      <!-- Brand Section -->
      <div class="brand">
        <a href="/admission/index.php" class="text-white text-decoration-none">
          <img src="/assets/images/logo.png" alt="Nebatech Logo">
          <span class="d-none d-md-inline">Nebatech Admissions</span>
        </a>
      </div>
      <!-- User Dropdown Menu -->
      <div class="user-menu dropdown">
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
  </header>

  <!-- Sidebar -->
  <aside id="sidebar">
    <nav>
      <!-- Profile Section in Sidebar -->
      <div class="text-center py-4">
        <img src="<?= htmlspecialchars($profilePicture ?? '../assets/images/profile-placeholder.png') ?>" alt="Profile" class="rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;">
        <h5 class="mb-0"><?= isset($applicant['first_name']) ? $applicant['first_name'] : "Applicant"; ?></h5>
        <small><?= isset($applicant['email']) ? $applicant['email'] : ""; ?></small>
      </div>
      <!-- Navigation Links -->
      <ul class="nav flex-column px-3">
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
            <i class="fas fa-home me-2"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a href="admission_status.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admission_status.php' ? 'active' : ''; ?>">
            <i class="fas fa-check-circle me-2"></i> Admission Status
          </a>
        </li>
        <li class="nav-item">
          <a href="print_admission_letter.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'print_admission_letter.php' ? 'active' : ''; ?>">
            <i class="fas fa-print me-2"></i> Print Admission Letter
          </a>
        </li>
        <li class="nav-item">
          <a href="profile.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>">
            <i class="fas fa-user me-2"></i> Profile
          </a>
        </li>
        <li class="nav-item">
          <a href="settings.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>">
            <i class="fas fa-cog me-2"></i> Settings
          </a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link text-danger">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
          </a>
        </li>
      </ul>
    </nav>
  </aside>

  <!-- Toggle Button for Sidebar (redundant on header for mobile, but placed outside header for accessibility) -->
  <button id="sidebarToggleAlt" class="toggle-btn d-md-none" style="position: fixed; top: 15px; left: 15px; z-index: 1060; display: none;">
    <i class="fas fa-bars"></i>
  </button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.getElementById('sidebar');
      const toggleBtn = document.getElementById('sidebarToggle');

      // When the main toggle button is clicked:
      toggleBtn.addEventListener('click', function () {
          sidebar.classList.toggle('show');
          toggleBtn.classList.toggle('active');
      });
    });
  </script>
</body>
</html>