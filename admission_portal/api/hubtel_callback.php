<?php
include("../config/database.php");

// Read JSON payload
$payload = file_get_contents("php://input");
$data = json_decode($payload, true);

if ($data && isset($data["Data"])) {
    $clientReference = $data["Data"]["ClientReference"];
    $status = $data["Data"]["Status"];

    if ($status === "Success") {
        $newStatus = "Completed";
    } elseif ($status === "Cancelled") {
        $newStatus = "Cancelled";
    } else {
        $newStatus = "Pending";
    }

    // Update transaction status in the database
    $query = "UPDATE transactions SET status = :status WHERE reference = :reference";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':status', $newStatus);
    $stmt->bindParam(':reference', $clientReference);
    $stmt->execute();
}
?>
