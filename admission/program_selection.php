<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save programme selection data to Session
    foreach ($_POST as $key => $value) {
        $_SESSION['application']['programme_selection'][$key] = htmlspecialchars($value);
    }
    header('Location: other_info.php'); // Redirect to Other Information page
    exit();
}

// Example programme options with associated fees
$programmes = [
    'Introduction to Artificial Intelligence' => '400.00 for 4 weeks',
    'AI for Beginners: Machine Learning' => '1200.00',
    'Digital Literacy' => '1,500.00',
    'Front-End Development' => '3,500.00',
    'Back-End Development' => '4,500.00',
    'Full-Stack Development' => '7,500.00',
    'Database Management & Administration' => '4,000.00',
    'Microsoft Office Suite Mastery' => '1,800.00',
    'Video Editing & Production Technology' => '3,600.00',
    'Graphic Design & Digital Arts' => '3,200.00',
    'iPhone & Computer Hardware Technician' => '3,000.00',
];

// Example session options
$campuses = ['Morning', 'Afternoon', 'Evening', 'Weekend', 'Online'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NTSS - Application Form - Program Selection</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    /* Page wrapper for sticky footer and dashboard structure */
    .page-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* Main content area: has margin-left for sidebar on desktop */
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
    /* Progress bar style */
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
  </style>
</head>
<body>
  <div class="page-wrapper">
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <div class="content">
      <div class="container">
        <h2 class="mb-4">Application Form - Program Selection</h2>
        <div class="progress mb-4">
          <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
            Step 5 of 9
          </div>
        </div>

        <form action="" method="POST">
          <div class="row">
            <div class="col-md-6">
              <!-- First Choice -->
              <div class="mb-3">
                <label for="first_choice" class="form-label">First Choice *</label>
                <select id="first_choice" name="first_choice" class="form-select" onchange="updateFees(this, 'fee1')" required>
                  <option value="" disabled selected>Please select...</option>
                  <?php foreach ($programmes as $programme => $fee): ?>
                    <option value="<?= $programme ?>" data-fee="<?= $fee ?>"><?= $programme ?></option>
                  <?php endforeach; ?>
                </select>
                <small class="text-muted">Programme Fee: <span id="fee1"></span></small>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Second Choice -->
              <div class="mb-3">
                <label for="second_choice" class="form-label">Second Choice</label>
                <select id="second_choice" name="second_choice" class="form-select" onchange="updateFees(this, 'fee2')">
                  <option value="" disabled selected>Please select...</option>
                  <?php foreach ($programmes as $programme => $fee): ?>
                    <option value="<?= $programme ?>" data-fee="<?= $fee ?>"><?= $programme ?></option>
                  <?php endforeach; ?>
                </select>
                <small class="text-muted">Programme Fee: <span id="fee2"></span></small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- Third Choice -->
              <div class="mb-3">
                <label for="third_choice" class="form-label">Third Choice</label>
                <select id="third_choice" name="third_choice" class="form-select" onchange="updateFees(this, 'fee3')">
                  <option value="" disabled selected>Please select...</option>
                  <?php foreach ($programmes as $programme => $fee): ?>
                    <option value="<?= $programme ?>" data-fee="<?= $fee ?>"><?= $programme ?></option>
                  <?php endforeach; ?>
                </select>
                <small class="text-muted">Programme Fee: <span id="fee3"></span></small>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Session / Campus Selection -->
              <div class="mb-3">
                <label for="campus" class="form-label">Select Session (Required)</label>
                <select id="campus" name="campus" class="form-select" required>
                  <option value="" disabled selected>Please select...</option>
                  <?php foreach ($campuses as $campus): ?>
                    <option value="<?= $campus ?>"><?= $campus ?></option>
                  <?php endforeach; ?>
                </select>
                <small class="text-muted">Select the session you wish to enroll in. Different programmes may be pursued in separate sessions.</small>
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
  </div>

  <script>
    function updateFees(selectElement, feeElementId) {
      const fee = selectElement.options[selectElement.selectedIndex].getAttribute('data-fee');
      document.getElementById(feeElementId).textContent = fee ? `GH₵${fee}` : '';
    }
  </script>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <?php include("../includes/footer.php"); ?>
</body>
</html>