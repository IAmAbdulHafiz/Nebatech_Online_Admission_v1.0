<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save work experience data to session (even if empty)
    $workExperience = [];
    if (isset($_POST['company'])) {
        foreach ($_POST['company'] as $index => $company) {
            // Only add the row if at least one field is not empty (optional)
            if (trim($company) !== '' || trim($_POST['role'][$index]) !== '' || trim($_POST['duration'][$index]) !== '') {
                $workExperience[] = [
                    'company' => htmlspecialchars($company),
                    'role' => htmlspecialchars($_POST['role'][$index]),
                    'duration' => htmlspecialchars($_POST['duration'][$index])
                ];
            }
        }
    }
    $_SESSION['application']['work_experience'] = $workExperience;
    header('Location: review.php'); // Redirect to the review page
    exit();
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NTSS - Work Experience</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    /* Dashboard unified design styling */
    body {
      background: #f8f9fa;
      min-height: 100vh;
    }
    /* Main content layout with sidebar accounted for */
    .main-content {
      margin-left: 250px;
      padding: 20px;
      position: relative;
    }
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
      }
    }
    /* Modern progress bar styling */
    .progress {
      height: 30px;
      background-color: #e9ecef;
      border-radius: 15px;
      overflow: hidden;
      margin-bottom: 20px;
    }
    .progress-bar {
      font-size: 1rem;
      font-weight: bold;
      line-height: 30px;
    }
    /* Card styling for work experience sections */
    .card {
      margin-bottom: 20px;
    }
    .remove-btn {
      margin-top: 30px;
    }
  </style>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <!-- Include Header -->
  <?php include("includes/header.php"); ?>
  <!-- Include Sidebar -->
  <?php include("includes/sidebar.php"); ?>

  <div class="main-content">
    <div class="container">
      <h2 class="mb-4">Application Form - Work Experience</h2>
      <div class="progress mb-4">
        <div class="progress-bar bg-info" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
          Step 8 of 9
        </div>
      </div>
      <form action="work_experience.php" method="post" id="workExperienceForm">
        <div id="work-experience-section">
          <div class="card shadow-sm p-3">
            <div class="row g-3">
              <div class="col-md-4">
                <label for="company" class="form-label">Company</label>
                <input type="text" name="company[]" class="form-control" placeholder="e.g., ABC Corp">
              </div>
              <div class="col-md-4">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="role[]" class="form-control" placeholder="e.g., Software Engineer">
              </div>
              <div class="col-md-4">
                <label for="duration" class="form-label">Duration</label>
                <input type="text" name="duration[]" class="form-control" placeholder="e.g., Jan 2020 - Dec 2021">
              </div>
              <div class="col-md-4 remove-btn">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeWorkExperience(this)">Delete</button>
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addWorkExperience()">Add More</button>
        <div class="d-flex justify-content-between mt-4">
          <a href="personal_info.php" class="btn btn-secondary">Previous</a>
          <button type="submit" class="btn btn-success">Save and Continue</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Include Footer -->
  <?php include("../includes/footer.php"); ?>

  <script>
    function addWorkExperience() {
      var section = document.getElementById('work-experience-section');
      var newExperience = document.createElement('div');
      newExperience.className = 'card shadow-sm p-3';
      newExperience.innerHTML = `
        <div class="row g-3">
          <div class="col-md-4">
            <label for="company" class="form-label">Company</label>
            <input type="text" name="company[]" class="form-control" placeholder="e.g., ABC Corp">
          </div>
          <div class="col-md-4">
            <label for="role" class="form-label">Role</label>
            <input type="text" name="role[]" class="form-control" placeholder="e.g., Software Engineer">
          </div>
          <div class="col-md-4">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" name="duration[]" class="form-control" placeholder="e.g., Jan 2020 - Dec 2021">
          </div>
          <div class="col-md-4 remove-btn">
            <button type="button" class="btn btn-danger btn-sm" onclick="removeWorkExperience(this)">Delete</button>
          </div>
        </div>`;
      section.appendChild(newExperience);
    }

    function removeWorkExperience(button) {
      var card = button.closest('.card');
      card.remove(); 
    }

    $("#workExperienceForm").submit(function(e) {
      if (!this.checkValidity()) {
        e.preventDefault();
        alert("Please fill out all required fields before submitting.");
      }
    });
  </script>
</body>
</html>
