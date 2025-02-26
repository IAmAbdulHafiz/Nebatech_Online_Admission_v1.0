<?php
// Set the page type for the header
$pageType = 'signup';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nebatech Admission Portal - Register</title>
  <!-- Use absolute paths so assets load regardless of directory -->
  <link rel="stylesheet" href="../assets/css/stylesheet.css">
  <style>
    /* Global styles */
    * {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
      margin: 0;
      padding-top: 120px; /* Adjust for fixed header and topbar */
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background: linear-gradient(135deg, #002060, #0056b3);
      color: #333;
      line-height: 1.6;
    }
    .container-signup {
      max-width: 600px;
      margin: 5rem auto;
      padding: 2rem;
      background-color: #fff;
      border-radius: 0.5rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header-text {
      text-align: center;
      margin-bottom: 2rem;
    }
    .header-text h1 {
      color: #002060;
    }
    .form-group {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .form-group div {
      flex: 1;
    }
    .floating-label-group {
      position: relative;
    }
    .floating-label-group input {
      width: 100%;
      padding: 1rem 0.75rem;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
    }
    .floating-label-group label {
      position: absolute;
      top: 1rem;
      left: 0.75rem;
      background-color: #fff;
      padding: 0 5px;
      transition: all 0.2s ease;
      pointer-events: none;
      color: #444;
    }
    .floating-label-group input:focus + label,
    .floating-label-group input:not(:placeholder-shown) + label {
      top: -0.5rem;
      left: 0.5rem;
      font-size: 0.75rem;
      color: #002060;
    }
    button {
      background-color: #002060;
      color: #fff;
      padding: 1rem;
      border: none;
      border-radius: 0.5rem;
      cursor: pointer;
      font-size: 1rem;
      width: 100%;
    }
    button:hover {
      background-color: #FFA500;
    }
  </style>
</head>
<body>
  <!-- Include the header (which is designed for login/signup pages) -->
  <?php include 'includes/header_login_register.php'; ?>

  <div class="main-content">
    <div class="container-signup">
      <div class="header-text">
        <h1>Register</h1>
        <p>Create your account to begin the application process</p>
      </div>
      <form action="validate_serial_pin.php" method="POST" onsubmit="return validateForm()">
        <div class="form-group">
          <div class="floating-label-group">
            <input type="text" id="serialNumber" name="serial" placeholder=" " required>
            <label for="serialNumber">Serial Number</label>
          </div>
          <div class="floating-label-group">
            <input type="text" id="pin" name="pin" placeholder=" " required>
            <label for="pin">PIN</label>
          </div>
        </div>
        <div class="form-group">
          <div class="floating-label-group">
            <input type="text" id="firstName" name="firstName" placeholder=" " required>
            <label for="firstName">First Name</label>
          </div>
          <div class="floating-label-group">
            <input type="text" id="surname" name="surname" placeholder=" " required>
            <label for="surname">Surname</label>
          </div>
        </div>
        <div class="form-group">
          <div class="floating-label-group">
            <input type="email" id="email" name="email" placeholder=" " required>
            <label for="email">Email Address</label>
          </div>
        </div>
        <div class="form-group">
          <div class="floating-label-group">
            <input type="password" id="password" name="password" placeholder=" " required>
            <label for="password">Password</label>
          </div>
          <div class="floating-label-group">
            <input type="password" id="confirmPassword" name="confirm-password" placeholder=" " required>
            <label for="confirmPassword">Confirm Password</label>
          </div>
        </div>
        <button type="submit">Create Account</button>
      </form>
    </div>
  </div>

  <!-- Include the footer -->
  <?php include 'includes/footer.php'; ?>

  <script>
    function validateForm() {
      let isValid = true;
      const serialNumber = document.getElementById('serialNumber').value;
      const pin = document.getElementById('pin').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
      if (serialNumber.length !== 15) {
        alert('Serial Number must be 15 characters long');
        isValid = false;
      }
      if (pin.length !== 6) {
        alert('PIN must be 6 characters long');
        isValid = false;
      }
      if (!emailRegex.test(email)) {
        alert('Invalid email format');
        isValid = false;
      }
      if (password.length < 8) {
        alert('Password must be at least 8 characters long');
        isValid = false;
      }
      if (password !== confirmPassword) {
        alert('Passwords do not match');
        isValid = false;
      }
      return isValid; // Allow submission if true
    }
  </script>
</body>
</html>