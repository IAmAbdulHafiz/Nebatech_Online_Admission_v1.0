<?php
session_start();

// Check the role of the user
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role']; // Get the user's role
} else {
    $role = null; // Default role if no session exists
}

// Destroy the session
session_destroy();

// Redirect back to the login form with a message
if ($role == 'admin') {
    header("Location: login.php?logout=admin");
} elseif ($role == 'registrar') {
    header("Location: ../login.php?logout=registrar");
} else {
    header("Location: ../admin/login.php?logout=unknown");
}
exit();
?>
