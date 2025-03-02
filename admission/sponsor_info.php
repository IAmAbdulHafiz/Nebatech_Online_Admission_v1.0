<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save Sponsor Information Data to Session
    foreach ($_POST as $key => $value) {
        $_SESSION['application']['sponsor_information'][$key] = htmlspecialchars($value);
    }
    header('Location: work_experience.php'); // Redirect to the Work Experience page (or Review page)
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NTSS - Application Form - Sponsor Information</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/custom-styles.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    /* Page wrapper to match dashboard layout */
    .page-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* Main content area: Desktop has 250px left margin for the sidebar */
    .content {
      margin-left: 250px;
      padding: 20px;
      flex: 1;
      position: relative;
      z-index: 1;
    }
    @media (max-width: 768px) {
      .content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>
  <div class="page-wrapper">
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <div class="content">
      <div class="container">
        <h2 class="mb-4">Application Form - Parent/Guardian/Sponsor Information</h2>
        <div class="progress mb-4">
          <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
            Step 7 of 9
          </div> 
        </div>
        <form action="" method="POST" id="sponsorForm">
          <div class="row">
            <div class="col-md-6">
              <!-- Sponsor First Name -->
              <div class="mb-3">
                <label for="sponsor_first_name" class="form-label">First Name *</label>
                <input type="text" id="sponsor_first_name" name="sponsor_first_name" class="form-control" placeholder="Enter First Name" required>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Sponsor Last Name -->
              <div class="mb-3">
                <label for="sponsor_last_name" class="form-label">Last Name *</label>
                <input type="text" id="sponsor_last_name" name="sponsor_last_name" class="form-control" placeholder="Enter Last Name" required>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Sponsor Relationship -->
              <div class="mb-3">
                <label for="sponsor_relationship" class="form-label">Relationship *</label>
                <input type="text" id="sponsor_relationship" name="sponsor_relationship" class="form-control" placeholder="Enter Relationship" required>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Sponsor Occupation -->
              <div class="mb-3">
                <label for="sponsor_occupation" class="form-label">Occupation *</label>
                <input type="text" id="sponsor_occupation" name="sponsor_occupation" class="form-control" placeholder="Enter Occupation" required>
              </div>
            </div>
            <div class="col-md-12">
              <!-- Sponsor House Address -->
              <div class="mb-3">
                <label for="sponsor_house_address" class="form-label">House Address *</label>
                <textarea id="sponsor_house_address" name="sponsor_house_address" class="form-control" placeholder="Enter House Address" rows="3" required></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Sponsor Digital Address -->
              <div class="mb-3">
                <label for="sponsor_digital_address" class="form-label">Digital Address</label>
                <input type="text" id="sponsor_digital_address" name="sponsor_digital_address" class="form-control" placeholder="Enter Digital Address">
              </div>
            </div>
            <div class="col-md-6">
              <!-- Sponsor City -->
              <div class="mb-3">
                <label for="sponsor_city" class="form-label">City</label>
                <input type="text" id="sponsor_city" name="sponsor_city" class="form-control" placeholder="Enter City">
              </div>
            </div>
            <div class="col-md-6">
              <!-- Sponsor Region -->
              <div class="mb-3">
                <label for="sponsor_region" class="form-label">Region</label>
                <input type="text" id="sponsor_region" name="sponsor_region" class="form-control" placeholder="Enter Region">
              </div>
            </div>
            <div class="col-md-6">
              <!-- Sponsor Phone Number -->
              <div class="mb-3">
                <label for="sponsor_phone" class="form-label">Phone Number *</label>
                <input type="tel" id="sponsor_phone" name="sponsor_phone" class="form-control" placeholder="Enter Phone Number" required>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Previous</button>
            <button type="submit" class="btn btn-primary">Save & Continue</button>
          </div>
        </form>
      </div>
    </div>

    <?php include("../includes/footer.php"); ?>
  </div>
  <script>
    // Simple form validation (HTML5 will handle required fields)
    $("#sponsorForm").submit(function (e) {
      if (!$(this)[0].checkValidity()) {
        e.preventDefault();
        alert("Please fill out all required fields before submitting.");
      }
    });
  </script>
  <script src="../assets/js/jquery-3.7.1.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
