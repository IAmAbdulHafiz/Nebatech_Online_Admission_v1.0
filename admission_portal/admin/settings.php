<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/settings.php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

// Ensure the uploads directory exists
$uploads_dir = "../uploads";
if (!is_dir($uploads_dir)) {
    mkdir($uploads_dir, 0777, true);
}

// Fetch current settings
$query = "SELECT * FROM settings WHERE id = 1";
$stmt = $conn->prepare($query);
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);

if ($settings) {
    $company_name = $settings['company_name'];
    $current_logo = $settings['logo'];
    $theme = $settings['theme'];
    $admissions_deadline = $settings['admissions_deadline'];
    $email_template = $settings['email_template'];
    $notification_preference = $settings['notification_preference'];
    $payment_gateway = $settings['payment_gateway'];
    $email_service = $settings['email_service'];
} else {
    $company_name = '';
    $current_logo = '';
    $theme = 'light';
    $admissions_deadline = '';
    $email_template = '';
    $notification_preference = 'real-time';
    $payment_gateway = '';
    $email_service = '';
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update company information
    if (isset($_POST['company_name'])) {
        $company_name = $_POST['company_name'];
        $theme = $_POST['theme'];
        $logo = $_FILES['logo']['name'] ? $uploads_dir . '/' . basename($_FILES['logo']['name']) : $current_logo;

        if ($_FILES['logo']['name']) {
            move_uploaded_file($_FILES['logo']['tmp_name'], $logo);
        }

        // Update company settings in the database
        $query = "UPDATE settings SET company_name = :company_name, logo = :logo, theme = :theme WHERE id = 1";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':company_name' => $company_name,
            ':logo' => $logo,
            ':theme' => $theme
        ]);

        $message_settings = "Settings updated successfully.";
    }

    // Update admissions deadlines
    if (isset($_POST['admissions_deadline'])) {
        $admissions_deadline = $_POST['admissions_deadline'];

        // Update admissions deadline in the database
        $query = "UPDATE settings SET admissions_deadline = :admissions_deadline WHERE id = 1";
        $stmt = $conn->prepare($query);
        $stmt->execute([':admissions_deadline' => $admissions_deadline]);

        $message_deadline = "Admissions deadline updated successfully.";
    }

    // Update email templates
    if (isset($_POST['email_template'])) {
        $email_template = $_POST['email_template'];

        // Update email template in the database
        $query = "UPDATE settings SET email_template = :email_template WHERE id = 1";
        $stmt = $conn->prepare($query);
        $stmt->execute([':email_template' => $email_template]);

        $message_email_template = "Email template updated successfully.";
    }

    // Update notification preferences
    if (isset($_POST['notification_preference'])) {
        $notification_preference = $_POST['notification_preference'];

        // Update notification preference in the database
        $query = "UPDATE settings SET notification_preference = :notification_preference WHERE id = 1";
        $stmt = $conn->prepare($query);
        $stmt->execute([':notification_preference' => $notification_preference]);

        $message_notification = "Notification preferences updated successfully.";
    }

    // Update payment gateway settings
    if (isset($_POST['payment_gateway'])) {
        $payment_gateway = $_POST['payment_gateway'];

        // Update payment gateway settings in the database
        $query = "UPDATE settings SET payment_gateway = :payment_gateway WHERE id = 1";
        $stmt = $conn->prepare($query);
        $stmt->execute([':payment_gateway' => $payment_gateway]);

        $message_payment_gateway = "Payment gateway settings updated successfully.";
    }

    // Update email service settings
    if (isset($_POST['email_service'])) {
        $email_service = $_POST['email_service'];

        // Update email service settings in the database
        $query = "UPDATE settings SET email_service = :email_service WHERE id = 1";
        $stmt = $conn->prepare($query);
        $stmt->execute([':email_service' => $email_service]);

        $message_email_service = "Email service settings updated successfully.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Settings</title>
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
        .content {
            margin-left: 250px;
            overflow-y: auto;
            width: auto;
        }
        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .alert {
            border-radius: 8px;
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
        }
        .img-thumbnail {
            max-width: 150px;
            margin-top: 10px;
        }
        /* Responsive layout for mobile screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .content {
                margin-left: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title text-center">Company Information</h2>
                        <?php if (isset($message_settings)): ?>
                            <div class="alert alert-success">
                                <?php echo $message_settings; ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" id="company_name" name="company_name" class="form-control" value="<?php echo htmlspecialchars($company_name); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" id="logo" name="logo" class="form-control">
                                <?php if ($current_logo): ?>
                                    <img src="<?php echo htmlspecialchars($current_logo); ?>" alt="Logo" class="img-thumbnail">
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="theme" class="form-label">Theme</label>
                                <select id="theme" name="theme" class="form-control">
                                    <option value="light" <?php echo $theme == 'light' ? 'selected' : ''; ?>>Light</option>
                                    <option value="dark" <?php echo $theme == 'dark' ? 'selected' : ''; ?>>Dark</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Settings</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title text-center">Admissions Deadlines</h2>
                        <?php if (isset($message_deadline)): ?>
                            <div class="alert alert-success">
                                <?php echo $message_deadline; ?>
                            </div>
                        <?php endif; ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="admissions_deadline" class="form-label">Admissions Deadline</label>
                                <input type="date" id="admissions_deadline" name="admissions_deadline" class="form-control" value="<?php echo htmlspecialchars($admissions_deadline); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Deadline</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title text-center">Email Templates</h2>
                        <?php if (isset($message_email_template)): ?>
                            <div class="alert alert-success">
                                <?php echo $message_email_template; ?>
                            </div>
                        <?php endif; ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="email_template" class="form-label">Email Template</label>
                                <textarea id="email_template" name="email_template" class="form-control" rows="5" required><?php echo htmlspecialchars($email_template); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Template</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title text-center">Notification Preferences</h2>
                        <?php if (isset($message_notification)): ?>
                            <div class="alert alert-success">
                                <?php echo $message_notification; ?>
                            </div>
                        <?php endif; ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="notification_preference" class="form-label">Notification Preference</label>
                                <select id="notification_preference" name="notification_preference" class="form-control">
                                    <option value="real-time" <?php echo $notification_preference == 'real-time' ? 'selected' : ''; ?>>Real-time</option>
                                    <option value="daily-summary" <?php echo $notification_preference == 'daily-summary' ? 'selected' : ''; ?>>Daily Summary</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Preferences</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title text-center">Payment Gateway Settings</h2>
                        <?php if (isset($message_payment_gateway)): ?>
                            <div class="alert alert-success">
                                <?php echo $message_payment_gateway; ?>
                            </div>
                        <?php endif; ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="payment_gateway" class="form-label">Payment Gateway</label>
                                <input type="text" id="payment_gateway" name="payment_gateway" class="form-control" value="<?php echo htmlspecialchars($payment_gateway); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Payment Gateway</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title text-center">Email Service Settings</h2>
                        <?php if (isset($message_email_service)): ?>
                            <div class="alert alert-success">
                                <?php echo $message_email_service; ?>
                            </div>
                        <?php endif; ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="email_service" class="form-label">Email Service</label>
                                <input type="text" id="email_service" name="email_service" class="form-control" value="<?php echo htmlspecialchars($email_service); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Email Service</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/footer.php"); ?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>