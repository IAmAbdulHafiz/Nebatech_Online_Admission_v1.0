<?php
include("../config/database.php");

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if ($data && isset($data['ResponseCode']) && isset($data['Data']['ClientReference'])) {
    $responseCode = $data['ResponseCode'];
    $status = $data['Status'];
    $clientReference = $data['Data']['ClientReference'];
    $amount = $data['Data']['Amount'];
    $customerPhoneNumber = $data['Data']['CustomerPhoneNumber'];
    $paymentDetails = $data['Data']['PaymentDetails'];

    $finalStatus = $status === "Success" ? "Completed" : ($status === "Cancelled" ? "Cancelled" : "Pending");

    $query = "UPDATE transactions SET status = :status, amount = :amount, customer_phone = :customer_phone, payment_details = :payment_details WHERE reference = :reference";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':status', $finalStatus);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':customer_phone', $customerPhoneNumber);
    $stmt->bindParam(':payment_details', json_encode($paymentDetails));
    $stmt->bindParam(':reference', $clientReference);
    $stmt->execute();
}
?>
