<?php
include '../config/database.php'; // Include your database connection

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serial = $_POST['serial'];
    $pin = $_POST['pin'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Debugging: Print received values
    echo "Received Serial: $serial<br>";
    echo "Received PIN: $pin<br>";

    // Validate serial number and pin
    $query = "SELECT * FROM serial_pins WHERE serial_number = :serial AND pin = :pin";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':serial', $serial);
    $stmt->bindParam(':pin', $pin);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debugging: Check query execution result
    if ($result) {
        echo "Serial and PIN found in database.<br>";
    } else {
        echo "Serial and PIN not found in database.<br>";
    }

    if ($result) {
        // Serial number and pin are valid
        if ($password === $confirmPassword) {
            // Proceed with the registration process
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Save user details to the database
            $insertQuery = "INSERT INTO applicants (email, password, serial_number, pin) VALUES (:email, :password, :serial, :pin)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(':email', $email);
            $insertStmt->bindParam(':password', $hashedPassword);
            $insertStmt->bindParam(':serial', $serial);
            $insertStmt->bindParam(':pin', $pin);
            $insertStmt->execute();

            echo "Registration successful!";
        } else {
            echo "Passwords do not match.";
        }
    } else {
        echo "Invalid Serial Number or PIN.";
    }
}
?>