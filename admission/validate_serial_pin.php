<?php
include '../config/database.php'; // Include your database connection

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debugging output
    var_dump($_POST);
    exit(); // Check if passwords are received correctly

    if (!isset($_POST['password'], $_POST['confirm-password'])) {
        die("Error: Password fields are missing.");
    }

    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm-password']);

    // Debugging output before comparing passwords
    var_dump($password, $confirmPassword);
    exit(); // Check if they match exactly

    if ($password !== $confirmPassword) {
        header("Location: signup.php?error=Passwords+do+not+match");
        exit();
    }
}
?>
<!--

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate required fields
    if (!isset($_POST['serial'], $_POST['pin'], $_POST['email'], $_POST['password'], $_POST['confirm-password'], $_POST['firstName'], $_POST['surname'])) {
        header("Location: signup.php?error=Missing+required+fields");
        exit();
    }

    $serial = htmlspecialchars(trim($_POST['serial']));
    $pin = htmlspecialchars(trim($_POST['pin']));
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $firstName = htmlspecialchars(trim($_POST['firstName']));
    $surname = htmlspecialchars(trim($_POST['surname']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?error=Invalid+email+format");
        exit();
    }

    var_dump($_POST['password'], $_POST['confirm-password']);
    exit();
    // Validate password match
    if ($password !== $confirmPassword) {
        header("Location: signup.php?error=Passwords+do+not+match");
        exit();
    }

    // Hash password after validation
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Validate serial number and PIN
    $query = "SELECT * FROM transactions 
              WHERE serial_number = :serial 
                AND pin = :pin 
                AND status = 'Completed'
                AND is_used = 0";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':serial', $serial);
    $stmt->bindParam(':pin', $pin);
    $stmt->execute();
    $transaction = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$transaction) {
        header("Location: signup.php?error=Invalid+Serial+Number+or+PIN+or+already+used");
        exit();
    }

    // Check if the serial number is already used in applicants table
    $checkSerialQuery = "SELECT 1 FROM applicants WHERE serial_number = :serial";
    $checkSerialStmt = $conn->prepare($checkSerialQuery);
    $checkSerialStmt->bindParam(':serial', $serial);
    $checkSerialStmt->execute();

    if ($checkSerialStmt->fetch()) {
        header("Location: signup.php?error=Serial+Number+is+already+used");
        exit();
    }

    // Insert user details into applicants table
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

    // Mark the serial number/PIN as used in the transactions table
    $updateQuery = "UPDATE transactions SET is_used = 1 WHERE serial_number = :serial AND pin = :pin";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bindParam(':serial', $serial);
    $updateStmt->bindParam(':pin', $pin);
    $updateStmt->execute();

    // Redirect to login after successful registration
    header("Location: signup.php?msg=Account+created+successfully!");
    exit();
}
?>-->