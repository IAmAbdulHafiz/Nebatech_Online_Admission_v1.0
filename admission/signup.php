<?php
// Include your external database configuration
include('../config/database.php'); // This file should initialize the $conn variable

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $serial       = trim($_POST['serial_number']);
    $pin          = trim($_POST['pin']);
    $first_name   = trim($_POST['first_name']);
    $surname      = trim($_POST['surname']);
    $email        = trim($_POST['email']);
    $password     = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    // Validate required fields
    if (empty($serial) || empty($pin) || empty($first_name) || empty($surname) || empty($email) || empty($password) || empty($confirm_pass)) {
        echo "All fields are required.";
        exit;
    }

    // Check if passwords match
    if ($password !== $confirm_pass) {
        echo "Passwords do not match.";
        exit;
    }

    // Validate Serial Number and PIN from the transactions table
    $stmt = $conn->prepare("SELECT id, status, is_used FROM transactions WHERE serial_number = ? AND pin = ?");
    $stmt->bind_param("ss", $serial, $pin);
    $stmt->execute();
    $result = $stmt->get_result();

    // If no record found, invalid credentials
    if ($result->num_rows === 0) {
        echo "Invalid Serial Number or PIN.";
        exit;
    }

    $transaction = $result->fetch_assoc();

    // Check if the transaction is completed and not already used
    if ($transaction['status'] !== 'Completed') {
        echo "The transaction is not completed.";
        exit;
    }
    if ($transaction['is_used']) {
        echo "This Serial Number and PIN have already been used.";
        exit;
    }

    // Optional: Check if this serial number and PIN have already been registered in applicants table
    $stmt_check = $conn->prepare("SELECT id FROM applicants WHERE serial_number = ? AND pin = ?");
    $stmt_check->bind_param("ss", $serial, $pin);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    if ($result_check->num_rows > 0) {
        echo "This Serial Number and PIN combination is already registered.";
        exit;
    }

    // Hash the password before storing it
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Insert the new applicant into the applicants table
    $stmt_insert = $conn->prepare("INSERT INTO applicants (serial_number, pin, first_name, surname, email, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt_insert->bind_param("ssssss", $serial, $pin, $first_name, $surname, $email, $passwordHash);

    if ($stmt_insert->execute()) {
        // Mark the transaction as used
        $stmt_update = $conn->prepare("UPDATE transactions SET is_used = 1 WHERE id = ?");
        $stmt_update->bind_param("i", $transaction['id']);
        $stmt_update->execute();

        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt_insert->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <style>
        /* Basic styles for the form */
        form { max-width: 400px; margin: 0 auto; }
        label { display: block; margin-top: 15px; }
        input[type="text"],
        input[type="email"],
        input[type="password"] { width: 100%; padding: 8px; }
        button { margin-top: 20px; padding: 10px 15px; }
    </style>
</head>
<body>
    <form method="post" action="">
        <h2>Register</h2>
        <label for="serial_number">Serial Number:</label>
        <input type="text" id="serial_number" name="serial_number" required>

        <label for="pin">PIN:</label>
        <input type="text" id="pin" name="pin" required>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>
