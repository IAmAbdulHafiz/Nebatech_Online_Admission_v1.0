<?php  
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save Educational Background Data to Session
    $_SESSION['application']['educational_background'] = $_POST;

    // Handle file uploads for certificates
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NTSS - Application Form - Educational Background</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    /* Page wrapper to allow sticky footer if needed */
    .page-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* Main content layout: desktop left margin; on mobile, margin reset */
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
    /* Device Ownership Section remains unchanged (if needed on this page, you can remove if not applicable) */
    .device-section {
      margin-bottom: 20px;
      padding: 15px;
      background-color: #e9ecef;
      border-radius: 5px;
    }
    .device-section .form-label {
      font-weight: 500;
    }
    .device-section .criteria-note {
      font-size: 0.9rem;
      color: #6c757d;
      margin-top: 5px;
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
        <h2 class="mb-4">Application Form - Educational Background</h2>
        <div class="progress mb-4">
          <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
            Step 4 of 9
          </div>
        </div>

        <form action="education.php" method="POST" enctype="multipart/form-data" id="applicationForm">
          <!-- Wizard Step: Educational Background -->
          <div class="wizard-step active" id="step-2">
            <!-- Educational Records Table -->
            <div class="mb-4">
              <label class="form-label">Educational Background (Required)</label>
              <table class="table table-bordered" id="educationTable">
                <thead class="table-dark">
                  <tr
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
                      <input type="date" name="start_period[]" class="form-control mb-2" placeholder="Start Date" required>
                      <input type="date" name="end_period[]" class="form-control" placeholder="End Date" required>
                    </td>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
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

    <?php include("../includes/footer.php"); ?>
  </div>
  
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function(){
        var currentStep = 1;
        var totalSteps = 3; // Adjust total steps as needed

        function showStep(step) {
            $(".step").addClass("d-none");
            $(".step-" + step).removeClass("d-none");
            // Update progress bar if present
            var progress = (step / totalSteps) * 100;
            $(".progress-bar").css("width", progress + "%");
            $(".progress-bar").attr("aria-valuenow", progress);
            $(".progress-bar").text("Step " + step + " of " + totalSteps);
        }

        $(".next-step").click(function () {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            } else {
                $("#applicationForm").submit();
            }
        });

        $(".prev-step").click(function () {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        $("#applicationForm").submit(function (e) {
            if (!$(this)[0].checkValidity()) {
                e.preventDefault();
                alert("Please fill out all required fields before submitting.");
            }
        });

        // Show the first step initially
        showStep(currentStep);

        // Preview passport photo
        $("#passport_photo").change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#passport_photo_preview").attr("src", e.target.result).removeClass("d-none");
            }
            reader.readAsDataURL(this.files[0]);
        });

        // Preview ID document
        $("#id_document").change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#id_document_preview").attr("src", e.target.result).removeClass("d-none");
            }
            reader.readAsDataURL(this.files[0]);
        });

        // Validate that Confirm Email matches Email if present on another step (if needed)
        $("#confirm_email").on("blur", function() {
            var email = $("#email").val();
            var confirmEmail = $(this).val();
            if(email !== confirmEmail) {
                alert("Email and Confirm Email do not match.");
                $(this).focus();
            }
        });
    });

    // Add new row to the education table
    function addRow() {
        const table = document.getElementById('educationTable').getElementsByTagName('tbody')[0];
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type="text" name="school[]" class="form-control" placeholder="School Name" required></td>
            <td><input type="text" name="course[]" class="form-control" placeholder="Course"></td>
            <td><input type="text" name="qualification[]" class="form-control" placeholder="Qualification (e.g. WASSCE, HND)" required></td>
            <td>
                <input type="date" name="start_period[]" class="form-control mb-2" placeholder="Start Date" required>
                <input type="date" name="end_period[]" class="form-control" placeholder="End Date" required>
            </td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
        `;
        table.appendChild(row);
    }

    // Remove a row from the education table
    function removeRow(button) {
        const row = button.closest('tr');
        row.remove();
    }
  </script>
  <?php include("../includes/footer.php"); ?>
</body>
</html>
