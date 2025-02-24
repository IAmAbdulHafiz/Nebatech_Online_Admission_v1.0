<?php
include("../config/database.php");

$input = file_get_contents('php://input');
$data = json_decode($input, true);
$logFile = 'callback_log.txt';
$timestamp = date('Y-m-d H:i:s');

// Log received callback data for debugging
file_put_contents($logFile, "[$timestamp] Received data: " . print_r($data, true) . "\n", FILE_APPEND);

if ($data && isset($data['ResponseCode']) && isset($data['Data']['ClientReference'])) {
    $responseCode = $data['ResponseCode'];
    $status = isset($data['Status']) ? $data['Status'] : 'Unknown';
    $clientReference = $data['Data']['ClientReference'];
    $amount = $data['Data']['Amount'];
    $customerPhoneNumber = $data['Data']['CustomerPhoneNumber'];
    $paymentDetails = isset($data['Data']['PaymentDetails']) ? $data['Data']['PaymentDetails'] : [];

    $finalStatus = ($status === "Success") ? "Completed" : (($status === "Cancelled") ? "Cancelled" : "Pending");

    try {
        // Update the transaction record if it exists
        $query = "UPDATE transactions 
                  SET status = :status, amount = :amount, customer_phone = :customer_phone, payment_details = :payment_details 
                  WHERE reference = :reference";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':status', $finalStatus);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':customer_phone', $customerPhoneNumber);
        $paymentDetailsJson = json_encode($paymentDetails);
        $stmt->bindParam(':payment_details', $paymentDetailsJson);
        $stmt->bindParam(':reference', $clientReference);
        $stmt->execute();

        file_put_contents($logFile, "[$timestamp] Updated status to: $finalStatus for reference: $clientReference\n", FILE_APPEND);
    } catch (Exception $e) {
        file_put_contents($logFile, "[$timestamp] Error updating transaction: " . $e->getMessage() . "\n", FILE_APPEND);
    }
}

header('Content-Type: application/json');
echo json_encode(["status" => "ok"]);
?>