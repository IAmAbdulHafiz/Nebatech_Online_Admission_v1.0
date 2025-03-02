<?php
require '../config/database.php'; // Database connection

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Error: Invalid request method.");
}

// Ensure all required fields are received
$requiredFields = ['serial', 'pin', 'email', 'password', 'confirm-password', 'firstName', 'surname'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
        die("Error: Missing required field - $field");
    }
}

// Sanitize user input
$serial = htmlspecialchars(trim($_POST['serial']));
$pin = htmlspecialchars(trim($_POST['pin']));
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];
$firstName = htmlspecialchars(trim($_POST['firstName']));
$surname = htmlspecialchars(trim($_POST['surname']));

// Log the received password and confirm password values
error_log("Password: $password");
error_log("Confirm Password: $confirmPassword");

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: Invalid email format.");
}

// Validate password match
if ($password !== $confirmPassword) {
    error_log("Passwords do not match: Password - $password, Confirm Password - $confirmPassword");
    header("Location: signup.php?error=Passwords+do+not+match");
    exit();
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Validate Serial and PIN in transactions table
$query = "SELECT * FROM transactions WHERE serial_number = :serial AND pin = :pin AND status = 'Completed' AND is_used = 0";
$stmt = $conn->prepare($query);
$stmt->bindParam(':serial', $serial);
$stmt->bindParam(':pin', $pin);
$stmt->execute();
$transaction = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$transaction) {
    die("Error: Invalid Serial Number or PIN or already used.");
}

// Check if serial is already used in applicants table
$checkSerialQuery = "SELECT * FROM applicants WHERE serial_number = :serial";
$checkSerialStmt = $conn->prepare($checkSerialQuery);
$checkSerialStmt->bindParam(':serial', $serial);
$checkSerialStmt->execute();
if ($checkSerialStmt->fetch(PDO::FETCH_ASSOC)) {
    die("Error: Serial Number is already used.");
}

// Insert into applicants table
$insertQuery = "INSERT INTO applicants (email, password, serial_number, pin, first_name, surname, is_used) 
                VALUES (:email, :password, :serial, :pin, :first_name, :surname, 1)";
$insertStmt = $conn->prepare($insertQuery);
$insertStmt->bindParam(':email', $email);
$insertStmt->bindParam(':password', $hashedPassword);
$insertStmt->bindParam(':serial', $serial);
$insertStmt->bindParam(':pin', $pin);
$insertStmt->bindParam(':first_name', $firstName);
$insertStmt->bindParam(':surname', $surname);
$insertStmt->execute();

// Mark the transaction as used
$updateQuery = "UPDATE transactions SET is_used = 1 WHERE serial_number = :serial AND pin = :pin";
$updateStmt = $conn->prepare($updateQuery);
$updateStmt->bindParam(':serial', $serial);
$updateStmt->bindParam(':pin', $pin);
$updateStmt->execute();

// Redirect to login with success message
header("Location: signup.php?msg=Account+created+successfully!");
exit();
?>
