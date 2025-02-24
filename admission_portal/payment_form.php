<?php
session_start();
if (!isset($_SESSION['checkout_url'])) {
    header("Location: payment_form.php");
    exit();
}
$checkoutUrl = htmlspecialchars($_SESSION['checkout_url']);

include("../config/database.php");
include("config.php"); // Load environment variables

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
            header("Location: ../admission_form.php");
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
        header("Location: ../admission_form.php");
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Payment</title>
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .payment-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding-top: 100px;
            padding-bottom: 50px;
        }
        .payment-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 550px;
            width: 100%;
            text-align: center;
        }
        .payment-card h2 {
            color: #002060;
            font-weight: bold;
        }
        iframe {
            width: 100%;
            height: 450px;
            border: none;
            border-radius: 8px;
            margin-top: 10px;
        }
        .btn-reload {
            background: #ff6a00;
            border: none;
            padding: 12px;
            width: 100%;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            margin-top: 10px;
            transition: 0.3s;
        }
        .btn-reload:hover {
            background: #e55c00;
        }
    </style>
</head>
<body>

    <!-- Include Header -->
    <?php include("includes/header.php"); ?>

    <div class="payment-container">
        <div class="payment-card">
            <h2><i class="fas fa-credit-card"></i> Complete Your Payment</h2>
            <p>Please complete your payment through the secured checkout page below.</p>

            <iframe id="paymentIframe" src="<?php echo $checkoutUrl; ?>"></iframe>

            <button class="btn-reload" onclick="reloadIframe()">
                <i class="fas fa-sync-alt"></i> Reload Payment Page
            </button>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include("../includes/public_footer.php"); ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function reloadIframe() {
            document.getElementById('paymentIframe').src = '<?php echo $checkoutUrl; ?>';
        }
    </script>

</body>
</html>