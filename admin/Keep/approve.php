<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include("../config/database.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update application status to 'Completed'
    $query = "UPDATE applications SET application_status = 'Completed' WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}
?>
