<?php
session_start();

// Function to handle file uploads
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
    // Sanitize POST data
    foreach ($_POST as $key => $value) {
        $_SESSION['application']['personal_info'][$key] = htmlspecialchars($value);
    }

    // Define upload directory
    $uploadDir = '../uploads/';
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
        die('Failed to create upload directory.');
    }

    // Handle file uploads
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
        body {
            padding-top: 70px; /* Height of the fixed header */
            padding-bottom: 70px; /* Height of the fixed footer */
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 70px; /* Height of the fixed header */
            bottom: 70px; /* Height of the fixed footer */
            left: 0;
            background-color: #FFA500;
            padding-top: 20px;
            overflow-y: auto;
        }
        .content {
            margin-left: 250px; /* Width of the sidebar */
            padding: 20px;
            height: calc(100vh - 140px); /* Full height minus header and footer */
            overflow-y: auto;
        }
        /* Responsive layout for mobile screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                top: 60px;
            }
            .content {
                margin-left: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <div class="content">
        <h2 class="text-center">Application Form - Personal Information</h2>
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 12.5%;" aria-valuenow="12.5" aria-valuemin="0" aria-valuemax="100">Step 1 of 8</div>
        </div>
        <p class="text-muted text-center">Please provide accurate information. Fields marked with * are required.</p>

        <!-- Multi-Step Form -->
        <div id="multi-step-form">
            <form id="applicationForm" method="POST" enctype="multipart/form-data">
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
                            <input type="text" id="city" name="city" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="region" class="form-label">Region *</label>
                            <input type="text" id="region" name="region" class="form-control">
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
                            <input type="file" id="id_document" name="id_document" class="form-control" accept=".jpg, .png, jpeg" required>
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
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var currentStep = 1;
        var totalSteps = 9; // Set total steps to 3 for this form

        function showStep(step) {
            $(".step").addClass("d-none");
            $(".step-" + step).removeClass("d-none");

            // Update progress bar
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
    </script>
    <!-- Include Footer -->
    <?php include("../includes/footer.php"); ?>
</body>
</html>