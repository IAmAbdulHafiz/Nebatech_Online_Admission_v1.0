<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save Educational Background Data to Session
    $_SESSION['application']['educational_background'] = $_POST;

    // Handle file uploads
    $upload_dir = '../uploads/certificates/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $uploaded_files = [];
    if (isset($_FILES['certificates']) && !empty($_FILES['certificates']['name'][0])) {
        foreach ($_FILES['certificates']['tmp_name'] as $key => $tmp_name) {
            $file_name = $upload_dir . basename($_FILES['certificates']['name'][$key]);
            move_uploaded_file($tmp_name, $file_name);
            $uploaded_files[] = $file_name;
        }
    }
    $_SESSION['application']['certificates'] = $uploaded_files;

    header('Location: program_selection.php'); // Redirect to Program Selection page
    exit();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NTSS - Application Form - Educational Background</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <style>
    /* Dashboard design styling */
    body {
      background: #f8f9fa;
      min-height: 100vh;
    }
    /* Main content layout taking the sidebar into account */
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
    /* Modern progress bar */
    .progress {
      height: 30px;
      background-color: #e9ecef;
      border-radius: 15px;
      overflow: hidden;
    }
    .progress-bar {
      font-size: 1rem;
      font-weight: bold;
      line-height: 30px;
    }
  </style>
</head>
<body>
  <!-- Include Header -->
  <?php include("includes/header.php"); ?>
  <!-- Include Sidebar -->
  <?php include("includes/sidebar.php"); ?>

  <div class="main-content">
    <div class="container">
      <h2 class="mb-4">Application Form - Educational Background</h2>
      <div class="progress mb-4">
        <div class="progress-bar bg-info" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
          Step 4 of 9
        </div>
      </div>

      <form action="education.php" method="POST" enctype="multipart/form-data">
        <!-- Wizard Step: Educational Background -->
        <div class="wizard-step active" id="step-2">
          <!-- Educational Records -->
          <div class="mb-4">
            <label class="form-label">Educational Background (Required)</label>
            <table class="table table-bordered" id="educationTable">
              <thead class="table-dark">
                <tr>
                  <th>School</th>
                  <th>Course</th>
                  <th>Qualification</th>
                  <th>Period (Start & End)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" name="school[]" class="form-control" placeholder="School Name" required></td>
                  <td><input type="text" name="course[]" class="form-control" placeholder="Course"></td>
                  <td><input type="text" name="qualification[]" class="form-control" placeholder="Qualification (e.g. WASSCE, HND)" required></td>
                  <td>
                    <input type="date" name="start_period[]" class="form-control mb-2" required>
                    <input type="date" name="end_period[]" class="form-control" required>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button>
                  </td>
                </tr>
              </tbody>
            </table>
            <button type="button" class="btn btn-secondary" onclick="addRow()">Add More Rows</button>
          </div>

          <!-- Upload Certificates -->
          <div class="mb-4">
            <label for="certificates" class="form-label">Upload Scanned Copy or Copies of Certificate(s) (Required)</label>
            <input type="file" id="certificates" name="certificates[]" class="form-control" accept=".jpg, .png, .pdf" multiple required>
            <small class="form-text text-muted">Max. file size: 50 MB. You can upload multiple files.</small>
          </div>

          <div class="d-flex justify-content-between">
            <a href="personal_info.php" class="btn btn-secondary">Previous</a>
            <button type="submit" class="btn btn-primary">Save & Continue</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Include Footer -->
  <?php include("../includes/footer.php"); ?>

  <script>
    // Function to add new row to the education table
    function addRow() {
      const table = document.getElementById('educationTable').getElementsByTagName('tbody')[0];
      const row = document.createElement('tr');
      row.innerHTML = `
        <td><input type="text" name="school[]" class="form-control" placeholder="School Name" required></td>
        <td><input type="text" name="course[]" class="form-control" placeholder="Course"></td>
        <td><input type="text" name="qualification[]" class="form-control" placeholder="Qualification (e.g. WASSCE, HND)" required></td>
        <td>
          <input type="date" name="start_period[]" class="form-control mb-2" required>
          <input type="date" name="end_period[]" class="form-control" required>
        </td>
        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
      `;
      table.appendChild(row);
    }

    // Function to remove a row from the education table
    function removeRow(button) {
      const row = button.closest('tr');
      row.remove();
    }
  </script>
</body>
</html>
