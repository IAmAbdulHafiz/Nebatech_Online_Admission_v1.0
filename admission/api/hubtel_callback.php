<?php
include("../config/database.php");

$input = file_get_contents('php://input');
$data = json_decode($input, true);
$logFile = 'callback_log.txt';
$timestamp = date('Y-m-d H:i:s');

// Log received callback data for debugging
file_put_contents($logFile, "[$timestamp] Received data: " . print_r($data, true) . "\n", FILE_APPEND);

if ($data && isset($data['ResponseCode']) && isset($data['Data']['ClientReference'])) {
    $responseCode = htmlspecialchars($data['ResponseCode'], ENT_QUOTES, 'UTF-8');
    $status = isset($data['Status']) ? htmlspecialchars($data['Status'], ENT_QUOTES, 'UTF-8') : 'Unknown';
    $clientReference = htmlspecialchars($data['Data']['ClientReference'], ENT_QUOTES, 'UTF-8');
    $amount = filter_var($data['Data']['Amount'], FILTER_VALIDATE_FLOAT);
    $customerPhoneNumber = htmlspecialchars($data['Data']['CustomerPhoneNumber'], ENT_QUOTES, 'UTF-8');
    $paymentDetails = isset($data['Data']['PaymentDetails']) ? $data['Data']['PaymentDetails'] : [];

    if ($amount === false) {
        file_put_contents($logFile, "[$timestamp] Invalid amount for reference $clientReference\n", FILE_APPEND);
        exit();
    }

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