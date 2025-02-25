<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nebatech Admission Portal - Sign Up</title>
  <style>
    /* Your existing CSS styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
      background: linear-gradient(135deg, #002060, #0056b3);
      color: #333;
      height: 100vh;
      line-height: 1.6;
    }
    .container-signup {
      max-width: 500px;
      margin: 7rem auto;
      padding: 2rem;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .header {
      margin-bottom: 2rem;
    }
    .header h1 {
      color: #1a73e8;
      margin-bottom: 0.5rem;
    }
    .header p {
      color: #666;
    }
    .floating-label-group {
      position: relative;
      margin-bottom: 1.5rem;
      text-align: left;
    }
    .floating-label-group input {
      width: 100%;
      padding: 1rem 0.75rem 0.75rem;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s;
    }
    .floating-label-group input:focus {
      outline: none;
      border-color: #1a73e8;
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
    .floating-label-group input:focus + label,
    .floating-label-group input:not(:placeholder-shown) + label {
      top: -0.5rem;
      left: 0.5rem;
      font-size: 0.75rem;
      color: #1a73e8;
    }
    .error {
      color: #dc3545;
      font-size: 0.875rem;
      margin-top: 0.25rem;
      display: none;
      text-align: left;
    }
    button {
      background-color: #1a73e8;
      color: #fff;
      padding: 1rem 2rem;
      border: none;
      border-radius: 15px;
      cursor: pointer;
      font-size: 1rem;
      width: 100%;
      transition: background-color 0.3s;
    }
    button:hover {
      background-color: #1557b0;
    }
    .required::after {
      content: "*";
      color: #dc3545;
      margin-left: 4px;
    }
    /* Success message styling */
    .success-message {
      padding: 2rem;
    }
    .success-message h1 {
      color: #28a745;
      margin-bottom: 1rem;
    }
    .success-message p {
      margin-bottom: 1rem;
    }
  </style>
  <?php
  // If a success message is set in the GET parameters, add JavaScript for auto-redirect.
  if (isset($_GET['msg'])) {
      echo '<script>
              setTimeout(function(){
                window.location.href = "login.php";
              }, 5000);
            </script>';
  }
  ?>
</head>
<body>
  <?php include("includes/header.php"); ?>
  <div class="container-signup">
    <?php if (isset($_GET['msg'])): ?>
      <!-- Display success message and auto-redirect -->
      <div class="success-message">
        <h1>Registration Successful!</h1>
        <p><?php echo htmlspecialchars($_GET['msg']); ?></p>
        <p>You will be redirected to the login page shortly.</p>
      </div>
    <?php else: ?>
      <!-- Registration form -->
      <div class="header">
        <h1>Register</h1>
        <p>Create your account to begin the application process</p>
      </div>
      <form id="signupForm" action="validate_serial_pin.php" method="POST" onsubmit="return validateForm(event)">
          <div class="form-group">
            <div class="floating-label-group">
              <input type="text" id="serialNumber" name="serial" placeholder=" " required>
              <label for="serialNumber" class="required">Serial Number</label>
            </div>
            <div class="error" id="serialNumberError"></div>
          </div>

          <div class="form-group">
            <div class="floating-label-group">
              <input type="text" id="pin" name="pin" placeholder=" " required>
              <label for="pin" class="required">PIN</label>
            </div>
            <div class="error" id="pinError"></div>
          </div>

          <div class="form-group">
            <div class="floating-label-group">
              <input type="text" id="firstName" name="firstName" placeholder=" " required>
              <label for="firstName" class="required">First Name</label>
            </div>
            <div class="error" id="firstNameError"></div>
          </div>

          <div class="form-group">
            <div class="floating-label-group">
              <input type="text" id="surname" name="surname" placeholder=" " required>
              <label for="surname" class="required">Surname</label>
            </div>
            <div class="error" id="surnameError"></div>
          </div>

          <div class="form-group">
            <div class="floating-label-group">
              <input type="email" id="email" name="email" placeholder=" " required>
              <label for="email" class="required">Email Address</label>
            </div>
            <div class="error" id="emailError"></div>
          </div>

          <div class="form-group">
            <div class="floating-label-group">
              <input type="password" id="password" name="password" placeholder=" " required>
              <label for="password" class="required">Password</label>
            </div>
            <div class="error" id="passwordError"></div>
          </div>

          <div class="form-group">
            <div class="floating-label-group">
              <input type="password" id="confirmPassword" name="confirm-password" placeholder=" " required>
              <label for="confirmPassword" class="required">Confirm Password</label>
            </div>
            <div class="error" id="confirmPasswordError"></div>
          </div>

        <button type="submit">Create Account</button>
      </form>
    <?php endif; ?>
  </div>

  <script>
    function validateForm(event) {
      // Reset errors
      const errors = document.querySelectorAll('.error');
      errors.forEach(error => error.style.display = 'none');

      let isValid = true;

      // Validate Serial Number
      const serialNumber = document.getElementById('serialNumber').value;
      if (serialNumber.length !== 15) {
        showError('serialNumberError', 'Serial Number must be 15 characters long');
        isValid = false;
      }

      // Validate PIN
      const pin = document.getElementById('pin').value;
      if (pin.length !== 6) {
        showError('pinError', 'PIN must be 6 characters long');
        isValid = false;
      }

      // Validate Email
      const email = document.getElementById('email').value;
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        showError('emailError', 'Please enter a valid email address');
        isValid = false;
      }

      // Validate Password
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      if (password.length < 8) {
        showError('passwordError', 'Password must be at least 8 characters long');
        isValid = false;
      }
      if (password !== confirmPassword) {
        showError('confirmPasswordError', 'Passwords do not match');
        isValid = false;
      }

      return isValid; // if isValid is true, form will submit normally
    }

    function showError(elementId, message) {
      const errorElement = document.getElementById(elementId);
      errorElement.textContent = message;
      errorElement.style.display = 'block';
    }

    function isSerialNumberUsed(serialNumber) {
      // Placeholder function: remove if you perform the check on the server side.
      const usedSerialNumbers = ['123456789012345', '098765432109876'];
      return usedSerialNumbers.includes(serialNumber);
    }
  </script>
  <?php include("../includes/public_footer.php"); ?>
</body>
</html>