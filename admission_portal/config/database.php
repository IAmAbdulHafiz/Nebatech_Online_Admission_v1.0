<?php
// Database configuration
$host = "localhost";
$db_name = "u948335622_nebatech";
$username = "u948335622_nebatech";
$password = "AbdulP@$$w0r_D";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
?>