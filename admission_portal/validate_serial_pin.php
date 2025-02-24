<?php
include '../config/database.php'; // Include your database connection

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serial = trim($_POST['serial']);
    $pin = trim($_POST['pin']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Validate serial number and PIN using the transactions table,
    // ensuring the transaction is completed and unused.
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
        // No valid transaction record found
        header("Location: signup.php?error=Invalid+Serial+Number+or+PIN+or+already+used");
        exit();
    }

    // Check if the serial number is already used in the applicants table
    $checkSerialQuery = "SELECT * FROM applicants WHERE serial_number = :serial";
    $checkSerialStmt = $conn->prepare($checkSerialQuery);
    $checkSerialStmt->bindParam(':serial', $serial);
    $checkSerialStmt->execute();
    $serialUsed = $checkSerialStmt->fetch(PDO::FETCH_ASSOC);

    if ($serialUsed) {
        header("Location: signup.php?error=Serial+Number+is+already+used");
        exit();
    }

    // Check if the passwords match
    if ($password !== $confirmPassword) {
        header("Location: signup.php?error=Passwords+do+not+match");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user details into the applicants table, marking the serial as used
    $insertQuery = "INSERT INTO applicants (email, password, serial_number, pin, is_used) 
                    VALUES (:email, :password, :serial, :pin, 1)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bindParam(':email', $email);
    $insertStmt->bindParam(':password', $hashedPassword);
    $insertStmt->bindParam(':serial', $serial);
    $insertStmt->bindParam(':pin', $pin);
    $insertStmt->execute();

    // Mark the serial number/PIN as used in the transactions table
    $updateQuery = "UPDATE transactions 
                    SET is_used = 1 
                    WHERE serial_number = :serial AND pin = :pin";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bindParam(':serial', $serial);
    $updateStmt->bindParam(':pin', $pin);
    $updateStmt->execute();

    // Redirect to login after successful registration
    header("Location: login.php?msg=Registration+successful");
    exit();
}
?>
