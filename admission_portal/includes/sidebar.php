<?php
// Fetch the passport photo from the personal_information table
include('../config/database.php');
$user_id = $_SESSION['applicant']['id'];
$stmt = $conn->prepare("SELECT passport_photo FROM personal_information WHERE application_id = (SELECT id FROM applications WHERE user_id = ?)");
$stmt->execute([$user_id]);
$profilePicture = $stmt->fetchColumn();
?>

<aside id="sidebar" class="vh-100 position-fixed top-0 start-0 text-white shadow" style="width: 250px; padding-top: 10vh; background-color: #003366;">
    <nav class="vh-100 d-flex flex-column align-items-center">
        <!-- Profile Section -->
        <div class="text-center py-4">
            <img src="<?= htmlspecialchars($profilePicture ?? '../assets/images/profile-placeholder.png') ?>" alt="Profile" class="rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;">
            <h5 class="mb-0"><?php echo isset($_SESSION['applicant']['first_name']) ? $_SESSION['applicant']['first_name'] : "Applicant"; ?></h5>
            <small class="text-white"><?php echo isset($_SESSION['applicant']['email']) ? $_SESSION['applicant']['email'] : ""; ?></small>
        </div>

        <!-- Navigation Links -->
        <ul class="nav flex-column w-100 px-3">
            <li class="nav-item mb-2">
                <a href="applicant_dashboard.php" class="nav-link text-white p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'applicant_dashboard.php' ? 'active' : ''; ?>">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="admission_status.php" class="nav-link text-white p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'admission_status.php' ? 'active' : ''; ?>">
                    <i class="fas fa-check-circle me-2"></i> Admission Status
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="print_admission_letter.php" class="nav-link text-white p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'print_admission_letter.php' ? 'active' : ''; ?>">
                    <i class="fas fa-print me-2"></i> Print Admission Letter
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="profile.php" class="nav-link text-white p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>">
                    <i class="fas fa-user me-2"></i> Profile
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="settings.php" class="nav-link text-white p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link text-danger p-2 rounded">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
</aside>

<!-- Toggle Button for Sidebar -->
<button id="sidebarToggle" class="btn btn-primary d-md-none" style="position: fixed; top: 10px; left: 10px; z-index: 1040;">
    <i class="fas fa-bars"></i>
</button>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Custom Styles for Active State and Hover Effects -->
<style>
    /* Active link style */
    .nav-link.active {
        background-color: #FFA500; /* A darker shade of blue for active items */
        color: white !important;
        font-weight: bold;
    }

    /* Hover effects for links */
    .nav-link:hover {
        background-color: #2234AB; /* Lighter blue shade on hover */
        color: white;
        text-decoration: none;
    }

    /* Sidebar width for smaller screens */
    @media (max-width: 768px) {
        aside {
            width: 200px;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        aside.show {
            transform: translateX(0);
        }
    }

    /* Adjust text and spacing for smaller screens */
    @media (max-width: 576px) {
        .nav-link {
            font-size: 0.9rem;
            padding: 0.75rem;
        }
        .rounded-circle {
            width: 60px;
            height: 60px;
        }
        h5 {
            font-size: 1rem;
        }
    }
</style>

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('show');
    });
</script>
