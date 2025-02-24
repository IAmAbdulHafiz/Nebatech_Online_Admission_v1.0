<?php
session_start();
include("../config/database.php");
include("config.php"); // Add this line to load environment variables

// Use environment variables for API credentials
$apiUsername = getenv('HUBTEL_API_USERNAME');
$apiPassword = getenv('HUBTEL_API_PASSWORD');
$merchantAccountNumber = getenv('HUBTEL_MERCHANT_ACCOUNT_NUMBER');

// Define URLs
$callbackUrl = "https://admissions.nebatech.com/api/hubtel_callback.php";
$returnUrl = "https://admissions.nebatech.com/admission_portal/payment_success.php";
$cancellationUrl = "https://admissions.nebatech.com/payment_failed.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $customerName = trim($_POST['customer_name']);
    $customerEmail = trim($_POST['customer_email']);
    $customerPhone = trim($_POST['customer_phone']);
    $amount = 1; // Corrected admission form price
    $clientReference = uniqid('NTSS_');

    $postData = [
        "totalAmount" => $amount,
        "description" => "NTSS Admission Form Payment",
        "callbackUrl" => $callbackUrl,
        "returnUrl" => $returnUrl,
        "cancellationUrl" => $cancellationUrl,
        "merchantAccountNumber" => $merchantAccountNumber,
        "clientReference" => $clientReference
    ];

    // Initialize cURL
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://payproxyapi.hubtel.com/items/initiate',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("$apiUsername:$apiPassword")
        ],
    ]);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        $_SESSION['error_message'] = "Payment gateway error: $error";
        header("Location: ../public/payment_form.php");
        exit();
    }

    $paymentResponse = json_decode($response, true);
    if (isset($paymentResponse['status']) && $paymentResponse['status'] === 'Success' && isset($paymentResponse['data']['checkoutDirectUrl'])) {
        $checkoutUrl = $paymentResponse['data']['checkoutDirectUrl'];
        // Generate Serial Number and PIN
        $serialNumber = generateSerialNumber();
        $pin = generatePin();
        // Save Serial & PIN in DB
        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO serial_pins (serial_number, pin, used) VALUES (:serial_number, :pin, 0)");
            $stmt->execute(['serial_number' => $serialNumber, 'pin' => $pin]);
            $stmt = $conn->prepare("INSERT INTO transactions (customer_name, customer_email, customer_phone, amount, reference, status, serial_number, pin) 
                                    VALUES (:customer_name, :customer_email, :customer_phone, :amount, :reference, 'Pending', :serial_number, :pin)");
            $stmt->execute([
                'customer_name' => $customerName,
                'customer_email' => $customerEmail,
                'customer_phone' => $customerPhone,
                'amount' => $amount,
                'reference' => $clientReference,
                'serial_number' => $serialNumber,
                'pin' => $pin
            ]);
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            $_SESSION['error_message'] = "Database error: " . $e->getMessage();
            header("Location: ../public/payment_form.php");
            exit();
        }
        $_SESSION['checkout_url'] = $checkoutUrl;
        header("Location: ../payment_form.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Failed to initiate payment.";
        header("Location: ../public/payment_form.php");
        exit();
    }
}

// Payment Confirmation Section
if (!empty($_GET['reference'])) {
    $clientReference = $_GET['reference'];
    $transaction = getTransactionByReference($clientReference);
    if ($transaction) {
        $serial_number = $transaction['serial_number'];
        $pin = $transaction['pin'];
        $customer_phone = $transaction['customer_phone'];
        $customer_email = $transaction['customer_email'];
        // Send SMS & Email
        sendSMS($customer_phone, "Your Serial: $serial_number, PIN: $pin. Apply at https://nebatech.com/admission_portal/signup.php");
        sendEmail($customer_email, "Your Admission Serial & PIN", "Serial: $serial_number\nPIN: $pin\nApply at: https://nebatech.com/admission_portal/signup.php");
        // Update Transaction Status
        $stmt = $conn->prepare("UPDATE transactions SET status = 'Completed' WHERE reference = :reference");
        $stmt->execute(['reference' => $clientReference]);
        $_SESSION['success_message'] = "Payment successful! Check SMS & Email.";
        header("Location: ../signup.php");
        exit();
    }
}

// Functions
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
    // Use an SMS gateway API (e.g., Twilio, Hubtel SMS)
    file_put_contents('sms_log.txt', "SMS to: $phone\nMessage: $message\n", FILE_APPEND);
}

function sendEmail($to, $subject, $body) {
    $headers = "From: no-reply@nebatech.com\r\nContent-Type: text/plain;";
    if (!mail($to, $subject, $body, $headers)) {
        file_put_contents('email_log.txt', "Failed to send email to: $to\nSubject: $subject\n", FILE_APPEND);
    }
}

function getTransactionByReference($reference) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM transactions WHERE reference = :reference");
    $stmt->execute(['reference' => $reference]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
