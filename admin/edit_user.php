<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/edit_user.php
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_user'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Update user in the database
    $updateQuery = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, role = :role WHERE id = :user_id";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email,
        ':role' => $role,
        ':user_id' => $user_id
    ]);

    // Redirect to avoid resubmission
    header("Location: user_management.php");
    exit;
}
?>
<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Edit User</title>
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
            width: auto;
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
    <h2 class="text-center mb-4">Edit User</h2>

    <div class="card">
        <div class="card-body">
            <!-- Edit User Form -->
            <form action="edit_user.php?id=<?php echo $user['id']; ?>" method="POST">
                <div class="form-group mb-3">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="admin" <?php echo $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="registrar" <?php echo $user['role'] == 'registrar' ? 'selected' : ''; ?>>Registrar</option>
                    </select>
                </div>
                <button type="submit" name="edit_user" class="btn btn-primary">Save changes</button>
            </form>

            <a href="user_management.php" class="btn btn-secondary mt-3">Back to User Management</a>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>