<?php
session_start();
include("../config/database.php");

$apiUsername = "YQVXq5A";  // API ID (username)
$apiPassword = "53efb3af42f244e4aad8bb6888be9af8"; // API Key (password)
$posSalesId = "YOUR_POS_SALES_ID";
$callbackUrl = "https://admissions.nebatech.com/api/hubtel_callback.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $customerPhone = $_POST['customer_phone'];
    $channel = $_POST['channel'];
    $amount = 100; // Admission form cost

    $clientReference = uniqid('INV_');

    $postData = [
        'CustomerName' => $customerName,
        'CustomerMsisdn' => $customerPhone,
        'CustomerEmail' => $customerEmail,
        'Channel' => $channel,
        'Amount' => $amount,
        'PrimaryCallbackURL' => $callbackUrl,
        'Description' => 'NTSS Admission Form Payment',
        'ClientReference' => $clientReference
    ];

    $ch = curl_init("https://rmp.hubtel.com/merchantaccount/merchants/$posSalesId/receive/mobilemoney");
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

    if ($paymentResponse && isset($paymentResponse['status']) && $paymentResponse['status'] === 'Success') {
        $query = "INSERT INTO transactions (customer_name, customer_email, customer_phone, amount, reference, status) 
                  VALUES (:customer_name, :customer_email, :customer_phone, :amount, :reference, 'Pending')";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':customer_name', $customerName);
        $stmt->bindParam(':customer_email', $customerEmail);
        $stmt->bindParam(':customer_phone', $customerPhone);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':reference', $clientReference);
        $stmt->execute();

        $_SESSION['success_message'] = "Payment initiated. Complete it on your mobile device.";
        header("Location: ../public/payment_form.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Failed to initiate payment.";
        header("Location: ../public/payment_form.php");
        exit();
    }
}
?>