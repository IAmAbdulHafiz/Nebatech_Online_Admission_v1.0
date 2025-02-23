<?php
session_start();
include("../config/database.php");

$apiUsername = "lp7pGzl";  // API ID (username)
$apiPassword = "90027d3ef08646b29947a7e8fdfe8a31"; // API Key (password)
$merchantAccountNumber = "2029059"; // Your Hubtel merchant account number
$callbackUrl = "https://admissions.nebatech.com/api/hubtel_callback.php";
$returnUrl = "https://admissions.nebatech.com/admission_portal/payment_success.php";
$cancellationUrl = "https://admissions.nebatech.com/payment_failed.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $customerPhone = $_POST['customer_phone'];
    $amount = 1; // Admission form cost
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
        $serialNumber = generateSerialNumber();
        $pin = generatePin();

        // Ensure the generated serial number and pin exist in the serial_pins table
        $query = "INSERT INTO serial_pins (serial_number, pin, used) VALUES (:serial_number, :pin, 0)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':serial_number', $serialNumber);
        $stmt->bindParam(':pin', $pin);
        $stmt->execute();

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

        // Save form data to session storage
        $_SESSION['formData'] = json_encode([
            'customer_name' => $customerName,
            'customer_email' => $customerEmail,
            'customer_phone' => $customerPhone,
            'serial_number' => $serialNumber,
            'pin' => $pin
        ]);

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

// Simulate payment process
// Replace this with actual Hubtel API integration
$paymentSuccessful = true; // Simulate successful payment

if ($paymentSuccessful) {
    // Retrieve form data from session storage
    $formData = json_decode($_SESSION['formData'], true);

    // Save form data to the database
    $customer_name = $formData['customer_name'];
    $customer_email = $formData['customer_email'];
    $customer_phone = $formData['customer_phone'];
    $serial_number = $formData['serial_number'];
    $pin = $formData['pin'];

    // Example database insertion code
    $query = "INSERT INTO admissions (customer_name, customer_email, customer_phone, serial_number, pin) VALUES (:customer_name, :customer_email, :customer_phone, :serial_number, :pin)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':customer_name', $customer_name);
    $stmt->bindParam(':customer_email', $customer_email);
    $stmt->bindParam(':customer_phone', $customer_phone);
    $stmt->bindParam(':serial_number', $serial_number);
    $stmt->bindParam(':pin', $pin);
    $stmt->execute();

    $_SESSION['success_message'] = 'Payment successful and form data saved.';
    header('Location: ../admission_form.php');
} else {
    $_SESSION['error_message'] = 'Payment failed. Please try again.';
    header('Location: ../admission_form.php');
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
    $error = curl_error($ch);
    curl_close($ch);

    // Log the response and error if any
    file_put_contents('sms_log.txt', "Response: $response\nError: $error\n", FILE_APPEND);

    // Handle the response if needed
}

function sendEmail($to, $subject, $body) {
    $headers = "From: no-reply@nebatech.com\r\n";
    $headers .= "Reply-To: no-reply@nebatech.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $success = mail($to, $subject, $body, $headers);

    // Log the email sending status
    file_put_contents('email_log.txt', "Email to: $to\nSubject: $subject\nSuccess: $success\n", FILE_APPEND);
}

function getTransactionByReference($reference) {
    global $conn;
    $query = "SELECT * FROM transactions WHERE reference = :reference";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':reference', $reference);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function generateSerialNumber() {
    $year = date('y'); // Get the current year in two digits
    $randomDigits = strtoupper(bin2hex(random_bytes(4))); // Generates 8 random hexadecimal digits
    return 'N' . $year . $randomDigits; // Combine to form the serial number
}

function generatePin() {
    return rand(100000, 999999); // Generates a 6-digit pin
}
?>
