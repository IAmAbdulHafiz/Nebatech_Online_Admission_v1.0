<?php
session_start();
include("../config/database.php");
include("config.php"); // Load environment variables

// Use environment variables for API credentials
$apiUsername = getenv('HUBTEL_API_USERNAME');
$apiPassword = getenv('HUBTEL_API_PASSWORD');
$merchantAccountNumber = getenv('HUBTEL_MERCHANT_ACCOUNT_NUMBER');

// Define URLs
$callbackUrl = "https://admissions.nebatech.com/api/hubtel_callback.php";
$returnUrl = "https://admissions.nebatech.com/admission_portal/signup.php";
$cancellationUrl = "https://admissions.nebatech.com/admission_portal/admission_form.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $customerName  = trim($_POST['customer_name']);
    $customerEmail = trim($_POST['customer_email']);
    $customerPhone = trim($_POST['customer_phone']);
    $amount = 0.30; // Admission form fee: GH₵100
    $clientReference = uniqid('NTSS_');

    $postData = [
        "totalAmount"             => $amount,
        "description"             => "NTSS Admission Form Payment",
        "callbackUrl"             => $callbackUrl,
        "returnUrl"               => $returnUrl,
        "cancellationUrl"         => $cancellationUrl,
        "merchantAccountNumber"   => $merchantAccountNumber,
        "clientReference"         => $clientReference
    ];

    // Initialize cURL for payment initiation
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => 'https://payproxyapi.hubtel.com/items/initiate',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($postData),
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("$apiUsername:$apiPassword")
        ],
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

        // Store customer data in session for use after payment confirmation
        $_SESSION['pending_payment'] = [
            'customer_name'  => $customerName,
            'customer_email' => $customerEmail,
            'customer_phone' => $customerPhone,
            'amount'         => $amount,
            'reference'      => $clientReference
        ];

        $checkoutUrl = $paymentResponse['data']['checkoutDirectUrl'];

        // Save checkout URL to session so payment_form.php can load it in an iframe
        $_SESSION['checkout_url'] = $checkoutUrl;

        // Redirect to your internal payment page instead of directly to the checkout URL
        header("Location: ../payment_form.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Failed to initiate payment.";
        header("Location: ../admission_form.php");
        exit();
    }

}

// Payment Confirmation Section – executed when the payment gateway redirects back
if (!empty($_GET['reference']) && !empty($_SESSION['pending_payment'])) {
    $clientReference = $_GET['reference'];
    // Verify that the session-stored reference matches the callback reference
    if ($_SESSION['pending_payment']['reference'] === $clientReference) {
        $customerName  = $_SESSION['pending_payment']['customer_name'];
        $customerEmail = $_SESSION['pending_payment']['customer_email'];
        $customerPhone = $_SESSION['pending_payment']['customer_phone'];
        $amount        = $_SESSION['pending_payment']['amount'];

        // Generate Serial Number and PIN
        $serialNumber = generateSerialNumber();
        $pin = generatePin();

        // Save Serial & PIN and transaction details in the database after successful payment
        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO serial_pins (serial_number, pin, used) VALUES (:serial_number, :pin, 0)");
            $stmt->execute(['serial_number' => $serialNumber, 'pin' => $pin]);

            $stmt = $conn->prepare("INSERT INTO transactions 
                (customer_name, customer_email, customer_phone, amount, reference, status, serial_number, pin) 
                VALUES (:customer_name, :customer_email, :customer_phone, :amount, :reference, 'Completed', :serial_number, :pin)");
            $stmt->execute([
                'customer_name'  => $customerName,
                'customer_email' => $customerEmail,
                'customer_phone' => $customerPhone,
                'amount'         => $amount,
                'reference'      => $clientReference,
                'serial_number'  => $serialNumber,
                'pin'            => $pin
            ]);
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            $_SESSION['error_message'] = "Database error: " . $e->getMessage();
            header("Location: ../payment_form.php");
            exit();
        }

        // Send SMS & Email with the Serial Number and PIN
        sendSMS($customerPhone, "Your Serial: $serialNumber, PIN: $pin. Apply at https://nebatech.com/admission_portal/signup.php");
        sendEmail($customerEmail, "Your Admission Serial & PIN", "Serial: $serialNumber\nPIN: $pin\nApply at: https://nebatech.com/admission_portal/signup.php");

        // Clear the pending payment session data
        unset($_SESSION['pending_payment']);

        $_SESSION['success_message'] = "Payment successful! Serial number and PIN have been sent via SMS and Email.";
        header("Location: ../signup.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Payment reference mismatch.";
        header("Location: ../payment_form.php");
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
    // Your Hubtel SMS API credentials
    $clientSecret = 'jjdblnjg';
    $clientId = 'oxknnhfm';
    $from = 'Nebatech';
    
    // Construct the API URL with dynamic phone number and message content
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
         CURLOPT_CUSTOMREQUEST  => 'GET',
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
