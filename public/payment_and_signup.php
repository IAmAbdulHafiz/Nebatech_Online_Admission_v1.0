<?php
session_start();
include("config/database.php");

$error = "";
$success = "";
$isValidated = false; // Flag to track validation status

// Function to validate password strength
function isStrongPassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['action']) && $_POST['action'] === 'mtn_momo_submit') {
        // Handle MTN MoMo form submission
        $phone_and_name = $_POST['phone_and_name'];
        $transaction_id = $_POST['transaction_id'];
        $payment_screenshot = $_FILES['payment_screenshot']; // Assuming file is uploaded

        // Validate transaction ID length
        if (strlen($transaction_id) > 15) {
            $error = "Transaction ID should not exceed 15 characters.";
        } else {
            // Process the file upload (optional)
            $allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
            if (in_array($payment_screenshot['type'], $allowedTypes) && $payment_screenshot['error'] === 0) {
                $targetDir = "uploads/";
                $fileName = basename($payment_screenshot["name"]);
                $targetFilePath = $targetDir . $fileName;

                if (move_uploaded_file($payment_screenshot["tmp_name"], $targetFilePath)) {
                    // Successfully uploaded the screenshot
                    $success = "Submitted successfully! You will receive your Serial Number & Pin within a few minutes.";
                    
                    // Insert into payment_details table
                    $query = "INSERT INTO payment_details (payment_option, phone_and_name, transaction_id, payment_screenshot) 
                              VALUES (:payment_option, :phone_and_name, :transaction_id, :payment_screenshot)";
                    $stmt = $conn->prepare($query);
                    $payment_option = 'MTN MoMo';
                    $stmt->bindParam(':payment_option', $payment_option);
                    $stmt->bindParam(':phone_and_name', $phone_and_name);
                    $stmt->bindParam(':transaction_id', $transaction_id);
                    $stmt->bindParam(':payment_screenshot', $targetFilePath);
                    $stmt->execute();

                    // Set session variable indicating payment has been submitted
                    $_SESSION['payment_submitted'] = true;
                    $_SESSION['success_message'] = $success;

                    // Redirect to the same page to show the Payment Validation Form
                    header("Location: payment_and_signup.php");
                    exit();
                } else {
                    $error = "There was an error uploading the payment screenshot.";
                }
            } else {
                $error = "Please provide a valid payment screenshot (PDF, JPG, JPEG, PNG).";
            }
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'validate_and_signup') {
        // PAYMENT VALIDATION AND SIGNUP PROCESS
        $serial = $_POST['serial'];
        $pin = $_POST['pin'];
        $first_name = $_POST['first_name'];
        $surname = $_POST['surname'];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm-password"];

        // Validate password strength
        if (!isStrongPassword($password)) {
            $error = "Password must be at least 8 characters long and include a mix of uppercase, lowercase, numbers, and special characters.";
        } elseif ($password !== $confirm_password) {
            $error = "Passwords do not match.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Validate serial and PIN
            $query = "SELECT * FROM serial_pins WHERE serial_number = :serial AND pin = :pin AND used = 0";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":serial", $serial);
            $stmt->bindParam(":pin", $pin);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Mark the serial as used
                $updateQuery = "UPDATE serial_pins SET used = 1 WHERE serial_number = :serial AND pin = :pin";
                $updateStmt = $conn->prepare($updateQuery);
                $updateStmt->bindParam(":serial", $serial);
                $updateStmt->bindParam(":pin", $pin);
                $updateStmt->execute();

                // Check if the user already exists
                $checkUserQuery = "SELECT * FROM applicants WHERE serial_number = :serial";
                $checkStmt = $conn->prepare($checkUserQuery);
                $checkStmt->bindParam(":serial", $serial);
                $checkStmt->execute();

                if ($checkStmt->rowCount() > 0) {
                    $error = "This Serial Number has already been used for signup.";
                } else {
                    // Insert new applicant
                    $insertQuery = "INSERT INTO applicants (serial_number, pin, first_name, surname, email, password) VALUES (:serial, :pin, :first_name, :surname, :email, :password)";
                    $insertStmt = $conn->prepare($insertQuery);
                    $insertStmt->bindParam(":serial", $serial);
                    $insertStmt->bindParam(":pin", $pin);
                    $insertStmt->bindParam(":first_name", $first_name);
                    $insertStmt->bindParam(":surname", $surname);
                    $insertStmt->bindParam(":email", $email);
                    $insertStmt->bindParam(":password", $hashed_password);
                    $insertStmt->execute();

                    // Save user data in session
                    $_SESSION['applicant'] = [
                        'email' => $email,
                        'serial_number' => $serial
                    ];

                    // Redirect to applicant dashboard
                    header("Location: ../applicant_dashboard.php");
                    exit();
                }
            } else {
                // Check if the serial and pin have already been used
                $queryCheckUsed = "SELECT * FROM serial_pins WHERE serial_number = :serial AND pin = :pin";
                $stmtCheckUsed = $conn->prepare($queryCheckUsed);
                $stmtCheckUsed->bindParam(":serial", $serial);
                $stmtCheckUsed->bindParam(":pin", $pin);
                $stmtCheckUsed->execute();
                if ($stmtCheckUsed->rowCount() > 0) {
                    $error = "This Serial Number and PIN have already been used.";
                } else {
                    $error = "The Serial Number or PIN is invalid.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment and Signup Portal</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        /* Adjust for fixed header and footer */
        body {
            padding-top: 70px; /* Height of the fixed header */
            padding-bottom: 60px; /* Height of the fixed footer */
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none;
        }
        .mt-3.text-center a {
            text-decoration: none;
        }
    </style>
    <script>
        function validatePassword() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm-password").value;
            const error = document.getElementById("password-error");
            const strongPasswordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!strongPasswordPattern.test(password)) {
                error.textContent = "Password must be at least 8 characters long and include a mix of uppercase, lowercase, numbers, and special characters.";
                return false;
            } else if (password !== confirmPassword) {
                error.textContent = "Passwords do not match.";
                return false;
            } else {
                error.textContent = "";
                return true;
            }
        }
    </script>
</head>

<body>
    <!-- Include Header -->
    <?php include("includes/public_header.php"); ?>

    <div class="container mt-4">
        <div class="form-container">
            <h2 class="text-center mb-4" style="color: #002060;">Confirm Payment & Signup</h2>

            <!-- Display Errors -->
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <!-- Display Success Messages -->
            <?php if (!empty($_SESSION['success_message'])) : ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['success_message'];
                    unset($_SESSION['success_message']); ?>
                </div>
                <script>
                    // Redirect to Payment Validation form after displaying the success message
                    setTimeout(function() {
                        document.getElementById("mtn-fields").classList.add("hidden");
                        document.getElementById("payment-form").classList.remove("hidden");
                    }, 3000); // Adjust the delay as needed
                </script>
            <?php endif; ?>

            <!-- Payment Method Selection -->
            <div class="mb-3">
            <label for="payment-method" class="form-label">Please be aware that form submissions via MTN MoMo payment method will only be accepted 
                if they are associated with a payment Transaction ID.</label>
                <select id="payment-method" name="payment_method" class="form-control" onchange="togglePaymentFields()">
                    <option value="" selected>Select Payment Method</option>
                    <option value="mtn">MTN MoMo</option>
                    <option value="cash">Cash</option>
                    <option value="bank">Bank</option>
                </select>
            </div>

            <!-- MTN MoMo Fields -->
            <div id="mtn-fields" class="<?php echo isset($_SESSION['payment_submitted']) ? 'hidden' : ''; ?>">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="mtn_momo_submit">
                    <div class="mb-3">
                        <label for="phone_and_name" class="form-label">Phone Number and First Name</label>
                        <label for="phone_and_name" style="font-size: 0.9em; color: #555;"> Please enter the phone number and full name associated 
                            with the Mobile Money account used for the payment. For example: 0244444444 - Iddi Sherifa.</label>
                        <input type="text" id="phone_and_name" name="phone_and_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="transaction_id" class="form-label">Transaction ID</label>
                        <label for="transaction_id" style="font-size: 0.9em; color: #555;"> Please input the transaction ID for your payment (PLEASE NOT YOUR PHONE NUMBER)</label>
                        <input type="text" id="transaction_id" name="transaction_id" class="form-control" maxlength="15" required>
                    </div>
                    <div class="mb-3">
                        <label for="payment_screenshot" class="form-label">Attach Payment Screenshot</label>
                        <input type="file" id="payment_screenshot" name="payment_screenshot" class="form-control" accept=".pdf, .jpg, .jpeg, .png" required>
                        <small class="form-text text-muted">Max. file size: 5 MB.</small>
                    </div>
                    <button type="submit" class="btn btn-primary w-20" style="background-color: #002060; border: 1px solid #002060;">Continue</button>
                </form>
                <div class="mt-3 text-center">
                    <p>Have Serial Number & Pin? <a href="#" onclick="showSignupForm()">Signup</a></p>
                </div>
            </div>

            <!-- Payment Validation and Signup Form -->
            <form method="POST" id="payment-form" class="<?php echo isset($_SESSION['payment_submitted']) && !isset($_SESSION['payment_validated']) ? '' : 'hidden'; ?> mt-4 py-4" onsubmit="return validatePassword()">
                <h4 class="text-center py-4" style="color: #002060;">Signup</h4>
                <input type="hidden" name="action" value="validate_and_signup">
                <div class="mb-3">
                    <label for="serial" class="form-label">Serial Number</label>
                    <input type="text" id="serial" name="serial" class="form-control" required onblur="checkSerialNumber()">
                    <div id="serial-error" class="text-danger mt-2"></div>
                </div>
                <div class="mb-3">
                    <label for="pin" class="form-label">PIN</label>
                    <input type="password" id="pin" name="pin" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" id="surname" name="surname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    <div id="password-error" class="text-danger mt-2"></div>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-20" style="background-color: #002060; border: 1px solid #002060;">Signup</button>
            </form>
        </div>
    </div>

    <?php include("includes/public_footer.php"); ?>

    <script>
        // Function to toggle the visibility of payment fields based on selected payment method
        function togglePaymentFields() {
            const paymentMethod = document.getElementById("payment-method").value;
            const mtnFields = document.getElementById("mtn-fields");
            const paymentForm = document.getElementById("payment-form");

            if (paymentMethod === "mtn") {
                mtnFields.classList.remove("hidden");
                paymentForm.classList.add("hidden");
            } else if (paymentMethod === "cash" || paymentMethod === "bank") {
                mtnFields.classList.add("hidden");
                paymentForm.classList.remove("hidden");
            } else {
                mtnFields.classList.add("hidden");
                paymentForm.classList.add("hidden");
            }
        }

        // Function to show the Signup form
        function showSignupForm() {
            document.getElementById("mtn-fields").classList.add("hidden");
            document.getElementById("payment-form").classList.remove("hidden");
        }

        // Function to check if the serial number has already been used
        function checkSerialNumber() {
            const serial = document.getElementById("serial").value;
            const serialError = document.getElementById("serial-error");

            if (serial) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "check_serial.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        if (xhr.responseText === "used") {
                            serialError.textContent = "This Serial Number has already been used.";
                        } else {
                            serialError.textContent = "";
                        }
                    }
                };
                xhr.send("serial=" + serial);
            }
        }

        // Initialize form visibility based on the payment method selected
        document.addEventListener("DOMContentLoaded", function () {
            togglePaymentFields(); // Ensure the correct form is shown on load
        });
    </script>
</body>
</html>