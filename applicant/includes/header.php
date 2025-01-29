<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];

// Include database connection
include('../config/database.php');

// Fetch unread notifications count
$stmt = $conn->prepare("SELECT COUNT(*) FROM notifications WHERE user_id = ? AND is_read = 0");
$stmt->execute([$applicant['id']]);
$unreadCount = $stmt->fetchColumn();

// Fetch latest notifications
$stmt = $conn->prepare("SELECT message, created_at FROM notifications WHERE user_id = ? ORDER BY created_at DESC LIMIT 5");
$stmt->execute([$applicant['id']]);
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch the passport photo from the personal_information table
$user_id = $_SESSION['applicant']['id'];
$stmt = $conn->prepare("SELECT passport_photo FROM personal_information WHERE application_id = (SELECT id FROM applications WHERE user_id = ?)");
$stmt->execute([$user_id]);
$profilePicture = $stmt->fetchColumn();

$user_name = isset($_SESSION['applicant']['first_name']) ? $_SESSION['applicant']['first_name'] : "Applicant"; // Replace with actual session data
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
            margin: 0;
            padding-top: 70px;
        }
        .navbar {
            background-color: #002060;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;
        }
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }
        .notification-icon {
            position: relative;
            display: inline-block;
        }
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            border-radius: 50%;
            background-color: #dc3545;
            color: white;
            font-size: 0.75rem;
            width: 20px;
            height: 20px;
            text-align: center;
        }
        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 70px;
            bottom: 0;
            left: 0;
            background-color: #003366;
            padding-top: 20px;
            overflow-y: auto;
            transition: transform 0.3s ease-in-out;
        }
        .sidebar.active {
            transform: translateX(0);
        }
        .sidebar.hidden {
            transform: translateX(-100%);
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }
        .sidebar ul li a:hover {
            background-color: #2234AB;
            text-decoration: none;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <button id="sidebarToggle" class="btn btn-primary d-md-none me-2">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="applicant_dashboard.php">Applicant Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="notification-icon">
                                <i class="bi bi-bell"></i>
                                <?php if ($unreadCount > 0): ?>
                                    <span class="notification-badge"><?= $unreadCount ?></span>
                                <?php endif; ?>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                            <?php if (count($notifications) > 0): ?>
                                <?php foreach ($notifications as $notification): ?>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <small class="text-muted"><?= htmlspecialchars(date("F j, Y, g:i a", strtotime($notification['created_at']))) ?></small><br>
                                            <?= htmlspecialchars($notification['message']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-center" href="notifications.php">View All</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item text-center" href="#">No new notifications</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo htmlspecialchars($profilePicture); ?>" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
                            <span class="ms-2"><?php echo $user_name; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="sidebar hidden" id="sidebar">
                    <ul>
                        <li><a href="applicant_dashboard.php">Dashboard</a></li>
                        <li><a href="admission_status.php">Admission Status</a></li>
                        <li><a href="print_admission_letter.php">Print Admission Letter</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="settings.php">Settings</a></li>
                        <li><a href="logout.php" class="text-danger">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('.navbar-toggler').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>

