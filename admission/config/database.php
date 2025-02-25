<?php
include 'config/config.php';

// Database configuration

$host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');

//$db_name = "u948335622_nebatech";
//$username = "u948335622_nebatech";
//$password = "imAbdulHafiz@122996";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
?>