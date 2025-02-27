<?php 
session_start();
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identifier = $_POST['identifier'];
    $password = $_POST['password'];

    // Query to check for the user by email or serial number
    $query = "SELECT * FROM applicants WHERE email = :identifier OR serial_number = :identifier";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":identifier", $identifier);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['applicant'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'serial_number' => $user['serial_number'],
                'first_name' => $user['first_name'],
                'surname' => $user['surname']
            ];
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No account found with that email or serial number.";
    }
}

// Set the page type for the header
$pageType = 'login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - NTSS</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .login-container {
      background: #fff;
      color: #333;
      margin: 4rem auto;
      padding: 30px;
      border-radius: 0.5rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 450px;
    }
    .login-container h3 {
      color: #002060;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }
    .btn-primary {
      width: 30%;
      background-color: #002060;
      border-color: #002060;
      border-radius: 8px;
      font-size: 16px;
      padding: 12px;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    .button-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }
    .form-text {
      color: #666;
      font-size: 0.9rem;
    }
    .login-footer {
      text-align: center;
      margin-top: 10px;
    }
    .login-footer a {
      color: #0056b3;
      text-decoration: none;
    }
    .login-footer a:hover {
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
    .toggle-password {
      position: absolute;
      top: 50%;
      right: 0.75rem;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 0.9rem;
      color: #0056b3;
      user-select: none;
    }
    .alert {
      animation: fadeIn 0.5s;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    /* Inline error messages */
    .error-message {
      color: red;
      font-size: 0.875rem;
      margin-top: 5px;
      display: none;
    }
  </style>
</head>
<?php include("includes/header_login_register.php"); ?>
<body>
  <div class="container">
    <div class="login-container">
      <h3>Login to Your Account</h3>
      <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php endif; ?>

      <form id="loginForm" method="POST" action="login.php">
        <!-- Email or Serial Number -->
        <div class="floating-label-group">
          <input type="text" id="identifier" name="identifier" class="form-control" placeholder=" " required autofocus>
          <label for="identifier" class="form-label">Email or Serial Number</label>
          <small id="identifierError" class="error-message"></small>
        </div>

        <!-- Password with toggle -->
        <div class="floating-label-group">
          <input type="password" id="password" name="password" class="form-control" placeholder=" " required>
          <label for="password" class="form-label">Password</label>
          <span class="toggle-password" onclick="togglePasswordVisibility()">Show</span>
          <small id="passwordError" class="error-message"></small>
        </div>

        <small class="form-text center mb-3">
          Forgot your password? <a href="reset_password.php">Reset it here</a>.
        </small>

        <!-- Remember me checkbox and Submit Button -->
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" value="" id="rememberMe">
          <label class="form-check-label" for="rememberMe">
            Remember me on this device
          </label>
        </div>
        <div class="button-container">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>

      <!-- Footer Links -->
      <div class="login-footer mt-3">
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
      </div>
    </div>
  </div>
  <?php include("includes/footer.php"); ?>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle password visibility
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const toggleBtn = document.querySelector('.toggle-password');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleBtn.textContent = 'Hide';
      } else {
        passwordInput.type = 'password';
        toggleBtn.textContent = 'Show';
      }
    }

    // Real-time input validation for login form
    document.addEventListener('DOMContentLoaded', function() {
      const identifierInput = document.getElementById('identifier');
      const passwordInput = document.getElementById('password');

      identifierInput.addEventListener('input', function() {
        if (this.value.trim() === '') {
          showError('identifierError', 'This field is required.');
        } else {
          hideError('identifierError');
          // If identifier looks like an email, validate format.
          if (this.value.includes('@')) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.value)) {
              showError('identifierError', 'Invalid email format.');
            } else {
              hideError('identifierError');
            }
          }
        }
      });

      passwordInput.addEventListener('input', function() {
        if (this.value.trim() === '') {
          showError('passwordError', 'Password is required.');
        } else {
          hideError('passwordError');
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

    // Final form submission check
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      let valid = true;
      const identifierValue = document.getElementById('identifier').value.trim();
      const passwordValue = document.getElementById('password').value.trim();

      if (identifierValue === '') {
        showError('identifierError', 'This field is required.');
        valid = false;
      }
      // If identifier contains an '@', validate email format
      if (identifierValue.includes('@')) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(identifierValue)) {
          showError('identifierError', 'Invalid email format.');
          valid = false;
        }
      }
      if (passwordValue === '') {
        showError('passwordError', 'Password is required.');
        valid = false;
      }
      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>