<?php 
session_start();

// Redirect if no application session data exists
if (!isset($_SESSION['application'])) {
    header('Location: applicant_dashboard.php'); // Redirect to the starting page if no session data
    exit();
}

// Retrieve the application data from session
$applicationData = $_SESSION['application'];

// Helper function to safely fetch session data
function getField($field, $default = 'Not provided') {
    return isset($field) && !empty($field) ? htmlspecialchars($field) : $default;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NTSS - Review Application</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    /* Page wrapper for sticky footer and consistent dashboard layout */
    .page-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* Main content area */
    .content {
      margin-left: 270px; /* Sidebar width (as used in your code) */
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
    /* Card and image styling */
    .card {
      margin-bottom: 50px;
    }
    .card:hover {
      box-shadow: none !important;
      transform: none !important;
    }
    .img-thumbnail {
      max-width: 200px;
      height: 200px;
      object-fit: cover;
    }
    /* Progress bar styling */
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
  <script>
    function validateForm() {
        var legalConsent = document.getElementById('legal_consent');
        if (!legalConsent.checked) {
            alert('You must agree to the privacy policy and terms of use before submitting.');
            return false;
        }
        // Optional: check work experience if required
        var workExperience = document.getElementById('work_experience');
        if (workExperience && workExperience.value.trim() === '') {
            alert('Please provide your work experience.');
            return false;
        }
        return true;
    }
  </script>
</head>
<body>
  <div class="page-wrapper">
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <div class="content mt-5">
      <div class="container">
        <h2 class="mb-3 text-center">Review Your Application</h2>
        <div class="progress mb-4">
          <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            Step 9 of 9
          </div>
        </div>
        <p class="text-muted text-center">Please review the information you provided. You can edit or confirm your submission below.</p>

        <form onsubmit="return validateForm()" action="submit_application.php" method="post">
          <!-- Section: Personal Details -->
          <section>
            <h4>1. Personal Details</h4>
            <div class="card shadow-sm p-3">
              <div class="row g-3 align-items-center">
                <div class="col-md-3 text-center">
                  <?php if (!empty($applicationData['personal_info']['passport_photo'])): ?>
                    <img src="<?= htmlspecialchars($applicationData['personal_info']['passport_photo']) ?>" 
                         alt="Passport Photo" class="img-thumbnail">
                  <?php else: ?>
                    <p>No passport photo uploaded</p>
                  <?php endif; ?>
                </div> 
                <div class="col-md-9">
                  <ul class="list-group">
                    <li class="list-group-item"><strong>First Name:</strong> <?= htmlspecialchars($applicationData['personal_info']['first_name'] ?? 'Not provided') ?></li>
                    <li class="list-group-item"><strong>Middle Name:</strong> <?= htmlspecialchars($applicationData['personal_info']['middle_name'] ?? 'Not provided') ?></li>
                    <li class="list-group-item"><strong>Last Name:</strong> <?= htmlspecialchars($applicationData['personal_info']['last_name'] ?? 'Not provided') ?></li>
                    <li class="list-group-item"><strong>Date of Birth:</strong> <?= htmlspecialchars($applicationData['personal_info']['dob'] ?? 'Not provided') ?></li>
                    <li class="list-group-item"><strong>Sex:</strong> <?= htmlspecialchars($applicationData['personal_info']['sex'] ?? 'Not provided') ?></li>
                    <li class="list-group-item"><strong>Marital Status:</strong> <?= htmlspecialchars($applicationData['personal_info']['marital_status'] ?? 'Not provided') ?></li>
                    <li class="list-group-item"><strong>Number of Children:</strong> <?= htmlspecialchars($applicationData['personal_info']['number_of_children'] ?? 'Not provided') ?></li>
                    <li class="list-group-item"><strong>Religion:</strong> <?= htmlspecialchars($applicationData['personal_info']['religion'] ?? 'Not provided') ?></li>
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
                <li class="list-group-item"><strong>Place of Birth:</strong> <?= getField($applicationData['personal_info']['place_of_birth'] ?? null) ?></li>
                <li class="list-group-item"><strong>House Address:</strong> <?= getField($applicationData['personal_info']['house_address'] ?? null) ?></li>
                <li class="list-group-item"><strong>Digital Address:</strong> <?= getField($applicationData['personal_info']['digital_address'] ?? null) ?></li>
                <li class="list-group-item"><strong>City:</strong> <?= getField($applicationData['personal_info']['city'] ?? null) ?></li>
                <li class="list-group-item"><strong>Region:</strong> <?= getField($applicationData['personal_info']['region'] ?? null) ?></li>
                <li class="list-group-item"><strong>Country:</strong> <?= getField($applicationData['personal_info']['country'] ?? null) ?></li>
                <li class="list-group-item"><strong>Phone Number:</strong> <?= getField($applicationData['personal_info']['phone_number'] ?? null) ?></li>
                <li class="list-group-item"><strong>Other Phone Number:</strong> <?= getField($applicationData['personal_info']['other_phone_number'] ?? null) ?></li>
                <li class="list-group-item"><strong>Email Address:</strong> <?= getField($applicationData['personal_info']['email'] ?? null) ?></li>
                <li class="list-group-item"><strong>Confirm Email Address:</strong> <?= getField($applicationData['personal_info']['confirm_email'] ?? null) ?></li>
                <li class="list-group-item"><strong>Postal Address:</strong> <?= getField($applicationData['personal_info']['postal_address'] ?? null) ?></li>
              </ul>
            </div>
          </section>

          <!-- Section: Identification Details -->
          <section>
            <h4>3. Identification Details</h4>
            <div class="card shadow-sm p-3">
              <div class="row g-3 align-items-center">
                <div class="col-md-3 text-center">
                  <?php if (!empty($applicationData['personal_info']['id_document'])): ?>
                    <img src="<?= htmlspecialchars($applicationData['personal_info']['id_document']) ?>" 
                         alt="Identification Document" class="img-thumbnail">
                  <?php else: ?>
                    <p>No identification document uploaded</p>
                  <?php endif; ?>
                </div>
                <div class="col-md-9">
                  <ul class="list-group">
                    <li class="list-group-item"><strong>Nationality:</strong> <?= getField($applicationData['personal_info']['nationality'] ?? null) ?></li>
                    <li class="list-group-item"><strong>Identification Type:</strong> <?= getField($applicationData['personal_info']['identification_type'] ?? null) ?></li>
                    <li class="list-group-item"><strong>Identification Card Number:</strong> <?= getField($applicationData['personal_info']['identification_number'] ?? null) ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </section>

          <!-- Section: Educational Background -->
          <section>
            <h4>4. Educational Background</h4>
            <div class="card shadow-sm p-3">
              <?php if (!empty($applicationData['educational_background']['school'])): ?>
                <?php foreach ($applicationData['educational_background']['school'] as $index => $school): ?>
                  <div class="mb-2">
                    <strong>School Name:</strong> <?= getField($school) ?><br>
                    <strong>Course:</strong> <?= getField($applicationData['educational_background']['course'][$index] ?? null) ?><br>
                    <strong>Qualification:</strong> <?= getField($applicationData['educational_background']['qualification'][$index] ?? null) ?><br>
                    <strong>Period:</strong> <?= getField($applicationData['educational_background']['start_period'][$index] ?? null) ?> - <?= getField($applicationData['educational_background']['end_period'][$index] ?? null) ?>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No educational background provided.</p>
              <?php endif; ?>
            </div>
          </section>

          <!-- Section: Uploaded Certificates -->
          <section>
            <h4>5. Uploaded Certificates</h4>
            <div class="card shadow-sm p-3">
              <ul class="list-group">
                <?php if (!empty($applicationData['certificates'])): ?>
                  <?php foreach ($applicationData['certificates'] as $certificate): ?>
                    <li class="list-group-item">
                      <a href="<?= htmlspecialchars($certificate) ?>" target="_blank">View Certificate</a>
                    </li>
                  <?php endforeach; ?>
                <?php else: ?>
                  <li class="list-group-item">No certificates uploaded.</li>
                <?php endif; ?>
              </ul>
            </div>
          </section>

          <!-- Section: Programme Selection -->
          <section>
            <h4>6. Programme Selection</h4> 
            <div class="card shadow-sm p-3">
              <ul class="list-group">
                <li class="list-group-item"><strong>First Choice:</strong> <?= getField($applicationData['programme_selection']['first_choice'] ?? null) ?></li>
                <li class="list-group-item"><strong>Second Choice:</strong> <?= getField($applicationData['programme_selection']['second_choice'] ?? null) ?></li>
                <li class="list-group-item"><strong>Third Choice:</strong> <?= getField($applicationData['programme_selection']['third_choice'] ?? null) ?></li>
                <li class="list-group-item"><strong>Session:</strong> <?= getField($applicationData['programme_selection']['campus'] ?? null) ?></li>
              </ul>
            </div>
          </section>

          <!-- Section: Other Information -->
          <section>
            <h4>7. Other Information</h4>
            <div class="card shadow-sm p-3">
              <ul class="list-group">
                <li class="list-group-item"><strong>How did you hear about NTSS?</strong> <?= getField($applicationData['other_information']['how_did_you_hear'] ?? null) ?></li>
                <li class="list-group-item"><strong>Medical Condition:</strong> <?= getField($applicationData['other_information']['medical_condition'] ?? null) ?></li>
                <li class="list-group-item"><strong>Medical Condition Details:</strong> <?= getField($applicationData['other_information']['medical_condition_details'] ?? null) ?></li>
                <li class="list-group-item"><strong>Criminal Record:</strong> <?= getField($applicationData['other_information']['criminal_record'] ?? null) ?></li>
                <li class="list-group-item"><strong>Criminal Record Details:</strong> <?= getField($applicationData['other_information']['criminal_record_details'] ?? null) ?></li>
              </ul>
            </div>
          </section>

          <!-- Section: Sponsor Information -->
          <section>
            <h4>8. Parent/Guardian/Sponsor Information</h4>
            <div class="card shadow-sm p-3">
              <ul class="list-group">
                <li class="list-group-item"><strong>First Name:</strong> <?= getField($applicationData['sponsor_information']['sponsor_first_name'] ?? null) ?></li>
                <li class="list-group-item"><strong>Last Name:</strong> <?= getField($applicationData['sponsor_information']['sponsor_last_name'] ?? null) ?></li>
                <li class="list-group-item"><strong>Relationship:</strong> <?= getField($applicationData['sponsor_information']['sponsor_relationship'] ?? null) ?></li>
                <li class="list-group-item"><strong>Occupation:</strong> <?= getField($applicationData['sponsor_information']['sponsor_occupation'] ?? null) ?></li>
                <li class="list-group-item"><strong>House Address:</strong> <?= getField($applicationData['sponsor_information']['sponsor_house_address'] ?? null) ?></li>
                <li class="list-group-item"><strong>Digital Address:</strong> <?= getField($applicationData['sponsor_information']['sponsor_digital_address'] ?? null) ?></li>
                <li class="list-group-item"><strong>City:</strong> <?= getField($applicationData['sponsor_information']['sponsor_city'] ?? null) ?></li>
                <li class="list-group-item"><strong>Region:</strong> <?= getField($applicationData['sponsor_information']['sponsor_region'] ?? null) ?></li>
                <li class="list-group-item"><strong>Phone Number:</strong> <?= getField($applicationData['sponsor_information']['sponsor_phone'] ?? null) ?></li>
              </ul>
            </div>
          </section>

          <!-- Section: Work Experience -->
          <section>
            <h4>9. Work Experience</h4>
            <div class="card shadow-sm p-3">
              <ul class="list-group">
                <?php if (!empty($applicationData['work_experience'])): ?>
                  <?php foreach ($applicationData['work_experience'] as $experience): ?>
                    <li class="list-group-item">
                      <strong>Company:</strong> <?= getField($experience['company'] ?? null) ?><br>
                      <strong>Role:</strong> <?= getField($experience['role'] ?? null) ?><br>
                      <strong>Duration:</strong> <?= getField($experience['duration'] ?? null) ?>
                    </li>
                  <?php endforeach; ?>
                <?php else: ?>
                  <li class="list-group-item">No work experience provided.</li>
                <?php endif; ?>
              </ul>
            </div>
          </section>

          <!-- Section: Legal Consent -->
          <section>
            <h4>Legal Consent</h4>
            <div class="card shadow-sm p-3">
              <div class="form-check">
                <input type="checkbox" id="legal_consent" name="legal_consent" class="form-check-input" required>
                <label for="legal_consent" class="form-check-label">
                  I agree to the privacy policy and terms of use of this application form. I confirm that all information provided is accurate.
                </label>
              </div>
            </div>
          </section>

          <!-- Navigation Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <a href="edit_application.php" class="btn btn-secondary">Edit Information</a>
            <button type="submit" class="btn btn-success">Confirm and Submit</button>
          </div>
        </form>
      </div>
    </div>
    <?php include("../includes/footer.php"); ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>