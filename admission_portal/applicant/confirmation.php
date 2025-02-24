<?php
session_start();
if (!isset($_SESSION['application_submitted'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submitted</title>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            padding-top: 70px; /* Height of the fixed header */
            padding-bottom: 70px; /* Height of the fixed footer */
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 70px; /* Height of the fixed header */
            bottom: 70px; /* Height of the fixed footer */
            left: 0;
            background-color: #FFA500;
            padding-top: 20px;
            overflow-y: auto;
        }
        .content {
            margin-left: 350px; /* Width of the sidebar */
            margin-right: 100px; /* Width of the sidebar */
            padding: 20px;
            height: calc(100vh - 140px); /* Full height minus header and footer */
            overflow-y: auto;
        }
        /* Responsive layout for mobile screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                top: 60px;
            }
            .content {
                margin-left: 200px;
            }
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    <div class="content mt-5">
        <div class="card text-center">
            <div class="card-header">
                <h1>Application Submitted Successfully</h1>
            </div>
            <div class="card-body">
                <p class="card-text">Your application number is: <strong><?= $_SESSION['application_number'] ?></strong></p>
                <p class="card-text">You will receive an email when you get admission. Please keep checking your portal for admission updates.</p>
                <a href="view_application.php" class="btn btn-secondary">View Application</a>
            </div>
        </div>
    </div>
    <?php include("../includes/footer.php"); ?>
</body>
</html>