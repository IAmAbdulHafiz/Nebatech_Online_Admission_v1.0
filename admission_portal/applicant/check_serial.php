<?php
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['serial'])) {
    $serial = $_POST['serial'];

    // Check if the serial number has already been used
    $query = "SELECT * FROM serial_pins WHERE serial_number = :serial AND used = 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":serial", $serial);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "used";
    } else {
        echo "available";
    }
}
?>