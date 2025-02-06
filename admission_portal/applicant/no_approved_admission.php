<?php
session_start();
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Approved Admission</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }
        .main-content {
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
            padding: 20px;
            margin-left: 250px; /* Adjusted for sidebar width */
            margin-top: 70px; /* Adjusted for fixed header */
        }
        .content {
            padding: 20px;
            max-width: 600px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
        }
        .content h2 {
            margin-bottom: 20px;
        }
        .content p {
            margin-bottom: 20px;
        }
        .content .btn {
            margin: 5px;
        }
        @media (max-width: 576px) {
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
            .content h2 {
                font-size: 1.5rem;
            }
            .content p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <div class="main-content">
        <div class="content">
            <h2>No Approved Admission</h2>
            <p>Dear <?= htmlspecialchars($applicant['first_name'] . ' ' . $applicant['surname']) ?>,</p>
            <p>Unfortunately, your admission status is not approved at this time. Please check back later or contact our support team for further assistance.</p>
            <div>
                <a href="admission_status.php" class="btn btn-primary">Retry Checking Status</a>
                <a href="contact_support.php" class="btn btn-secondary">Contact Support</a>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>