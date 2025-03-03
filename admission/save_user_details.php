<?php
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serial = $_POST['serial'];
    $pin = $_POST['pin'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Save to database
    $sql = "INSERT INTO applicants (serial_number, pin, email, password) VALUES ('$serial', '$pin', '$email', '$hashed_password')";
    if (mysqli_query($conn, $sql)) {
        echo "User details saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>