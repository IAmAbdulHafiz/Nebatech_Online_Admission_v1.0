<?php
session_start();
include __DIR__ . "/../../config/database.php";
include("config.php"); // Load environment variables

// Use environment variables for API credentials
$apiUsername = getenv('HUBTEL_API_USERNAME');
$apiPassword = getenv('HUBTEL_API_PASSWORD');
$merchantAccountNumber = getenv('HUBTEL_MERCHANT_ACCOUNT_NUMBER');

// Define URLs – note: the return URL is set to this file for processing confirmation
$callbackUrl = "https://admissions.nebatech.com/admission/api/hubtel_callback.php";
$returnUrl = "https://admissions.nebatech.com/admission/api/hubtel_payment.php";
$cancellationUrl = "https://admissions.nebatech.com/admission/admission_form.php";

// --- Payment Initiation ---
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $customerName  = trim($_POST['customer_name']);
    $customerEmail = trim($_POST['customer_email']);
    $customerPhone = trim($_POST['customer_phone']);
    $amount = 0.30; // GH₵100.00
    $clientReference = uniqid('NTSS_');

    // Insert a pending transaction record
    try {
        $stmt = $conn->prepare("INSERT INTO transactions (customer_name, customer_email, customer_phone, amount, reference, status) VALUES (:customer_name, :customer_email, :customer_phone, :amount, :reference, 'Pending')");
        $stmt->execute([
            'customer_name'  => $customerName,
            'customer_email' => $customerEmail,
            'customer_phone' => $customerPhone,
            'amount'         => $amount,
            'reference'      => $clientReference
        ]);
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Database error: " . $e->getMessage();
        header("Location: ../admission_form.php");
        exit();
    }

    // Save pending data in session for later use
    $_SESSION['pending_payment'] = [
        'customer_name'  => $customerName,
        'customer_email' => $customerEmail,
        'customer_phone' => $customerPhone,
        'amount'         => $amount,
        'reference'      => $clientReference
    ];

    // Prepare the payload for Hubtel
    $postData = [
        "totalAmount"           => $amount,
        "description"           => "NTSS Admission Form Payment",
        "callbackUrl"           => $callbackUrl,
        "returnUrl"             => $returnUrl,
        "cancellationUrl"       => $cancellationUrl,
        "merchantAccountNumber" => $merchantAccountNumber,
        "clientReference"       => $clientReference
    ];

    // Initiate payment via Hubtel API
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => 'https://payproxyapi.hubtel.com/items/initiate',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($postData),
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("$apiUsername:$apiPassword")
        ]
    ]);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        $_SESSION['error_message'] = "Payment gateway error: $error";
        header("Location: ../payment_form.php");
        exit();
    }

    $paymentResponse = json_decode($response, true);
    if (isset($paymentResponse['status']) && $paymentResponse['status'] === 'Success' 
        && isset($paymentResponse['data']['checkoutDirectUrl'])) {

        $checkoutUrl = $paymentResponse['data']['checkoutDirectUrl'];
        $_SESSION['checkout_url'] = $checkoutUrl;

        // Redirect to an internal payment page (with an iframe) or directly to the checkout URL
        header("Location: ../payment_form.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Failed to initiate payment.";
        header("Location: ../admission_form.php");
        exit();
    }
}

// --- Payment Confirmation Section ---
// Instead of relying on a GET parameter named "reference", we now use the pending session data.
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_SESSION['pending_payment'])) {
    // Use the clientReference stored in session
    $clientReference = $_SESSION['pending_payment']['reference'];

    // Generate Serial Number and PIN upon successful payment
    $serialNumber = generateSerialNumber();
    $pin = generatePin();

    // Update the existing transaction record to "Completed" and store the serial & PIN
    try {
        $stmt = $conn->prepare("UPDATE transactions SET status = 'Completed', serial_number = :serial_number, pin = :pin WHERE reference = :reference");
        $stmt->execute([
            'serial_number' => $serialNumber,
            'pin'           => $pin,
            'reference'     => $clientReference
        ]);
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Database update error: " . $e->getMessage();
        header("Location: ../payment_form.php");
        exit();
    }

    // Retrieve customer details from the transaction record
    $stmt = $conn->prepare("SELECT customer_phone, customer_email FROM transactions WHERE reference = :reference");
    $stmt->execute(['reference' => $clientReference]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $customerPhone = $row['customer_phone'];
        $customerEmail = $row['customer_email'];
        sendSMS($customerPhone, "Your Admission Serial: $serialNumber and PIN: $pin. Use these to register at https://nebatech.com/admission/signup.php. For assistance, call 0247636080.");

        sendEmail(
            $customerEmail, 
            "Your Admission Serial & PIN", 
            "Hello,

        Thank you for completing your payment for the NTSS Admission Form.

        Your Admission credentials are as follows:
        Serial: $serialNumber
        PIN: $pin

        Please use these credentials to sign up and complete your application at:
        https://nebatech.com/admission/signup.php

        If you have any questions or need assistance, please contact us at info@nebatech.com or call 0247636080.

        Best regards,
        Nebatech Admissions Team"
        );

    }

    // Clear the pending payment session data
    unset($_SESSION['pending_payment']);
    $_SESSION['success_message'] = "Payment successful! Serial number and PIN have been sent via SMS and Email.";
    header("Location: ../signup.php");
    exit();
}

// --- Functions ---
function generateSerialNumber() {
    global $conn;
    do {
        $serial = 'N' . date('y') . strtoupper(bin2hex(random_bytes(6)));
        $stmt = $conn->prepare("SELECT COUNT(*) FROM serial_pins WHERE serial_number = :serial");
        $stmt->execute(['serial' => $serial]);
    } while ($stmt->fetchColumn() > 0);
    return $serial;
}

function generatePin() {
    return rand(100000, 999999);
}

function sendSMS($phone, $message) {
    $clientSecret = 'jjdblnjg';
    $clientId = 'oxknnhfm';
    $from = 'Nebatech';
    $apiUrl = "https://sms.hubtel.com/v1/messages/send?clientsecret={$clientSecret}&clientid={$clientId}&from={$from}&to={$phone}&content=" . urlencode($message);
    $ch = curl_init();
    curl_setopt_array($ch, [
         CURLOPT_URL            => $apiUrl,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING       => '',
         CURLOPT_MAXREDIRS      => 10,
         CURLOPT_TIMEOUT        => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST  => 'GET'
    ]);
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    if ($error) {
         file_put_contents('sms_error_log.txt', "Error sending SMS to: $phone, error: $error\n", FILE_APPEND);
    } else {
         file_put_contents('sms_log.txt', "SMS sent to: $phone, response: $response\n", FILE_APPEND);
    }
}

function sendEmail($to, $subject, $body) {
    $headers = "From: no-reply@nebatech.com\r\nContent-Type: text/plain;";
    if (!mail($to, $subject, $body, $headers)) {
        file_put_contents('email_log.txt', "Failed to send email to: $to\nSubject: $subject\n", FILE_APPEND);
    }
}
?>