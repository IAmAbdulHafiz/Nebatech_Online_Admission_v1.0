<?php 
session_start();
include("config/database.php");

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
            header("Location: applicant/applicant_dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No account found with that email or serial number.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NTSS</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #002060, #0056b3);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #fff;
            color: #333;
            padding: 30px;
            border-radius: 10px;
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
            background-color: #002060;
            border-color: #002060;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
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
    </style>
</head>

<body>
    <?php include("includes/public_header.php"); ?>
    <div class="login-container">
        <h3>Login to Your Account</h3>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <!-- Email or Serial Number -->
            <div class="mb-3">
                <label for="identifier" class="form-label">Email or Serial Number</label>
                <input type="text" id="identifier" name="identifier" class="form-control" placeholder="Enter Email or Serial Number" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                <small class="form-text">Forgot your password? <a href="reset_password.php">Reset it here</a>.</small>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <!-- Footer Links -->
        <div class="login-footer mt-3">
            <p>Don't have an account? <a href="payment_and_signup.php">Sign Up</a></p>
        </div>
    </div>
    <?php include("includes/public_footer.php"); ?>
    <!-- Include Bootstrap Bundle and jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
