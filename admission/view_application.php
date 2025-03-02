<?php 
session_start();

// Check if the application session data exists
if (!isset($_SESSION['application_submitted'])) {
    header('Location: applicant_dashboard.php'); // Redirect if no application submitted
    exit();
}

// Include database connection
include('../config/database.php');

// Retrieve the application data from the database
$stmt = $conn->prepare("SELECT * FROM personal_information WHERE applicant_id = ?");
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
  <!-- Bootstrap CSS & Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      min-height: 100vh;
    }
    /* Main content similar to dashboard */
    .main-content {
      margin-left: 250px;
      padding: 20px;
    }
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
      }
    }
    .card {
      margin-bottom: 30px;
    }
    .img-thumbnail {
      max-width: 200px;
      height: 200px;
    }
    .action-buttons {
      margin-bottom: 20px;
    }
    /* Print media: hide header, footer, and sidebar */
    @media print {
      header, footer, #sidebar, .action-buttons { 
        display: none !important; 
      }
      .main-content {
        margin: 0;
      }
    }
  </style>
</head>
<body>
  <?php include("includes/header.php"); ?>
  <?php include("includes/sidebar.php"); ?>
  
  <div class="main-content" id="contentToPrint">
    <div class="container">
      <h2 class="mb-4 text-center" style="color: #002060;">View Your Application</h2>
      <p class="text-muted text-center">Below is the information you provided in your application.</p>

      <!-- Action Buttons -->
      <div class="d-flex justify-content-end action-buttons">
          <button id="downloadBtn" class="btn btn-primary me-2">
            <i class="bi bi-download"></i> Download PDF
          </button>
          <button id="printBtn" class="btn btn-secondary">
            <i class="bi bi-printer"></i> Print
          </button>
      </div>

      <!-- Section: Personal Details -->
      <section>
          <h4>1. Personal Details</h4>
          <div class="card shadow-sm p-3">
              <div class="row g-3 align-items-center">
                  <div class="col-md-3 text-center">
                      <?php if (!empty($applicationData['passport_photo'])): ?>
                          <img src="<?= htmlspecialchars($applicationData['passport_photo']) ?>" 
                               alt="Passport Photo" class="img-thumbnail">
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
                               alt="Identification Document" class="img-thumbnail">
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
              $stmt = $conn->prepare("SELECT * FROM educational_background WHERE applicant_id = ?");
              $stmt->execute([$applicationData['applicant_id']]);
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

      <!-- Section: Programme Selection -->
      <section>
          <h4>Programme Selection</h4>
          <div class="card shadow-sm p-3">
              <?php
              $stmt = $conn->prepare("SELECT * FROM program_selections WHERE applicant_id = ?");
              $stmt->execute([$applicationData['applicant_id']]);
              $programSelections = $stmt->fetchAll(PDO::FETCH_ASSOC);
              ?>
              <ul class="list-group">
                  <?php if (!empty($programSelections)): ?>
                      <?php foreach ($programSelections as $program): ?>
                          <li class="list-group-item">
                              <strong>Choice <?= getField($program['choice_number']) ?>:</strong> <?= getField($program['program_name']) ?>
                          </li>
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
              $stmt = $conn->prepare("SELECT * FROM other_information WHERE applicant_id = ?");
              $stmt->execute([$applicationData['applicant_id']]);
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

      <!-- Section: Parent/Guardian/Sponsor Information -->
      <section>
          <h4>Parent/Guardian/Sponsor Information</h4>
          <div class="card shadow-sm p-3">
              <?php
              $stmt = $conn->prepare("SELECT * FROM sponsor_information WHERE applicant_id = ?");
              $stmt->execute([$applicationData['applicant_id']]);
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
              $stmt = $conn->prepare("SELECT * FROM work_experience WHERE applicant_id = ?");
              $stmt->execute([$applicationData['applicant_id']]);
              $workExperiences = $stmt->fetchAll(PDO::FETCH_ASSOC);
              ?>
              <ul class="list-group">
                  <?php if (!empty($workExperiences)): ?>
                      <?php foreach ($workExperiences as $experience): ?>
                          <li class="list-group-item">
                              <strong>Company:</strong> <?= getField($experience['company_name']) ?><br>
                              <strong>Role:</strong> <?= getField($experience['position']) ?><br>
                              <strong>Duration:</strong> <?= getField($experience['start_date']) ?> - <?= getField($experience['end_date']) ?>
                          </li>
                      <?php endforeach; ?>
                  <?php else: ?>
                      <li class="list-group-item">No work experience provided.</li>
                  <?php endif; ?>
              </ul>
          </div>
      </section>
    </div>
  </div>

  <?php include("../includes/footer.php"); ?>
  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jsPDF and html2canvas Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script>
    // Print Function: Opens print dialog for the main content only (header, footer, and sidebar hidden via CSS)
    document.getElementById('printBtn').addEventListener('click', function () {
      window.print();
    });

    // Download PDF Function using html2canvas and jsPDF
    document.getElementById('downloadBtn').addEventListener('click', function () {
      html2canvas(document.getElementById('contentToPrint')).then(function(canvas) {
          const imgData = canvas.toDataURL('image/png');
          const { jsPDF } = window.jspdf;
          const doc = new jsPDF('p', 'mm', 'a4');
          const pageWidth = doc.internal.pageSize.getWidth();
          const pageHeight = doc.internal.pageSize.getHeight();
          // Calculate the image dimensions to maintain aspect ratio
          const imgWidth = pageWidth;
          const imgHeight = canvas.height * imgWidth / canvas.width;
          doc.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
          doc.save('application.pdf');
      }).catch(function(error) {
          console.error('Error generating PDF:', error);
      });
    });
  </script>
</body>
</html>