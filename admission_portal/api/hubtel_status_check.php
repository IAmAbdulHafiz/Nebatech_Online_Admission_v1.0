<?php
$apiUsername = "YQVXq5A";
$apiPassword = "53efb3af42f244e4aad8bb6888be9af8";
$posSalesId = "YOUR_POS_SALES_ID";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['reference'])) {
    $clientReference = $_GET['reference'];

    $ch = curl_init("https://api-txnstatus.hubtel.com/transactions/$posSalesId/status?clientReference=$clientReference");
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