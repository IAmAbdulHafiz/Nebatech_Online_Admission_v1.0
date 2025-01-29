<?php
session_start();
include("../config/database.php");
include("../includes/header.php");

$searchQuery = "SELECT * FROM applications WHERE 1=1";
$params = [];

if (!empty($_GET['full_name'])) {
    $searchQuery .= " AND full_name LIKE :full_name";
    $params[':full_name'] = '%' . $_GET['full_name'] . '%';
}

if (!empty($_GET['email'])) {
    $searchQuery .= " AND email LIKE :email";
    $params[':email'] = '%' . $_GET['email'] . '%';
}

if (!empty($_GET['status'])) {
    $searchQuery .= " AND status = :status";
    $params[':status'] = $_GET['status'];
}

$stmt = $conn->prepare($searchQuery);
$stmt->execute($params);
$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Applications</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Manage Applications</h2>
            <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>
        <hr>
        
        <!-- Search and Export -->
        <div class="mb-4">
            <form action="export.php" method="POST" class="d-inline">
                <input type="hidden" name="full_name" value="<?php echo isset($_GET['full_name']) ? $_GET['full_name'] : ''; ?>">
                <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                <input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : ''; ?>">
                <button type="submit" name="export_csv" class="btn btn-success me-2">Export CSV</button>
                <button type="submit" name="export_pdf" class="btn btn-danger">Export PDF</button>
            </form>
        </div>

        <!-- Search Form -->
        <form action="applications.php" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="full_name" class="form-control" placeholder="Search by Full Name" value="<?php echo isset($_GET['full_name']) ? $_GET['full_name'] : ''; ?>">
                </div>
                <div class="col-md-3">
                    <input type="text" name="email" class="form-control" placeholder="Search by Email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="Approved" <?php echo (isset($_GET['status']) && $_GET['status'] === 'Approved') ? 'selected' : ''; ?>>Approved</option>
                        <option value="Rejected" <?php echo (isset($_GET['status']) && $_GET['status'] === 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
                        <option value="Pending" <?php echo (isset($_GET['status']) && $_GET['status'] === 'Pending') ? 'selected' : ''; ?>>Pending</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-20">Search</button>
                </div>
            </div>
        </form>
        <!-- End Search Form -->

        <!-- Applications Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Serial Number</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($applications) > 0): ?>
                        <?php foreach ($applications as $key => $app): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $app['serial_number']; ?></td>
                                <td><?php echo $app['full_name']; ?></td>
                                <td><?php echo $app['email']; ?></td>
                                <td><?php echo $app['program']; ?></td>
                                <td>
                                    <span class="badge 
                                        <?php
                                            echo $app['status'] === 'Approved' ? 'bg-success' :
                                                ($app['status'] === 'Rejected' ? 'bg-danger' : 'bg-warning');
                                        ?>">
                                        <?php echo $app['status']; ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="approve.php?id=<?php echo $app['id']; ?>" class="btn btn-success btn-sm">Approve</a>
                                    <a href="reject.php?id=<?php echo $app['id']; ?>" class="btn btn-danger btn-sm">Reject</a>
                                    <a href="generate_admission.php?id=<?php echo $app['id']; ?>" class="btn btn-primary btn-sm">Generate Letter</a>
                                    <a href="send_email.php?id=<?php echo $app['id']; ?>" class="btn btn-info btn-sm">Send Email</a>
                                    <a href="send_sms.php?id=<?php echo $app['id']; ?>" class="btn btn-warning btn-sm">Send SMS</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No applications found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
