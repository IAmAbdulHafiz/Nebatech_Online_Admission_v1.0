<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/manage_admissions.php
include("../config/database.php");

// Handle status updates
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $applicant_id = $_POST['applicant_id'];
    $new_status = $_POST['status'];
    $remarks = $_POST['remarks'];

    // Debug: Check if form data is received
    error_log("Form submitted: applicant_id=$applicant_id, status=$new_status, remarks=$remarks");

    $update_query = "UPDATE admission_status SET status = :status, remarks = :remarks WHERE applicant_id = :applicant_id";
    $update_stmt = $conn->prepare($update_query);
    $update_result = $update_stmt->execute([
        ':status' => $new_status,
        ':remarks' => $remarks,
        ':applicant_id' => $applicant_id
    ]);

    // Debug: Check if the update query was successful
    if ($update_result) {
        error_log("Status updated successfully for applicant_id=$applicant_id");
    } else {
        error_log("Failed to update status for applicant_id=$applicant_id");
    }

    // Send notification email
    $applicant_query = "SELECT email FROM personal_information WHERE applicant_id = :applicant_id";
    $applicant_stmt = $conn->prepare($applicant_query);
    $applicant_stmt->execute([':applicant_id' => $applicant_id]);
    $applicant = $applicant_stmt->fetch(PDO::FETCH_ASSOC);

    if ($applicant) {
        $to = $applicant['email'];
        $subject = "Admission Status Update";
        $message = "Your admission status has been updated to: $new_status.\nRemarks: $remarks";
        $mail_result = mail($to, $subject, $message);

        // Debug: Check if the email was sent
        if ($mail_result) {
            error_log("Email sent successfully to $to");
        } else {
            error_log("Failed to send email to $to");
        }
    }

    // Redirect to avoid resubmission
    header("Location: manage_admissions.php");
    exit;
}

include("../includes/header.php");
include("../includes/sidebar.php");

// Fetch applications with their current admission status
$query = "
    SELECT 
        a.id AS applicant_id,
        pi.first_name,
        pi.middle_name,
        pi.last_name,
        pi.email,
        pi.phone_number,
        ps.program_name,
        ads.status,
        ads.remarks
    FROM applications a
    LEFT JOIN personal_information pi ON a.id = pi.applicant_id
    LEFT JOIN program_selections ps ON a.id = ps.applicant_id AND ps.choice_number = 1
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
    <title>Admin - Manage Admissions</title>
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
    <h2 class="text-center mb-4">Manage Admissions</h2>

    <div class="card">
        <div class="card-body">
            <!-- Search and Filter Form -->
            <form action="manage_admissions.php" method="GET" class="mb-4">
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

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
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
                            <td><?php echo htmlspecialchars($application['first_name'] . ' ' . $application['middle_name'] . ' ' . $application['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($application['email']); ?></td>
                            <td><?php echo htmlspecialchars($application['phone_number']); ?></td>
                            <td><?php echo htmlspecialchars($application['program_name']); ?></td>
                            <td><?php echo htmlspecialchars($application['status']); ?></td>
                            <td><?php echo htmlspecialchars($application['remarks']); ?></td>
                            <td>
                                <form action="manage_admissions.php" method="POST" class="d-inline">
                                    <input type="hidden" name="applicant_id" value="<?php echo $application['applicant_id']; ?>">
                                    <select name="status" class="form-control mb-2">
                                        <option value="Pending" <?php echo $application['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Reviewed" <?php echo $application['status'] == 'Reviewed' ? 'selected' : ''; ?>>Reviewed</option>
                                        <option value="Accepted" <?php echo $application['status'] == 'Accepted' ? 'selected' : ''; ?>>Accepted</option>
                                        <option value="Rejected" <?php echo $application['status'] == 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                                    </select>
                                    <textarea name="remarks" class="form-control mb-2" placeholder="Remarks"><?php echo htmlspecialchars($application['remarks']); ?></textarea>
                                    <button type="submit" name="update_status" class="btn btn-secondary">Update Status</button>
                                </form>
                                <a href="generate_admission_letter.php?id=<?php echo $application['applicant_id']; ?>" class="btn btn-success btn-sm mt-2">Generate Letter</a>
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