<?php
session_start();
include("../config/database.php");

// Payment API details
$paymentApiUsername = "YQVXq5A";  // API ID
$paymentApiPassword = "jjdblnjg"; // Client secret
$merchantAccountNumber = "11684";
$callbackUrl = "https://admissions.nebatech.com/api/hubtel_callback.php";
$returnUrl = "http://hubtel.com/online";
$cancellationUrl = "http://hubtel.com/online";

// SMS API details
$smsApiUsername = "oxknnhfm";  // Client ID
$smsApiPassword = "jjdblnjg"; // Client secret

function generateSerialNumber() {
    $year = date('y'); // Get the current year in two digits
    $randomDigits = strtoupper(bin2hex(random_bytes(4))); // Generates 8 random hexadecimal digits
    return 'N' . $year . $randomDigits; // Combine to form the serial number
}

function generatePin() {
    return rand(100000, 999999); // Generates a 6-digit pin
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $customerPhone = $_POST['customer_phone'];
    $paymentPhone = $_POST['payment_phone'];
    $channel = $_POST['channel'];
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
        'Authorization: Basic ' . base64_encode("$paymentApiUsername:$paymentApiPassword"),
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

    $response = curl_exec($ch);
    curl_close($ch);

    $paymentResponse = json_decode($response, true);

    if ($paymentResponse && isset($paymentResponse['responseCode']) && $paymentResponse['responseCode'] === '0000') {
        $serialNumber = generateSerialNumber();
        $pin = generatePin();

        $query = "INSERT INTO transactions (customer_name, customer_email, customer_phone, amount, reference, status, serial_number, pin) 
                  VALUES (:customer_name, :customer_email, :customer_phone, :amount, :reference, 'Pending', :serial_number, :pin)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':customer_name', $customerName);
        $stmt->bindParam(':customer_email', $customerEmail);
        $stmt->bindParam(':customer_phone', $customerPhone);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':reference', $clientReference);
        $stmt->bindParam(':serial_number', $serialNumber);
        $stmt->bindParam(':pin', $pin);
        $stmt->execute();

        // Send SMS with Serial Number and PIN
        $smsMessage = "Your payment was successful. Use the Serial Number: $serialNumber, PIN: $pin to Signup & complete your application.";
        $smsData = [
            'From' => 'Nebatech',
            'To' => $customerPhone,
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

        $_SESSION['success_message'] = "Payment initiated. Complete it on your mobile device by entering your MoMo PIN.";
        header("Location: ../public/payment_form.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Failed to initiate payment.";
        header("Location: ../public/payment_form.php");
        exit();
    }
}
?>