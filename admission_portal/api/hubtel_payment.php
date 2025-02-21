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

        // Generate Serial Number and PIN
        $serialNumber = 'SN' . mt_rand(100000, 999999);
        $pin = mt_rand(1000, 9999);

        // Save transaction in the database as pending
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

        // Redirect to a page where the iframe is displayed
        $_SESSION['checkout_url'] = $checkoutUrl;
        header("Location: ../payment_form.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Failed to initiate payment.";
        header("Location: ../public/payment_form.php");
        exit();
    }
}

// After payment is confirmed
if ($payment_successful) {
    $transaction = getTransactionByReference($clientReference);
    $serial_number = $transaction['serial_number'];
    $pin = $transaction['pin'];
    $customer_phone = $transaction['customer_phone'];
    $customer_email = $transaction['customer_email'];

    // Send SMS
    $sms_message = "Your Serial Number: $serial_number and PIN: $pin. Visit our Admission Portal to continue with your application: https://nebatech.com/admission_portal/signup.php";
    sendSMS($customer_phone, $sms_message);

    // Send Email
    $email_subject = "Your Serial Number and PIN";
    $email_body = "Dear Applicant,\n\nYour Serial Number: $serial_number\nYour PIN: $pin\n\nThank you for your payment.\n\nVisit our Admission Portal to continue with your application: https://nebatech.com/admission_portal/signup.php";
    sendEmail($customer_email, $email_subject, $email_body);

    // Update transaction status to completed
    $query = "UPDATE transactions SET status = 'Completed' WHERE reference = :reference";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':reference', $clientReference);
    $stmt->execute();

    $_SESSION['success_message'] = "Payment successful! Your Serial Number and PIN have been sent to your phone and email.";
    header("Location: ../admission_form.php");
    exit();
}

function sendSMS($phone, $message) {
    $clientSecret = 'jjdblnjg';
    $clientId = 'oxknnhfm';
    $senderId = 'Nebatech';
    $url = "https://sms.hubtel.com/v1/messages/send?clientsecret=$clientSecret&clientid=$clientId&from=$senderId&to=$phone&content=" . urlencode($message);

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    // Handle the response if needed
}

function sendEmail($to, $subject, $body) {
    $headers = "From: no-reply@nebatech.com\r\n";
    $headers .= "Reply-To: no-reply@nebatech.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail($to, $subject, $body, $headers);
}

function getTransactionByReference($reference) {
    global $conn;
    $query = "SELECT * FROM transactions WHERE reference = :reference";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':reference', $reference);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
