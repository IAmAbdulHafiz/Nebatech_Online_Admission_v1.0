<?php
session_start();
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];

// Include database connection
include('../config/database.php');

// Fetch the applicant's personal information from the database
$stmt = $conn->prepare("SELECT * FROM personal_information WHERE applicant_id = (SELECT id FROM applicants WHERE user_id = ?)");
$stmt->execute([$applicant['id']]);
$personalInfo = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle profile update
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    // Update the personal information in the database
    $stmt = $conn->prepare("UPDATE personal_information SET first_name = ?, middle_name = ?, last_name = ?, phone_number = ?, email = ? WHERE applicant_id = (SELECT id FROM applicants WHERE user_id = ?)");
    $stmt->execute([$first_name, $middle_name, $last_name, $phone_number, $email, $applicant['id']]);

    // Update session data
    $_SESSION['applicant']['first_name'] = $first_name;
    $_SESSION['applicant']['surname'] = $last_name;
    $_SESSION['applicant']['email'] = $email;

    $success = "Profile updated successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Profile</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 70px; /* Height of the fixed header */
            padding-bottom: 70px; /* Height of the fixed footer */
        }

        .content {
            margin-left: 270px; /* Width of the sidebar */
            padding: 20px;
            height: calc(100vh - 140px); /* Full height minus header and footer */
            overflow-y: auto;
        }
        .card {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    <div class="content mt-5">
        <h2 class="mb-3 text-center">Your Profile</h2>
        <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form method="POST" action="profile.php">
            <div class="card shadow-sm p-3">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="<?= htmlspecialchars($personalInfo['first_name']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" class="form-control" value="<?= htmlspecialchars($personalInfo['middle_name']) ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="<?= htmlspecialchars($personalInfo['last_name']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?= htmlspecialchars($personalInfo['phone_number']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($personalInfo['email']) ?>" required>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
    <?php include("../includes/footer.php"); ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
