<?php
session_start();
include("../config/database.php");

$apiUsername = "YQVXq5A";  // API ID (username)
$apiPassword = "53efb3af42f244e4aad8bb6888be9af8"; // API Key (password)
$merchantAccountNumber = "11684";
$callbackUrl = "https://admissions.nebatech.com/api/hubtel_callback.php";
$returnUrl = "http://hubtel.com/online";
$cancellationUrl = "http://hubtel.com/online";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $customerPhone = $_POST['customer_phone'];
    $amount = 100; // Admission form cost

    $clientReference = uniqid('INV_');

    $postData = [
        'totalAmount' => $amount,
        'description' => 'NTSS Admission Form Payment',
        'callbackUrl' => $callbackUrl,
        'returnUrl' => $returnUrl,
        'merchantAccountNumber' => $merchantAccountNumber,
        'cancellationUrl' => $cancellationUrl,
        'clientReference' => $clientReference
    ];

    $ch = curl_init("https://payproxyapi.hubtel.com/items/initiate");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Basic ' . base64_encode("$apiUsername:$apiPassword"),
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

    $response = curl_exec($ch);
    curl_close($ch);

    $paymentResponse = json_decode($response, true);

    if ($paymentResponse && isset($paymentResponse['responseCode']) && $paymentResponse['responseCode'] === '0000') {
        $checkoutDirectUrl = $paymentResponse['data']['checkoutDirectUrl'];

        $query = "INSERT INTO transactions (customer_name, customer_email, customer_phone, amount, reference, status) 
                  VALUES (:customer_name, :customer_email, :customer_phone, :amount, :reference, 'Pending')";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':customer_name', $customerName);
        $stmt->bindParam(':customer_email', $customerEmail);
        $stmt->bindParam(':customer_phone', $customerPhone);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':reference', $clientReference);
        $stmt->execute();

        echo "<iframe src='$checkoutDirectUrl' width='100%' height='600px'></iframe>";
    } else {
        $_SESSION['error_message'] = "Failed to initiate payment.";
        header("Location: ../payment_form.php");
        exit();
    }
}
?>