<?php  
session_start();

// Function to handle file uploads (unchanged)
function handleFileUpload($file, $uploadDir, $allowedExtensions = ['jpg', 'jpeg', 'png']) {
    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            return ['error' => "Invalid file type. Only " . implode(', ', $allowedExtensions) . " files are allowed."];
        }
        $uniqueName = uniqid('file_', true) . '.' . $fileExtension;
        $filePath = $uploadDir . $uniqueName;
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return ['path' => $filePath];
        } else {
            return ['error' => 'Failed to upload file.'];
        }
    }
    return ['error' => 'Error uploading file.'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure at least one device is selected
    if (empty($_POST['devices'])) {
        die("Please select at least one device.");
    }
    
    // Save all personal info into session
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_SESSION['application']['personal_info'][$key] = array_map('htmlspecialchars', $value);
        } else {
            $_SESSION['application']['personal_info'][$key] = htmlspecialchars($value);
        }
    }
    
    // Define upload directory and handle file uploads
    $uploadDir = '../uploads/';
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
        die('Failed to create upload directory.');
    }
    
    $passportPhotoResult = handleFileUpload($_FILES['passport_photo'], $uploadDir);
    $idDocumentResult = handleFileUpload($_FILES['id_document'], $uploadDir);
    
    if (isset($passportPhotoResult['error'])) {
        die("Passport photo error: " . $passportPhotoResult['error']);
    }
    if (isset($idDocumentResult['error'])) {
        die("ID document error: " . $idDocumentResult['error']);
    }
    
    $_SESSION['application']['personal_info']['passport_photo'] = $passportPhotoResult['path'];
    $_SESSION['application']['personal_info']['id_document'] = $idDocumentResult['path'];
    
    header('Location: education.php'); // Redirect to Education page
    exit();
}

// Ensure user_id is set in the application data
if (!isset($_SESSION['application']['user_id'])) {
    $_SESSION['application']['user_id'] = $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NTSS - Application Form - Personal Information</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    /* Page wrapper for sticky footer */
    .page-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* Main content: desktop left margin; mobile: margin reset */
    .content {
      margin-left: 250px; /* Sidebar width */
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
    /* Device Ownership Section */
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
        <h2 class="text-center">Application Form - Personal Information</h2>
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: 12.5%;" aria-valuenow="12.5" aria-valuemin="0" aria-valuemax="100">
            Step 1 of 8
          </div>
        </div>
        <p class="text-muted text-center">Please provide accurate information. Fields marked with * are required.</p>
        
        <!-- Begin Form (all fields submitted together) -->
        <form id="applicationForm" method="POST" enctype="multipart/form-data">
            <!-- Device Ownership Section (now inside the form) -->
            <div class="device-section">
              <label class="form-label">Do you have a laptop, desktop or smartphone? <small>(Tick all that apply) *</small></label>
              <div class="form-check">
                <input type="checkbox" id="deviceLaptop" name="devices[]" value="Laptop" class="form-check-input" required>
                <label class="form-check-label" for="deviceLaptop">Laptop</label>
              </div>
              <div class="form-check">
                <input type="checkbox" id="deviceDesktop" name="devices[]" value="Desktop" class="form-check-input" required>
                <label class="form-check-label" for="deviceDesktop">Desktop</label>
              </div>
              <div class="form-check">
                <input type="checkbox" id="deviceSmartphone" name="devices[]" value="Smartphone" class="form-check-input" required>
                <label class="form-check-label" for="deviceSmartphone">Smartphone</label>
              </div>
              <p class="criteria-note">
                Note: Owning a laptop, desktop, or smartphone is part of our eligibility criteria for our competence‑based training programs. Having at least one of these devices is highly recommended and may be required depending on the program selected.
              </p>
            </div>

            <!-- Multi-Step Form Steps -->
            <!-- Step 1: Personal Details -->
            <div class="step step-1">
              <h3>Step 1: Personal Details</h3>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="passport_photo" class="form-label">Upload Passport Photo *</label>
                  <input type="file" id="passport_photo" name="passport_photo" class="form-control" accept=".jpg, .png" required>
                </div>
                <div class="col-md-6 mb-3">
                  <img id="passport_photo_preview" src="#" alt="Passport Photo Preview" class="img-thumbnail mt-2 d-none" style="max-width: 150px;">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="first_name" class="form-label">First Name *</label>
                  <input type="text" id="first_name" name="first_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="middle_name" class="form-label">Middle Name</label>
                  <input type="text" id="middle_name" name="middle_name" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="last_name" class="form-label">Last Name *</label>
                  <input type="text" id="last_name" name="last_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="dob" class="form-label">Date of Birth *</label>
                  <input type="date" id="dob" name="dob" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="sex" class="form-label">Sex *</label>
                  <select id="sex" name="sex" class="form-control" required>
                    <option value="" disabled selected>Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="marital_status" class="form-label">Marital Status *</label>
                  <select id="marital_status" name="marital_status" class="form-control" required>
                    <option value="" disabled selected>Select</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="number_of_children" class="form-label">Number of Children</label>
                  <input type="number" id="number_of_children" name="number_of_children" class="form-control" value="0">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="religion" class="form-label">Religion *</label>
                  <input type="text" id="religion" name="religion" class="form-control" required>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary next-step">Next</button>
              </div>
            </div>

            <!-- Step 2: Contact Information -->
            <div class="step step-2 d-none">
              <h3>Step 2: Contact Information</h3>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="place_of_birth" class="form-label">Place of Birth *</label>
                  <input type="text" id="place_of_birth" name="place_of_birth" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="house_address" class="form-label">House Address *</label>
                  <textarea id="house_address" name="house_address" class="form-control" required></textarea>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="digital_address" class="form-label">Digital Address</label>
                  <input type="text" id="digital_address" name="digital_address" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="city" class="form-label">City *</label>
                  <input type="text" id="city" name="city" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="region" class="form-label">Region *</label>
                  <input type="text" id="region" name="region" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="country" class="form-label">Country *</label>
                  <input type="text" id="country" name="country" class="form-control" value="Ghana" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="phone_number" class="form-label">Phone Number *</label>
                  <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="other_phone_number" class="form-label">Other Phone Number</label>
                  <input type="text" id="other_phone_number" name="other_phone_number" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Email Address *</label>
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="confirm_email" class="form-label">Confirm Email *</label>
                  <input type="email" id="confirm_email" name="confirm_email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="postal_address" class="form-label">Postal Address</label>
                  <textarea id="postal_address" name="postal_address" class="form-control"></textarea>
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-step">Previous</button>
                <button type="button" class="btn btn-primary next-step">Next</button>
              </div>
            </div>

            <!-- Step 3: Identification Details -->
            <div class="step step-3 d-none">
              <h3>Step 3: Identification Details</h3>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="nationality" class="form-label">Nationality *</label>
                  <input type="text" id="nationality" name="nationality" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="identification_type" class="form-label">Identification Type *</label>
                  <select id="identification_type" name="identification_type" class="form-control" required>
                    <option value="" disabled selected>Select</option>
                    <option value="Ghana Card">Ghana Card</option>
                    <option value="Passport">Passport</option>
                    <option value="Voter ID">Voter ID</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="identification_number" class="form-label">Identification Card Number *</label>
                  <input type="text" id="identification_number" name="identification_number" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="id_document" class="form-label">Upload Identification Card Photo Front Only *</label>
                  <input type="file" id="id_document" name="id_document" class="form-control" accept=".jpg, .png, .jpeg" required>
                </div>
                <div class="col-md-6 mb-3">
                  <img id="id_document_preview" src="#" alt="ID Document Preview" class="img-thumbnail mt-2 d-none" style="max-width: 150px;">
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-step">Previous</button>
                <button type="submit" class="btn btn-success">Save & Continue</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJ+8y+QDv9rY0a7V8Q1mWf9B2zF58jYFZCXEg=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
        var currentStep = 1;
        var totalSteps = 3; // Adjust total steps as needed

        function showStep(step) {
            console.log("Showing step " + step);
            $(".step").addClass("d-none");
            $(".step-" + step).removeClass("d-none");

            // Update progress bar if present
            var progress = (step / totalSteps) * 100;
            $(".progress-bar").css("width", progress + "%");
            $(".progress-bar").attr("aria-valuenow", progress);
            $(".progress-bar").text("Step " + step + " of " + totalSteps);
        }

        $(".next-step").click(function () {
            console.log("Next clicked. Current step: " + currentStep);
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            } else {
                $("#applicationForm").submit();
            }
        });

        $(".prev-step").click(function () {
            console.log("Previous clicked. Current step: " + currentStep);
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

        // Validate that Confirm Email matches Email
        $("#confirm_email").on("blur", function() {
            var email = $("#email").val();
            var confirmEmail = $(this).val();
            if(email !== confirmEmail) {
                alert("Email and Confirm Email do not match.");
                $(this).focus();
            }
        });
    });
  </script>
  <?php include("../includes/footer.php"); ?>
</body>
</html>