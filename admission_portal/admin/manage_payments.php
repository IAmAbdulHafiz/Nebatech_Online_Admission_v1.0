<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/manage_payments.php
include("../config/database.php");

// Handle payment approval/rejection
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_payment_status'])) {
    $payment_id = $_POST['payment_id'];
    $new_status = $_POST['status'];
    $remarks = $_POST['remarks'];

    // Update payment status
    $update_query = "UPDATE payment_details SET status = :status, remarks = :remarks WHERE id = :payment_id";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->execute([
        ':status' => $new_status,
        ':remarks' => $remarks,
        ':payment_id' => $payment_id
    ]);

    // If approved, generate serial number and pin
    if ($new_status == 'Approved') {
        $serial_number = strtoupper(bin2hex(random_bytes(5)));
        $pin = random_int(100000, 999999);

        // Insert serial number and pin into serial_pins table
        $insert_query = "INSERT INTO serial_pins (serial_number, pin, used) VALUES (:serial_number, :pin, 0)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->execute([
            ':serial_number' => $serial_number,
            ':pin' => $pin
        ]);

        // Send serial number and pin to the applicant
        $applicant_query = "SELECT email FROM applicants WHERE id = (SELECT applicant_id FROM payment_details WHERE id = :payment_id)";
        $applicant_stmt = $conn->prepare($applicant_query);
        $applicant_stmt->execute([':payment_id' => $payment_id]);
        $applicant = $applicant_stmt->fetch(PDO::FETCH_ASSOC);

        if ($applicant) {
            $to = $applicant['email'];
            $subject = "Payment Approved - Serial Number and PIN";
            $message = "Your payment has been approved. Here are your serial number and PIN:\nSerial Number: $serial_number\nPIN: $pin";
            mail($to, $subject, $message);
        }
    }

    // Redirect to avoid resubmission
    header("Location: manage_payments.php");
    exit;
}

// Handle deleting a payment
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_payment'])) {
    $payment_id = $_POST['payment_id'];

    // Delete payment from the database
    $delete_query = "DELETE FROM payment_details WHERE id = :payment_id";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->execute([':payment_id' => $payment_id]);

    // Redirect to avoid resubmission
    header("Location: manage_payments.php");
    exit;
}

// Handle adding new payment
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_payment'])) {
    $applicant_id = $_POST['applicant_id'];
    $payment_option = $_POST['payment_option'];
    $phone_and_name = $_POST['phone_and_name'];
    $transaction_id = $_POST['transaction_id'];
    $payment_screenshot = $_FILES['payment_screenshot']['name'];

    // Upload payment screenshot
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($payment_screenshot);
    move_uploaded_file($_FILES['payment_screenshot']['tmp_name'], $target_file);

    // Insert new payment details
    $insert_query = "INSERT INTO payment_details (applicant_id, payment_option, phone_and_name, transaction_id, payment_screenshot) VALUES (:applicant_id, :payment_option, :phone_and_name, :transaction_id, :payment_screenshot)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->execute([
        ':applicant_id' => $applicant_id,
        ':payment_option' => $payment_option,
        ':phone_and_name' => $phone_and_name,
        ':transaction_id' => $transaction_id,
        ':payment_screenshot' => $target_file
    ]);

    // Redirect to avoid resubmission
    header("Location: manage_payments.php");
    exit;
}
// Fetch payment details
$query = "
    SELECT 
        pd.id AS payment_id,
        pd.payment_option,
        pd.phone_and_name,
        pd.transaction_id,
        pd.payment_screenshot,
        pd.status,
        pd.remarks,
        a.first_name,
        a.surname,
        a.email
    FROM payment_details pd
    LEFT JOIN applicants a ON pd.applicant_id = a.id
";
$stmt = $conn->prepare($query);
$stmt->execute();
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch applicants for the add payment form
$applicant_query = "SELECT id, first_name, surname FROM applicants";
$applicant_stmt = $conn->prepare($applicant_query);
$applicant_stmt->execute();
$applicants = $applicant_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../includes/header.php"); ?>
<?php include("../includes/sidebar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Payments</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            padding-top: 100px;
            padding-bottom: 70px;
            background-color: #f4f6f9;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .content{
            margin-left: 250px;
            overflow-y: auto;
        }
        .table-action-btn {
            padding: 5px 10px;
            font-size: 14px;
        }
        .table-action-btn i {
            margin-right: 5px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
            margin-left: 250px;
        }
        /* Responsive layout for mobile screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .content {
                margin-left: 250px;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <h2 class="text-center mb-4">Manage Payments</h2>

    <div class="card">
        <div class="card-body">
            <!-- Add Payment Form -->
            <form action="manage_payments.php" method="POST" enctype="multipart/form-data" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <select name="applicant_id" class="form-control" required>
                            <option value="">Select Applicant</option>
                            <?php foreach ($applicants as $applicant): ?>
                                <option value="<?php echo $applicant['id']; ?>"><?php echo htmlspecialchars($applicant['first_name'] . ' ' . $applicant['surname']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="payment_option" class="form-control" placeholder="Payment Option" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="phone_and_name" class="form-control" placeholder="Phone and Name" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="transaction_id" class="form-control" placeholder="Transaction ID" required>
                    </div>
                    <div class="col-md-3 mt-2">
                        <input type="file" name="payment_screenshot" class="form-control" required>
                    </div>
                    <div class="col-md-3 mt-2">
                        <button type="submit" name="add_payment" class="btn btn-primary">Add Payment</button>
                    </div>
                </div>
            </form>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Payment Option</th>
                        <th>Phone and Name</th>
                        <th>Transaction ID</th>
                        <th>Payment Screenshot</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($payments as $payment): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($payment['first_name'] . ' ' . $payment['surname']); ?></td>
                            <td><?php echo htmlspecialchars($payment['email']); ?></td>
                            <td><?php echo htmlspecialchars($payment['payment_option']); ?></td>
                            <td><?php echo htmlspecialchars($payment['phone_and_name']); ?></td>
                            <td><?php echo htmlspecialchars($payment['transaction_id']); ?></td>
                            <td><a href="../<?php echo htmlspecialchars($payment['payment_screenshot']); ?>" target="_blank">View Screenshot</a></td>
                            <td><?php echo htmlspecialchars($payment['status']); ?></td>
                            <td><?php echo htmlspecialchars($payment['remarks']); ?></td>
                            <td>
                                <form action="manage_payments.php" method="POST" class="d-inline">
                                    <input type="hidden" name="payment_id" value="<?php echo $payment['payment_id']; ?>">
                                    <select name="status" class="form-control mb-2">
                                        <option value="Pending" <?php echo $payment['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Approved" <?php echo $payment['status'] == 'Approved' ? 'selected' : ''; ?>>Approved</option>
                                        <option value="Rejected" <?php echo $payment['status'] == 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                                    </select>
                                    <textarea name="remarks" class="form-control mb-2" placeholder="Remarks"><?php echo htmlspecialchars($payment['remarks']); ?></textarea>
                                    <button type="submit" name="update_payment_status" class="btn btn-secondary mb-2">Update Status</button>
                                </form>
                                <form action="manage_payments.php" method="POST" class="d-inline">
                                    <input type="hidden" name="payment_id" value="<?php echo $payment['payment_id']; ?>">
                                    <button type="submit" name="delete_payment" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../includes/footer.php"); ?>
</body>
</html>