<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/view_user.php
include("../config/database.php");

// Fetch user details
$user_id = $_GET['id'] ?? null;

if ($user_id) {
    $query = "SELECT * FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':user_id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit;
    }
} else {
    echo "Invalid user ID.";
    exit;
}
?>
<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - View User</title>
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
    <h2 class="text-center mb-4">View User</h2>

    <div class="card">
        <div class="card-body">
            <!-- User Details -->
            <h4>User Details</h4>
            <table class="table table-bordered">
                <tr>
                    <th>First Name</th>
                    <td><?php echo htmlspecialchars($user['first_name']); ?></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><?php echo htmlspecialchars($user['last_name']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><?php echo htmlspecialchars($user['phone_number']); ?></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                </tr>
                <tr>
                    <th>Date Registered</th>
                    <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                </tr>
                <tr>
                    <th>Profile Picture</th>
                    <td>
                        <?php if ($user['profile_picture']): ?>
                            <img src="../uploads/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" class="img-thumbnail" width="150">
                        <?php else: ?>
                            No profile picture uploaded.
                        <?php endif; ?>
                    </td>
                </tr>
            </table>

            <a href="user_management.php" class="btn btn-secondary">Back to User Management</a>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>