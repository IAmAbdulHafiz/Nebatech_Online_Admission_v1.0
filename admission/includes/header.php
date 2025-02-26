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
    }
    .dashboard-header .navbar {
      padding: 0.5rem 1rem;
    }
    .dashboard-header .navbar-brand img {
      height: 40px;
    }
    .dashboard-header .navbar-brand span {
      font-size: 1.25rem;
      font-weight: bold;
      margin-left: 0.5rem;
    }
    .dashboard-header .navbar-nav .nav-link {
      color: #fff;
      margin-right: 1rem;
      font-weight: 500;
      transition: color 0.3s;
    }
    .dashboard-header .navbar-nav .nav-link:hover,
    .dashboard-header .navbar-nav .nav-link.active {
      color: #FFA500; /* Gold */
    }
    /* User Dropdown */
    .dashboard-header .user-menu .dropdown-menu {
      right: 0;
      left: auto;
    }
    /* Body padding to prevent content from being hidden behind fixed header */
    body {
      padding-top: 70px;
    }
  </style>
</head>
<body>
  <header class="dashboard-header">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <!-- Logo and Brand -->
        <a class="navbar-brand" href="/admission/index.php">
          <img src="/assets/images/logo.png" alt="Nebatech Logo">
          <span>Nebatech Admissions</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#dashboardNavbar" aria-controls="dashboardNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="dashboardNavbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="applicant_dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admission_status.php">Admission Status</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view_application.php">View Application</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item dropdown user-menu">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle fa-lg"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>