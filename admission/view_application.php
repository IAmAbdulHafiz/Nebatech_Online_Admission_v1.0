<?php
session_start();

// Check if the application session data exists
if (!isset($_SESSION['application_submitted'])) {
    header('Location: applicant_dashboard.php'); // Redirect to the dashboard if no application submitted
    exit();
}

// Include database connection
include('../config/database.php');

// Retrieve the application data from the database
$stmt = $conn->prepare("SELECT * FROM personal_information WHERE application_id = (SELECT id FROM applications WHERE user_id = ?)");
$stmt->execute([$_SESSION['applicant']['id']]);
$applicationData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$applicationData) {
    echo "No application data found.";
    exit();
}

// Helper function to safely fetch data
function getField($field, $default = 'Not provided') {
    return isset($field) && !empty($field) ? htmlspecialchars($field) : $default;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTSS - View Application</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
        .img-thumbnail {
            max-width: 150px;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    <div class="content mt-5">
        <h2 class="mb-3 text-center" style="color: #002060;">View Your Application</h2>
        <!--<div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                Step 9 of 9
            </div>
        </div>-->
        <p class="text-muted text-center">Below is the information you provided in your application.</p>

        <!-- Section: Personal Details -->
        <section>
            <h4>1. Personal Details</h4>
            <div class="card shadow-sm p-3">
                <div class="row g-3 align-items-center">
                    <div class="col-md-3 text-center">
                        <?php if (!empty($applicationData['passport_photo'])): ?>
                            <img src="<?= htmlspecialchars($applicationData['passport_photo']) ?>" 
                                alt="Passport Photo" class="img-thumbnail" style="max-width: 200px; height: 200px;">
                        <?php else: ?>
                            <p>No passport photo uploaded</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-9">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>First Name:</strong> <?= getField($applicationData['first_name']) ?></li>
                            <li class="list-group-item"><strong>Middle Name:</strong> <?= getField($applicationData['middle_name']) ?></li>
                            <li class="list-group-item"><strong>Last Name:</strong> <?= getField($applicationData['last_name']) ?></li>
                            <li class="list-group-item"><strong>Date of Birth:</strong> <?= getField($applicationData['date_of_birth']) ?></li>
                            <li class="list-group-item"><strong>Sex:</strong> <?= getField($applicationData['sex']) ?></li>
                            <li class="list-group-item"><strong>Marital Status:</strong> <?= getField($applicationData['marital_status']) ?></li>
                            <li class="list-group-item"><strong>Number of Children:</strong> <?= getField($applicationData['number_of_children']) ?></li>
                            <li class="list-group-item"><strong>Religion:</strong> <?= getField($applicationData['religion']) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Contact Information -->
        <section>
            <h4>2. Contact Information</h4>
            <div class="card shadow-sm p-3">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Place of Birth:</strong> <?= getField($applicationData['place_of_birth']) ?></li>
                    <li class="list-group-item"><strong>House Address:</strong> <?= getField($applicationData['house_address']) ?></li>
                    <li class="list-group-item"><strong>Digital Address:</strong> <?= getField($applicationData['digital_address']) ?></li>
                    <li class="list-group-item"><strong>City:</strong> <?= getField($applicationData['city']) ?></li>
                    <li class="list-group-item"><strong>Region:</strong> <?= getField($applicationData['region']) ?></li>
                    <li class="list-group-item"><strong>Country:</strong> <?= getField($applicationData['country']) ?></li>
                    <li class="list-group-item"><strong>Phone Number:</strong> <?= getField($applicationData['phone_number']) ?></li>
                    <li class="list-group-item"><strong>Other Phone Number:</strong> <?= getField($applicationData['other_phone_number']) ?></li>
                    <li class="list-group-item"><strong>Email Address:</strong> <?= getField($applicationData['email']) ?></li>
                    <li class="list-group-item"><strong>Confirm Email Address:</strong> <?= getField($applicationData['email']) ?></li>
                    <li class="list-group-item"><strong>Postal Address:</strong> <?= getField($applicationData['postal_address']) ?></li>
                </ul>
            </div>
        </section>

        <!-- Section: Identification Details -->
        <section>
            <h4>3. Identification Details</h4>
            <div class="card shadow-sm p-3">
                <div class="row g-3 align-items-center">
                    <div class="col-md-3 text-center">
                        <?php if (!empty($applicationData['identification_document'])): ?>
                            <img src="<?= htmlspecialchars($applicationData['identification_document']) ?>" 
                            alt="Identification Document" class="img-thumbnail" style="max-width: 200px; height: 200px;">
                        <?php else: ?>
                            <p>No identification document uploaded</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-9">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nationality:</strong> <?= getField($applicationData['nationality']) ?></li>
                            <li class="list-group-item"><strong>Identification Type:</strong> <?= getField($applicationData['identification_type']) ?></li>
                            <li class="list-group-item"><strong>Identification Card Number:</strong> <?= getField($applicationData['identification_number']) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Educational Background -->
        <section>
            <h4>4. Educational Background</h4>
            <div class="card shadow-sm p-3">
                <?php
                $stmt = $conn->prepare("SELECT * FROM educational_background WHERE application_id = ?");
                $stmt->execute([$applicationData['application_id']]);
                $educationalBackground = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php if (!empty($educationalBackground)): ?>
                    <?php foreach ($educationalBackground as $education): ?>
                        <div class="mb-2">
                            <strong>School Name:</strong> <?= getField($education['school_name']) ?><br>
                            <strong>Course:</strong> <?= getField($education['course']) ?><br>
                            <strong>Qualification:</strong> <?= getField($education['qualification']) ?><br>
                            <strong>Period:</strong> <?= getField($education['start_year']) ?> - <?= getField($education['end_year']) ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No educational background provided.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Uploaded Certificates -->
        <section>
            <h4>Uploaded Certificates</h4>
            <div class="card shadow-sm p-3">
                <ul class="list-group">
                    <?php if (!empty($educationalBackground)): ?>
                        <?php foreach ($educationalBackground as $education): ?>
                            <?php if (!empty($education['certificate_path'])): ?>
                                <li class="list-group-item">
                                    <a href="<?= htmlspecialchars($education['certificate_path']) ?>" target="_blank">View Certificate</a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item">No certificates uploaded.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </section>

        <section>
            <h4>Programme Selection</h4> 
            <div class="card shadow-sm p-3">
                <?php
                $stmt = $conn->prepare("SELECT * FROM program_selections WHERE application_id = ?");
                $stmt->execute([$applicationData['application_id']]);
                $programSelections = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <ul class="list-group">
                    <?php if (!empty($programSelections)): ?>
                        <?php foreach ($programSelections as $program): ?>
                            <li class="list-group-item"><strong>Choice <?= $program['choice_number'] ?>:</strong> <?= getField($program['program_name']) ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item">No programme selections provided.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </section>

        <!-- Section: Other Information -->
        <section>
            <h4>Other Information</h4>
            <div class="card shadow-sm p-3">
                <?php
                $stmt = $conn->prepare("SELECT * FROM other_information WHERE application_id = ?");
                $stmt->execute([$applicationData['application_id']]);
                $otherInformation = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <ul class="list-group">
                    <li class="list-group-item"><strong>How did you hear about NTSS?</strong> <?= getField($otherInformation['source_of_information']) ?></li>
                    <li class="list-group-item"><strong>Medical Condition:</strong> <?= getField($otherInformation['has_medical_condition'] ? 'Yes' : 'No') ?></li>
                    <li class="list-group-item"><strong>Medical Condition Details:</strong> <?= getField($otherInformation['medical_condition_description']) ?></li>
                    <li class="list-group-item"><strong>Criminal Record:</strong> <?= getField($otherInformation['has_criminal_record'] ? 'Yes' : 'No') ?></li>
                    <li class="list-group-item"><strong>Criminal Record Details:</strong> <?= getField($otherInformation['criminal_record_description']) ?></li>
                </ul>
            </div>
        </section>

        <!-- Section: Sponsor Information -->
        <section>
            <h4>Parent/Guardian/Sponsor Information</h4>
            <div class="card shadow-sm p-3">
                <?php
                $stmt = $conn->prepare("SELECT * FROM sponsor_information WHERE application_id = ?");
                $stmt->execute([$applicationData['application_id']]);
                $sponsorInformation = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <ul class="list-group">
                    <li class="list-group-item"><strong>First Name:</strong> <?= getField($sponsorInformation['first_name']) ?></li>
                    <li class="list-group-item"><strong>Last Name:</strong> <?= getField($sponsorInformation['last_name']) ?></li>
                    <li class="list-group-item"><strong>Relationship:</strong> <?= getField($sponsorInformation['relationship']) ?></li>
                    <li class="list-group-item"><strong>Occupation:</strong> <?= getField($sponsorInformation['occupation']) ?></li>
                    <li class="list-group-item"><strong>House Address:</strong> <?= getField($sponsorInformation['house_address']) ?></li>
                    <li class="list-group-item"><strong>Digital Address:</strong> <?= getField($sponsorInformation['digital_address']) ?></li>
                    <li class="list-group-item"><strong>City:</strong> <?= getField($sponsorInformation['city']) ?></li>
                    <li class="list-group-item"><strong>Region:</strong> <?= getField($sponsorInformation['region']) ?></li>
                    <li class="list-group-item"><strong>Phone Number:</strong> <?= getField($sponsorInformation['phone_number']) ?></li>
                </ul>
            </div>
        </section>

        <!-- Section: Work Experience -->
        <section>
            <h4>Work Experience</h4>
            <div class="card shadow-sm p-3">
                <?php
                $stmt = $conn->prepare("SELECT * FROM work_experience WHERE application_id = ?");
                $stmt->execute([$applicationData['application_id']]);
                $workExperiences = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <ul class="list-group">
                    <?php if (!empty($workExperiences)): ?>
                        <?php foreach ($workExperiences as $experience): ?>
                            <li class="list-group-item">
                                <strong>Company:</strong> <?= getField($experience['company']) ?><br>
                                <strong>Role:</strong> <?= getField($experience['role']) ?><br>
                                <strong>Duration:</strong> <?= getField($experience['duration']) ?>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item">No work experience provided.</li>
                    <?php endif; ?> 
                </ul>
            </div>
        </section>
    </div>
    <?php include("../includes/footer.php"); ?>
</body>
</html>