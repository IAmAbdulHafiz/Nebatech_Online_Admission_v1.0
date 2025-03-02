<?php 
session_start();
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];
include('../config/database.php');

// Fetch the applicant's personal information using applicant_id
$stmt = $conn->prepare("SELECT * FROM personal_information WHERE applicant_id = ?");
$stmt->execute([$applicant['id']]);
$personalInfo = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle profile update
    $first_name   = $_POST['first_name'];
    $middle_name  = $_POST['middle_name'];
    $last_name    = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email        = $_POST['email'];

    // Update the personal information in the database using applicant_id
    $stmt = $conn->prepare("UPDATE personal_information 
                            SET first_name = ?, middle_name = ?, last_name = ?, phone_number = ?, email = ? 
                            WHERE applicant_id = ?");
    $stmt->execute([$first_name, $middle_name, $last_name, $phone_number, $email, $applicant['id']]);

    // Update session data
    $_SESSION['applicant']['first_name'] = $first_name;
    $_SESSION['applicant']['surname']      = $last_name;
    $_SESSION['applicant']['email']          = $email;

    $success = "Profile updated successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Applicant Profile - Nebatech Admissions</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <style>
    body {
      background: #f8f9fa;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      margin: 0;
    }
    /* Main content with a left margin on desktop; on mobile, margin resets */
    .main-content {
      margin-left: 250px;
      padding: 20px;
      position: relative;
      z-index: 1; /* Lower than the sidebar's z-index on mobile */
      flex: 1;
    }
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
      }
    }
    /* Content container styling */
    .content {
      max-width: 800px;
      margin: auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .card {
      margin-bottom: 50px;
    }
  </style>
</head>
<body>
  <?php include("includes/header.php"); ?>
  <?php include("includes/sidebar.php"); ?>

  <div class="main-content">
    <div class="content">
      <h2 class="mb-3 text-center">Your Profile</h2>
      <?php if (!empty($success)) : ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
      <?php endif; ?>
      <form method="POST" action="profile.php">
        <div class="card shadow-sm p-3">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" id="first_name" name="first_name" class="form-control" value="<?= htmlspecialchars($personalInfo['first_name'] ?? '') ?>" required>
            </div>
            <div class="col-md-6">
              <label for="middle_name" class="form-label">Middle Name</label>
              <input type="text" id="middle_name" name="middle_name" class="form-control" value="<?= htmlspecialchars($personalInfo['middle_name'] ?? '') ?>">
            </div>
            <div class="col-md-6">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" id="last_name" name="last_name" class="form-control" value="<?= htmlspecialchars($personalInfo['last_name'] ?? '') ?>" required>
            </div>
            <div class="col-md-6">
              <label for="phone_number" class="form-label">Phone Number</label>
              <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?= htmlspecialchars($personalInfo['phone_number'] ?? '') ?>" required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($personalInfo['email'] ?? '') ?>" required>
            </div>
          </div>
          <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary">Update Profile</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php include("../includes/footer.php"); ?>
  <script src="../assets/js/jquery-3.7.1.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>