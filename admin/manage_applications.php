<?php
include("../config/database.php");

include("../includes/header.php");
include("../includes/sidebar.php");

// Fetch filtered applications
$query = "
    SELECT 
        a.id AS application_id,
        pi.first_name,
        pi.middle_name,
        pi.last_name,
        pi.email,
        pi.phone_number,
        ps.program_name,
        ads.status,
        ads.remarks
    FROM applications a
    LEFT JOIN personal_information pi ON a.id = pi.application_id
    LEFT JOIN program_selections ps ON a.id = ps.application_id AND ps.choice_number = 1
    LEFT JOIN admission_status ads ON a.id = ads.applicant_id
    WHERE 1=1
";

$params = [];

if (!empty($_GET['full_name'])) {
    $query .= " AND CONCAT(pi.first_name, ' ', pi.middle_name, ' ', pi.last_name) LIKE :full_name";
    $params[':full_name'] = '%' . $_GET['full_name'] . '%';
}

if (!empty($_GET['email'])) {
    $query .= " AND pi.email LIKE :email";
    $params[':email'] = '%' . $_GET['email'] . '%';
}

if (!empty($_GET['status'])) {
    $query .= " AND ads.status = :status";
    $params[':status'] = $_GET['status'];
}

$stmt = $conn->prepare($query);
$stmt->execute($params);
$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Applications</title>
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
    <h2 class="text-center mb-4">Manage Applications</h2>

    <div class="card">
        <div class="card-body">
            <!-- Search and Filter Form -->
            <form action="manage_applications.php" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="full_name" class="form-control" placeholder="Search by Full Name" value="<?php echo isset($_GET['full_name']) ? $_GET['full_name'] : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="email" class="form-control" placeholder="Search by Email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-control">
                            <option value="">All Statuses</option>
                            <option value="Pending" <?php echo isset($_GET['status']) && $_GET['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="Reviewed" <?php echo isset($_GET['status']) && $_GET['status'] == 'Reviewed' ? 'selected' : ''; ?>>Reviewed</option>
                            <option value="Accepted" <?php echo isset($_GET['status']) && $_GET['status'] == 'Accepted' ? 'selected' : ''; ?>>Accepted</option>
                            <option value="Rejected" <?php echo isset($_GET['status']) && $_GET['status'] == 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            <!-- Bulk Actions Form -->
            <form action="bulk_actions.php" method="POST" class="mb-4">
                <div class="row mb-2">
                    <div class="col-md-3">
                        <select name="bulk_action" class="form-control">
                            <option value="">Bulk Actions</option>
                            <option value="approve">Approve</option>
                            <option value="reject">Reject</option>
                            <option value="delete">Delete</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-secondary">Apply</button>
                    </div>
                </div>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select_all"></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Program</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($applications as $application): ?>
                            <tr>
                                <td><input type="checkbox" name="application_ids[]" value="<?php echo $application['application_id']; ?>"></td>
                                <td><?php echo htmlspecialchars($application['first_name'] . ' ' . $application['middle_name'] . ' ' . $application['last_name']); ?></td>
                                <td><?php echo htmlspecialchars($application['email']); ?></td>
                                <td><?php echo htmlspecialchars($application['phone_number']); ?></td>
                                <td><?php echo htmlspecialchars($application['program_name']); ?></td>
                                <td><?php echo htmlspecialchars($application['status']); ?></td>
                                <td><?php echo htmlspecialchars($application['remarks']); ?></td>
                                <td>
                                    <a href="view_application.php?id=<?php echo $application['application_id']; ?>" class="btn btn-info btn-sm table-action-btn mb-2">View</a>
                                    <a href="assign_reviewer.php?id=<?php echo $application['application_id']; ?>" class="btn btn-warning btn-sm table-action-btn">Assign Reviewer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>

            <!-- Export Buttons -->
            <form action="export.php" method="POST" class="d-inline">
                <input type="hidden" name="full_name" value="<?php echo isset($_GET['full_name']) ? $_GET['full_name'] : ''; ?>">
                <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                <input type="hidden" name="status" value="<?php echo isset($_GET['status']) ? $_GET['status'] : ''; ?>">
                <button type="submit" name="export_csv" class="btn btn-success me-2">Export CSV</button>
                <button type="submit" name="export_excel" class="btn btn-primary">Export Excel</button>
            </form>
        </div>
    </div>
</div>
<?php include("../includes/footer.php"); ?>
<script>
    document.getElementById('select_all').onclick = function() {
        var checkboxes = document.getElementsByName('application_ids[]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
</script>

</body>
</html>