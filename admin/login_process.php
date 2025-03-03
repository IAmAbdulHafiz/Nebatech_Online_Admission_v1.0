<?php
// Start the session
session_start();

// Database connection
include("../config/database.php");

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Use MD5 for testing, replace with password_verify in production.

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
    
        // Redirect based on role
        if ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } elseif ($user['role'] == 'registrar') {
            header("Location: ../registrar/registrar_dashboard.php");
        } elseif ($user['role'] == 'applicant') {
            header("Location: ../applicant/applicant_dashboard.php");
        }
        exit();
    } else {
        // Invalid credentials
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: login.php");
        exit();
    }
}
?>
