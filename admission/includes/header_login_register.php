<!-- includes/header.php -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nebatech Admissions</title>
  <!-- Use absolute paths so the stylesheet loads on every page -->
  <link rel="stylesheet" href="../assets/css/stylesheet.css">
  <!-- Font Awesome for the back arrow icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<header style="background: #002060; padding: 10px 20px;">
  <div style="max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between;">
    <div style="display: flex; align-items: center;">
      <!-- Back Arrow (optional: if you prefer to allow users to go back) -->
      <a href="javascript:history.back()" style="text-decoration: none; color: #1a73e8; margin-right: 10px; font-size: 1.2rem;">
        <i class="fas fa-arrow-left"></i>
      </a>
      <!-- Logo and Site Name -->
      <a href="../index.php" style="text-decoration: none; color: #002060;">
        <img src="../assets/images/logo.png" alt="Nebatech Logo" style="height: 50px; vertical-align: middle;">
      </a>
    </div>
    <!-- Navigation / Support Links -->
    <div>
      <a href="../public/contact.php" style="margin-right: 15px; text-decoration: none; color: #fff;">Help</a>
      <?php 
      // Conditionally mark the active link if $pageType is set
      if (isset($pageType) && $pageType === 'login') {
          echo '<span style="margin-right:15px; text-decoration: none; color: #fff; font-weight:bold;">Login</span>';
          echo '<a href="../admission/signup.php" style="text-decoration: none; color: #fff;">Sign Up</a>';
      } elseif (isset($pageType) && $pageType === 'signup') {
          echo '<a href="../admission/login.php" style="margin-right:15px; text-decoration: none; color: #fff;">Login</a>';
          echo '<span style="text-decoration: none; color: #fff; font-weight:bold;">Sign Up</span>';
      } else {
          // Default: show both links as normal
          echo '<a href="../admission/login.php" style="margin-right:15px; text-decoration: none; color: #fff;">Login</a>';
          echo '<a href="../admission/signup.php" style="text-decoration: none; color: #fff;">Sign Up</a>';
      }
      ?>
    </div>
  </div>
</header>