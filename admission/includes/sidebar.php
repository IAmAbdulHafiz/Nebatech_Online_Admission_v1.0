<aside id="sidebar" class="text-white position-fixed" style="width: 250px; min-height: 100vh; top: 70px; left: -250px; background-color: #002060; transition: left 0.3s ease;">
  <div class="p-4">
    <!-- Profile Section -->
    <div class="text-center mb-4">
      <img src="<?= htmlspecialchars($profilePicture ?? '../assets/images/profile-placeholder.png') ?>" alt="Profile" class="rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;">
      <h5 class="mb-0"><?= htmlspecialchars($applicant['first_name'] . ' ' . $applicant['surname']) ?></h5>
      <small><?= htmlspecialchars($applicant['email']) ?></small>
    </div>
    <!-- Navigation Links -->
    <nav>
      <ul class="nav flex-column">
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
  </div>
</aside>
