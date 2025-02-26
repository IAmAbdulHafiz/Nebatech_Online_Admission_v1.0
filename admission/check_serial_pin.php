<?php
// check_serial_pin.php
include '../config/database.php'; // adjust path as needed

header('Content-Type: application/json');

$serial = $_GET['serial'] ?? '';
$pin = $_GET['pin'] ?? '';

// Query the transactions table for a matching, completed record
$stmt = $conn->prepare("SELECT is_used FROM transactions WHERE serial_number = :serial AND pin = :pin AND status = 'Completed'");
$stmt->execute(['serial' => $serial, 'pin' => $pin]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // Return true if exists; also indicate if it has already been used
    echo json_encode([
        'exists' => true,
        'used'   => (bool)$result['is_used']
    ]);
} else {
    echo json_encode([
        'exists' => false,
        'used'   => false
    ]);
}
?>