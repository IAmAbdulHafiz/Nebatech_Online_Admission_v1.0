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
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .signup-container {
      background: #fff;
      color: #333;
      margin: 4rem auto;
      padding: 30px;
      border-radius: 0.5rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
    }
    .signup-container h3 {
      color: #002060;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }
    .btn-primary {
      width: 100%;
      background-color: #002060;
      border-color: #002060;
      border-radius: 8px;
      font-size: 16px;
      padding: 12px;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background-color: #FFA500;
      border-color: #FFA500;
    }
    .form-text {
      color: #666;
      font-size: 0.9rem;
    }
    .signup-footer {
      text-align: center;
      margin-top: 10px;
    }
    .signup-footer a {
      color: #0056b3;
      text-decoration: none;
    }
    .signup-footer a:hover {
      text-decoration: underline;
    }
    .floating-label-group {
      position: relative;
      margin-bottom: 1.5rem;
    }
    .floating-label-group input.form-control {
      width: 100%;
      padding: 1.25rem 0.75rem 0.75rem;
      border: 1px solid #ddd;
      border-radius: 0.375rem;
      font-size: 1rem;
      transition: border-color 0.3s;
    }
    .floating-label-group input.form-control:focus {
      outline: none;
      border-color: #0056b3;
    }
    .floating-label-group label {
      position: absolute;
      top: 0.75rem;
      left: 0.75rem;
      font-weight: 500;
      color: #444;
      background-color: #fff;
      padding: 0 5px;
      transition: all 0.2s ease;
      pointer-events: none;
    }
    .floating-label-group input.form-control:focus + label,
    .floating-label-group input.form-control:not(:placeholder-shown) + label {
      top: -0.5rem;
      left: 0.5rem;
      font-size: 0.75rem;
      color: #0056b3;
    }
  </style>
</head>
<body>
  <?php include 'includes/header_login_register.php'; ?>

  <div class="container">
    <div class="signup-container">
      <h3>Register</h3>
      <p class="text-center">Create your account to begin the application process</p>
      <form action="validate_serial_pin.php" method="POST" onsubmit="return validateForm()">
        <div class="floating-label-group">
          <input type="text" id="serialNumber" name="serial" class="form-control" placeholder=" " required>
          <label for="serialNumber">Serial Number</label>
        </div>
        <div class="floating-label-group">
          <input type="text" id="pin" name="pin" class="form-control" placeholder=" " required>
          <label for="pin">PIN</label>
        </div>
        <div class="floating-label-group">
          <input type="text" id="firstName" name="firstName" class="form-control" placeholder=" " required>
          <label for="firstName">First Name</label>
        </div>
        <div class="floating-label-group">
          <input type="text" id="surname" name="surname" class="form-control" placeholder=" " required>
          <label for="surname">Surname</label>
        </div>
        <div class="floating-label-group">
          <input type="email" id="email" name="email" class="form-control" placeholder=" " required>
          <label for="email">Email Address</label>
        </div>
        <div class="floating-label-group">
          <input type="password" id="password" name="password" class="form-control" placeholder=" " required>
          <label for="password">Password</label>
        </div>
        <div class="floating-label-group">
          <input type="password" id="confirmPassword" name="confirm-password" class="form-control" placeholder=" " required>
          <label for="confirmPassword">Confirm Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Create Account</button>
      </form>
      <div class="signup-footer mt-3">
        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </div>
  </div>

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