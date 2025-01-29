<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/includes/header.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("../config/database.php");

// Fetch settings from the database
$query = "SELECT company_name, logo FROM settings WHERE id = 1";
$stmt = $conn->prepare($query);
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);

$company_name = $settings['company_name'];
$logo = $settings['logo'];

// Fetch user details from session
$user_id = $_SESSION['user_id'] ?? null;
if ($user_id) {
    $query = "SELECT first_name, last_name, profile_picture FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $user_name = $user ? $user['first_name'] . ' ' . $user['last_name'] : 'Guest';
    $profile_picture = $user['profile_picture'] ?? '../assets/images/default-profile.jpg';
} else {
    $user_name = 'Guest';
    $profile_picture = '../assets/images/default-profile.jpg';
}

$notification_count = $_SESSION['notification_count'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($company_name); ?> - Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .notification .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            padding: 5px 10px;
            border-radius: 50%;
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
<header class="text-white p-3 fixed-top shadow-sm" style="background: #002060;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <a href="dashboard.php">
                <img src="<?php echo htmlspecialchars($logo); ?>" alt="Logo" style="height: 50px;" class="me-2">
            </a>
            <h1 class="h4 mb-0"><?php echo htmlspecialchars($company_name); ?></h1>
        </div>
        <div class="d-flex align-items-center">
            <form class="d-flex me-3">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <div class="notification me-3">
                <a href="notifications.php" class="text-white">
                    <i class="fas fa-bell fa-lg"></i>
                    <?php if ($notification_count > 0): ?>
                        <span class="badge"><?php echo $notification_count; ?></span>
                    <?php endif; ?>
                </a>
            </div>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
                    <span class="ms-2"><?php echo htmlspecialchars($user_name); ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="profile.php">Profile Settings</a></li>
                    <li><a class="dropdown-item" href="settings.php">Account Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>