<?php
$apiUsername = "YQVXq5A";
$apiPassword = "53efb3af42f244e4aad8bb6888be9af8";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['reference'])) {
    $clientReference = $_GET['reference'];

    $ch = curl_init("https://rmp.hubtel.com/merchantaccount/transactions/$clientReference");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Basic ' . base64_encode("$apiUsername:$apiPassword"),
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
}
?>