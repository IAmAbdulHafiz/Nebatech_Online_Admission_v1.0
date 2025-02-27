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
    'Introduction to Artificial Intelligence' => '400.00 for 3 weeks',
    'AI for Beginners: Machine Learning' => '1200.00 for 5 weeks',
    'Digital Literacy' => '1,500.00 for 4 weeks',
    'Front-End Development' => '3,500.00 for 16 weeks',
    'Back-End Development' => '4,500.00 for 20 weeks',
    'Full-Stack Development' => '7,500.00 for 36 weeks',
    'Database Management & Administration' => '4,000.00 for 16 weeks',
    'Microsoft Office Suite Mastery' => '1,800.00 for 8 weeks',
    'Video Editing & Production Technology' => '3,600.00 for 12 weeks',
    'Graphic Design & Digital Arts' => '3,200.00 for 12 weeks',
    'iPhone & Computer Hardware Technician' => '3,000.00 for 12 weeks',
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
    /* Page wrapper for consistent dashboard structure */
    .page-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* Main content layout: desktop has 250px left margin, mobile resets */
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
            <!-- First Choice and its Session -->
            <div class="col-md-4">
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
              <div class="mb-3">
                <label for="session_first" class="form-label">Session for First Choice *</label>
                <select id="session_first" name="session_first" class="form-select" required>
                  <option value="" disabled selected>Please select...</option>
                  <?php foreach ($campuses as $campus): ?>
                    <option value="<?= $campus ?>"><?= $campus ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Second Choice and its Session -->
            <div class="col-md-4">
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
              <div class="mb-3">
                <label for="session_second" class="form-label">Session for Second Choice</label>
                <select id="session_second" name="session_second" class="form-select">
                  <option value="" disabled selected>Please select...</option>
                  <?php foreach ($campuses as $campus): ?>
                    <option value="<?= $campus ?>"><?= $campus ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Third Choice and its Session -->
            <div class="col-md-4">
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
              <div class="mb-3">
                <label for="session_third" class="form-label">Session for Third Choice</label>
                <select id="session_third" name="session_third" class="form-select">
                  <option value="" disabled selected>Please select...</option>
                  <?php foreach ($campuses as $campus): ?>
                    <option value="<?= $campus ?>"><?= $campus ?></option>
                  <?php endforeach; ?>
                </select>
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
    function updateFees(selectElement, feeElementId) {
      const fee = selectElement.options[selectElement.selectedIndex].getAttribute('data-fee');
      document.getElementById(feeElementId).textContent = fee ? `GH₵${fee}` : '';
    }
  </script>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>