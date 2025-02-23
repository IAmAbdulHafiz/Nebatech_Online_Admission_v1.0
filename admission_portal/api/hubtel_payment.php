<?php
session_start();
include("../config/database.php");

$apiUsername = "lp7pGzl";  // API ID (username)
$apiPassword = "90027d3ef08646b29947a7e8fdfe8a31"; // API Key (password)
$merchantAccountNumber = "2029059"; // Your Hubtel merchant account number
$callbackUrl = "https://admissions.nebatech.com/api/hubtel_callback.php";
$returnUrl = "https://admissions.nebatech.com/payment_success.php";
$cancellationUrl = "https://admissions.nebatech.com/payment_failed.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $customerPhone = $_POST['customer_phone'];
    $amount = 0.30; // Admission form cost
    $clientReference = uniqid('INV_');

    $postData = [ 
        "totalAmount" => $amount,
        "description" => "NTSS Admission Form Payment",
        "callbackUrl" => $callbackUrl,
        "returnUrl" => $returnUrl,
        "cancellationUrl" => $cancellationUrl,
        "merchantAccountNumber" => $merchantAccountNumber,
        "clientReference" => $clientReference
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://payproxyapi.hubtel.com/items/initiate',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("$apiUsername:$apiPassword")
        ],
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $paymentResponse = json_decode($response, true);

    if ($paymentResponse && isset($paymentResponse['status']) && $paymentResponse['status'] === 'Success') {
        $checkoutUrl = $paymentResponse['data']['checkoutDirectUrl']; // URL for iframe

        // Save transaction in the database as pending
        $query = "INSERT INTO transactions (customer_name, customer_email, customer_phone, amount, reference, status) 
                  VALUES (:customer_name, :customer_email, :customer_phone, :amount, :reference, 'Pending')";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':customer_name', $customerName);
        $stmt->bindParam(':customer_email', $customerEmail);
        $stmt->bindParam(':customer_phone', $customerPhone);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':reference', $clientReference);
        $stmt->execute();

        // Redirect to a page where the iframe is displayed
        $_SESSION['checkout_url'] = $checkoutUrl;
        header("Location: ../payment_page.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Failed to initiate payment.";
        header("Location: ../public/payment_form.php");
        exit();
    }
}
?>
