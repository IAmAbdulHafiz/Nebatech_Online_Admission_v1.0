<?php
include("../config/database.php");

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if ($data && isset($data['ResponseCode']) && $data['ResponseCode'] === '0000') {
    $clientReference = $data['Data']['ClientReference'];
    $status = $data['Data']['Status'];
    $amount = $data['Data']['Amount'];
    $customerPhoneNumber = $data['Data']['CustomerPhoneNumber'];

    $query = "UPDATE transactions SET status = :status WHERE reference = :reference";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':reference', $clientReference);
    $stmt->execute();

    // Optionally, you can send a confirmation SMS to the customer
    $smsMessage = "Your payment of $amount was successful. You will recieve your Serial Number & PIN shortly.";
    $smsData = [
        'From' => 'Nebatech',
        'To' => $customerPhoneNumber,
        'Content' => $smsMessage
    ];

    $ch = curl_init("https://sms.hubtel.com/v1/messages/send");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Basic ' . base64_encode("$smsApiUsername:$smsApiPassword"),
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($smsData));

    $smsResponse = curl_exec($ch);
    curl_close($ch);
} else {
    // Log error or handle failed callback
    error_log("Failed callback: " . json_encode($data));
}
?>