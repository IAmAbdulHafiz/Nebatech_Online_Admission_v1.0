<aside class="vh-100 position-fixed top-0 start-0 text-white shadow" style="width: 250px; background-color: #FFA500;">
    <nav class="vh-100 d-flex flex-column align-items-center">
        <!-- Profile Section -->
        <div class="text-center py-4">
            <img src="../assets/images/profile-placeholder.png" alt="Profile" class="rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;">
            <h5 class="mb-0"><?php echo isset($_SESSION['admin']['email']) ? $_SESSION['admin']['email'] : "Admin"; ?></h5>
        </div>

        <!-- Navigation Links -->
        <ul class="nav flex-column w-100 px-3">
            <li class="nav-item mb-2">
                <a href="admin_dashboard.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'admin_dashboard.php' ? 'active' : ''; ?>">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="generate_serial_pin.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'generate_serial_pin.php' ? 'active' : ''; ?>">
                    <i class="fas fa-key me-2"></i> Generate SN & PIN
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_applications.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'manage_applications.php' ? 'active' : ''; ?>">
                    <i class="fas fa-users me-2"></i> Manage Applications
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_admissions.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'manage_admissions.php' ? 'active' : ''; ?>">
                    <i class="fas fa-graduation-cap me-2"></i> Manage Admissions
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_payments.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'manage_payments.php' ? 'active' : ''; ?>">
                    <i class="fas fa-dollar-sign me-2"></i> Manage Payments
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="notifications.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'notifications.php' ? 'active' : ''; ?>">
                    <i class="fas fa-bell me-2"></i> Notifications
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="reports_analytics.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'reports_analytics.php' ? 'active' : ''; ?>">
                    <i class="fas fa-chart-line me-2"></i> Reports & Analytics
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="help_support.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'help_support.php' ? 'active' : ''; ?>">
                    <i class="fas fa-life-ring me-2"></i> Help & Support
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="user_management.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'user_management.php' ? 'active' : ''; ?>">
                    <i class="fas fa-user-cog me-2"></i> User Management
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="logs.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'logs.php' ? 'active' : ''; ?>">
                    <i class="fas fa-history me-2"></i> Audit Logs
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="settings.php" class="nav-link text-dark p-2 rounded <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>">
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

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Custom Styles for Active State and Hover Effects -->
<style>
    /* Active link style */
    .nav-link.active {
        background-color: #002060; /* A darker shade of blue for active items */
        color: white !important;
        font-weight: bold;
    }

    /* Hover effects for links */
    .nav-link:hover {
        background-color:orange; /* Lighter blue shade on hover */
        color: white;
        text-decoration: none;
    }

    /* Sidebar width for smaller screens */
    @media (max-width: 768px) {
        aside {
            width: 200px;
        }
    }
</style>