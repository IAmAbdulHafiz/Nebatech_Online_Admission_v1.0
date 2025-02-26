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
    .error-message {
      color: red;
      font-size: 0.875rem;
      display: none;
      margin-top: 5px;
    }
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background: linear-gradient(135deg, #002060, #0056b3);
      color: #333;
      line-height: 1.6;
    }
  </style>
</head>
<body>
  <?php include 'includes/header_login_register.php'; ?>

  <div class="container">
    <div class="signup-container">
      <h3 class="text-center">Register</h3>
      <p class="text-center">Create your account to begin the application process</p>
      <form id="signupForm" action="validate_serial_pin.php" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="floating-label-group">
              <input type="text" id="serialNumber" name="serial" class="form-control" placeholder=" " required>
              <label for="serialNumber">Serial Number</label>
              <small id="serialNumberError" class="error-message"></small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="floating-label-group">
              <input type="text" id="pin" name="pin" class="form-control" placeholder=" " required>
              <label for="pin">PIN</label>
              <small id="pinError" class="error-message"></small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="floating-label-group">
              <input type="text" id="firstName" name="firstName" class="form-control" placeholder=" " required>
              <label for="firstName">First Name</label>
              <small id="firstNameError" class="error-message"></small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="floating-label-group">
              <input type="text" id="surname" name="surname" class="form-control" placeholder=" " required>
              <label for="surname">Surname</label>
              <small id="surnameError" class="error-message"></small>
            </div>
          </div>
        </div>
        <div class="floating-label-group">
          <input type="email" id="email" name="email" class="form-control" placeholder=" " required>
          <label for="email">Email Address</label>
          <small id="emailError" class="error-message"></small>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="floating-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder=" " required>
              <label for="password">Password</label>
              <small id="passwordError" class="error-message"></small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="floating-label-group">
              <input type="password" id="confirmPassword" name="confirm-password" class="form-control" placeholder=" " required>
              <label for="confirmPassword">Confirm Password</label>
              <small id="confirmPasswordError" class="error-message"></small>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Create Account</button>
      </form>
      <div class="signup-footer mt-3 text-center">
        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const serialInput = document.getElementById('serialNumber');
      const pinInput = document.getElementById('pin');
      const emailInput = document.getElementById('email');
      const passwordInput = document.getElementById('password');
      const confirmPasswordInput = document.getElementById('confirmPassword');

      serialInput.addEventListener('input', function() {
        if (this.value.length !== 15) {
          showError('serialNumberError', 'Serial Number must be 15 characters long');
        } else {
          hideError('serialNumberError');
        }
      });

      pinInput.addEventListener('input', function() {
        if (this.value.length !== 6) {
          showError('pinError', 'PIN must be 6 characters long');
        } else {
          hideError('pinError');
        }
      });

      emailInput.addEventListener('input', function() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(this.value)) {
          showError('emailError', 'Invalid email format');
        } else {
          hideError('emailError');
        }
      });

      passwordInput.addEventListener('input', function() {
        if (this.value.length < 8) {
          showError('passwordError', 'Password must be at least 8 characters long');
        } else {
          hideError('passwordError');
        }
      });

      confirmPasswordInput.addEventListener('input', function() {
        if (this.value !== passwordInput.value) {
          showError('confirmPasswordError', 'Passwords do not match');
        } else {
          hideError('confirmPasswordError');
        }
      });
    });

    function showError(elementId, message) {
      const errorElement = document.getElementById(elementId);
      errorElement.textContent = message;
      errorElement.style.display = 'block';
    }

    function hideError(elementId) {
      const errorElement = document.getElementById(elementId);
      errorElement.textContent = '';
      errorElement.style.display = 'none';
    }

    document.getElementById('signupForm').addEventListener('submit', function(e) {
      let valid = true;
      if (document.getElementById('serialNumber').value.length !== 15) {
        showError('serialNumberError', 'Serial Number must be 15 characters long');
        valid = false;
      }
      if (document.getElementById('pin').value.length !== 6) {
        showError('pinError', 'PIN must be 6 characters long');
        valid = false;
      }
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(document.getElementById('email').value)) {
        showError('emailError', 'Invalid email format');
        valid = false;
      }
      if (document.getElementById('password').value.length < 8) {
        showError('passwordError', 'Password must be at least 8 characters long');
        valid = false;
      }
      if (document.getElementById('password').value !== document.getElementById('confirmPassword').value) {
        showError('confirmPasswordError', 'Passwords do not match');
        valid = false;
      }
      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>