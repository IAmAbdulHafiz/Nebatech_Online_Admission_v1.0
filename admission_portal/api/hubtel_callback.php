<?php
include("../config/database.php");

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if ($data && isset($data['status']) && isset($data['clientReference'])) {
    $status = $data['status'];
    $clientReference = $data['clientReference'];

    $finalStatus = $status === "Success" ? "Completed" : ($status === "Cancelled" ? "Cancelled" : "Pending");

    $query = "UPDATE transactions SET status = :status WHERE reference = :reference";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':status', $finalStatus);
    $stmt->bindParam(':reference', $clientReference);
    $stmt->execute();
}
?>
