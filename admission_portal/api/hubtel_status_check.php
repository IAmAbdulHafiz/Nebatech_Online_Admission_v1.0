<?php
include("../config/database.php");

$apiUsername = "YQVXq5A";
$apiPassword = "53efb3af42f244e4aad8bb6888be9af8";
$posSalesId = "2022026";

// Fetch pending transactions
$query = "SELECT reference FROM transactions WHERE status = 'Pending'";
$stmt = $conn->prepare($query);
$stmt->execute();
$pendingPayments = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($pendingPayments as $payment) {
    $clientReference = $payment['reference'];

    $ch = curl_init("https://api-txnstatus.hubtel.com/transactions/$posSalesId/status?clientReference=$clientReference");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Basic ' . base64_encode("$apiUsername:$apiPassword"),
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    curl_close($ch);
    $statusResponse = json_decode($response, true);

    if ($statusResponse && isset($statusResponse["data"]["status"])) {
        $finalStatus = $statusResponse["data"]["status"] === "Paid" ? "Completed" : ($statusResponse["data"]["status"] === "Unpaid" ? "Pending" : "Cancelled");

        $query = "UPDATE transactions SET status = :status WHERE reference = :reference";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':status', $finalStatus);
        $stmt->bindParam(':reference', $clientReference);
        $stmt->execute();
    }
}
?>
