<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/user_management.php
include("../config/database.php");

// Handle deleting a user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];

    // Delete user from the database
    $deleteQuery = "DELETE FROM users WHERE id = :user_id";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->execute([':user_id' => $user_id]);

    // Redirect to avoid resubmission
    header("Location: user_management.php");
    exit;
}

// Fetch users with pagination, search, filter, and sort
$search = $_GET['search'] ?? '';
$filter_role = $_GET['filter_role'] ?? '';
$sort_by = $_GET['sort_by'] ?? 'created_at';
$sort_order = $_GET['sort_order'] ?? 'DESC';
$page = $_GET['page'] ?? 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$query = "SELECT * FROM users WHERE CONCAT(first_name, ' ', last_name) LIKE :search";
$params = [':search' => "%$search%"];

if ($filter_role) {
    $query .= " AND role = :filter_role";
    $params[':filter_role'] = $filter_role;
}

$query .= " ORDER BY $sort_by $sort_order LIMIT $limit OFFSET $offset";

$stmt = $conn->prepare($query);
$stmt->execute($params);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch total number of users for pagination
$totalQuery = "SELECT COUNT(*) FROM users WHERE CONCAT(first_name, ' ', last_name) LIKE :search";
$totalParams = [':search' => "%$search%"];

if ($filter_role) {
    $totalQuery .= " AND role = :filter_role";
    $totalParams[':filter_role'] = $filter_role;
}

$totalStmt = $conn->prepare($totalQuery);
$totalStmt->execute($totalParams);
$totalUsers = $totalStmt->fetchColumn();
$totalPages = ceil($totalUsers / $limit);
?>
<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - User Management</title>
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
    <h2 class="text-center mb-4">User Management</h2>

    <div class="card">
        <div class="card-body">
            <!-- Search, Filter, and Sort Form -->
            <form action="user_management.php" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" placeholder="Search by Name" value="<?php echo htmlspecialchars($search); ?>">
                    </div>
                    <div class="col-md-3">
                        <select name="filter_role" class="form-control">
                            <option value="">All Roles</option>
                            <option value="admin" <?php echo $filter_role == 'admin' ? 'selected' : ''; ?>>Admin</option>
                            <option value="registrar" <?php echo $filter_role == 'registrar' ? 'selected' : ''; ?>>Registrar</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="sort_by" class="form-control">
                            <option value="created_at" <?php echo $sort_by == 'created_at' ? 'selected' : ''; ?>>Date Registered</option>
                            <option value="first_name" <?php echo $sort_by == 'first_name' ? 'selected' : ''; ?>>First Name</option>
                            <option value="email" <?php echo $sort_by == 'email' ? 'selected' : ''; ?>>Email</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="sort_order" class="form-control">
                            <option value="ASC" <?php echo $sort_order == 'ASC' ? 'selected' : ''; ?>>Ascending</option>
                            <option value="DESC" <?php echo $sort_order == 'DESC' ? 'selected' : ''; ?>>Descending</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            <!-- User List with Pagination -->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Date Registered</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                            <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                            <td>
                                <a href="view_user.php?id=<?php echo $user['id']; ?>" class="btn btn-info btn-sm">View</a>
                                <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="user_management.php" method="POST" class="d-inline">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <button type="submit" name="delete_user" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="user_management.php?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>&filter_role=<?php echo htmlspecialchars($filter_role); ?>&sort_by=<?php echo htmlspecialchars($sort_by); ?>&sort_order=<?php echo htmlspecialchars($sort_order); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
<script src="../assets/js/jquery-3.7.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>