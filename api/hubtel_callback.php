<?php
include("../config/database.php");

$rawPayload = file_get_contents('php://input');
$callbackData = json_decode($rawPayload, true);

if ($callbackData && isset($callbackData['ResponseCode']) && $callbackData['ResponseCode'] === "0000") {
    $clientReference = $callbackData['Data']['ClientReference'];
    $status = $callbackData['Data']['Status'];

    $query = "UPDATE transactions SET status = :status WHERE reference = :reference";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':reference', $clientReference);
    $stmt->execute();

    http_response_code(200);
    echo json_encode(["message" => "Payment updated successfully"]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid Callback"]);
}
?>