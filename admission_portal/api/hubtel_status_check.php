<?php
include("../config/database.php");
include("config.php"); // Load environment variables

// Use environment variables for API credentials
$apiUsername = getenv('HUBTEL_API_USERNAME');
$apiPassword = getenv('HUBTEL_API_PASSWORD');
$posSalesId = getenv('HUBTEL_MERCHANT_ACCOUNT_NUMBER');

$logFile = 'status_check_log.txt';
$timestamp = date('Y-m-d H:i:s');

// Fetch pending transactions
$query = "SELECT reference FROM transactions WHERE status = 'Pending'";
$stmt = $conn->prepare($query);
$stmt->execute();
$pendingPayments = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($pendingPayments as $payment) {
    $clientReference = $payment['reference'];
    $apiUrl = "https://api-txnstatus.hubtel.com/transactions/$posSalesId/status?clientReference=$clientReference";

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Basic ' . base64_encode("$apiUsername:$apiPassword"),
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($curlError) {
        file_put_contents($logFile, "[$timestamp] cURL error for reference $clientReference: $curlError\n", FILE_APPEND);
        continue;
    }

    $statusResponse = json_decode($response, true);
    if ($statusResponse && isset($statusResponse["data"]["status"])) {
        $hubtelStatus = $statusResponse["data"]["status"];
        $finalStatus = ($hubtelStatus === "Paid") ? "Completed" : (($hubtelStatus === "Unpaid") ? "Pending" : "Cancelled");

        try {
            $updateQuery = "UPDATE transactions SET status = :status WHERE reference = :reference";
            $stmtUpdate = $conn->prepare($updateQuery);
            $stmtUpdate->bindParam(':status', $finalStatus);
            $stmtUpdate->bindParam(':reference', $clientReference);
            $stmtUpdate->execute();

            file_put_contents($logFile, "[$timestamp] Updated transaction $clientReference to status: $finalStatus\n", FILE_APPEND);
        } catch (Exception $e) {
            file_put_contents($logFile, "[$timestamp] Error updating transaction $clientReference: " . $e->getMessage() . "\n", FILE_APPEND);
        }
    } else {
        file_put_contents($logFile, "[$timestamp] Invalid API response for reference $clientReference: " . print_r($statusResponse, true) . "\n", FILE_APPEND);
    }
}
?>