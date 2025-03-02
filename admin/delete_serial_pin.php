<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/delete_serial_pin.php

include '../config/database.php'; // Include your database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the serial pin
    $deleteQuery = "DELETE FROM serial_pins WHERE id = :id";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

header('Location: generate_serial_pin.php');
exit;
?>