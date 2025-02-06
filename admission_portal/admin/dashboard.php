<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include("../config/database.php");

// Fetch total number of pending applications
$query = "SELECT COUNT(*) AS pending_count FROM applications WHERE status = 'Pending'";
$stmt = $conn->prepare($query);
$stmt->execute();
$pending_count = $stmt->fetch(PDO::FETCH_ASSOC)['pending_count'];

// ...existing code...

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .card-body p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include("../includes/header.php"); ?>
    <?php include("../includes/sidebar.php"); ?>

    <div class="container mt-5 pt-5">
        <h2 class="mb-4">Admin Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Pending Applications
                    </div>
                    <div class="card-body">
                        <p>Total Pending Applications: <?php echo $pending_count; ?></p>
                    </div>
                </div>
            </div>
            <!-- ...existing code for other dashboard cards... -->
        </div>
    </div>

    <?php include("../includes/footer.php"); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
