<?php
session_start();
include("../config/database.php");

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === 'signup') {
    $serial = $_POST['serial'];
    $pin = $_POST['pin'];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Validate Serial Number and PIN
    $query = "SELECT * FROM transactions WHERE serial_number = :serial AND pin = :pin AND status = 'Completed'";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":serial", $serial);
    $stmt->bindParam(":pin", $pin);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Check if the user already exists
        $checkUserQuery = "SELECT * FROM applicants WHERE serial_number = :serial";
        $checkStmt = $conn->prepare($checkUserQuery);
        $checkStmt->bindParam(":serial", $serial);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            $error = "This Serial Number has already been used for signup.";
        } else {
            // Insert new applicant
            $insertQuery = "INSERT INTO applicants (serial_number, pin, email, password) VALUES (:serial, :pin, :email, :password)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(":serial", $serial);
            $insertStmt->bindParam(":pin", $pin);
            $insertStmt->bindParam(":email", $email);
            $insertStmt->bindParam(":password", $password);
            $insertStmt->execute();

            // Save user data in session
            $_SESSION['applicant'] = [
                'email' => $email,
                'serial_number' => $serial
            ];

            // Redirect to applicant dashboard
            header("Location: applicant_dashboard.php");
            exit();
        }
    } else {
        $error = "Invalid Serial Number or PIN, or payment not completed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Portal</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include("../includes/applicant_header.php"); ?>

    <div class="container mt-4">
        <div class="form-container">
            <h2 class="text-center mb-4">Signup Form</h2>

            <!-- Display Errors -->
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <!-- Signup Form -->
            <form method="POST">
                <input type="hidden" name="action" value="signup">
                <div class="mb-3">
                    <label for="serial" class="form-label">Serial Number</label>
                    <input type="text" id="serial" name="serial" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="pin" class="form-label">PIN</label>
                    <input type="text" id="pin" name="pin" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-20">Signup</button>
            </form>
        </div>
    </div>
</body>
</html>