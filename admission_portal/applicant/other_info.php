<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save Other Information Data to Session
    $_SESSION['application']['other_information'] = $_POST;
    header('Location: sponsor_info.php'); // Redirect to a Sponsor Information page
    exit();
}

// Example options for "How did you hear about NTSS?"
$sources = [
    'Social Media',
    'Friends or Family',
    'Website',
    'Advertisement',
    'Other'
];

// Yes/No options
$yesNoOptions = ['Yes', 'No'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTSS - Application Form - Other Information</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom-styles.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const medicalConditionSelect = document.getElementById('medical_condition');
            const medicalConditionDetails = document.getElementById('medical_condition_details');
            const criminalRecordSelect = document.getElementById('criminal_record');
            const criminalRecordDetails = document.getElementById('criminal_record_details');

            // Show/Hide medical condition details based on selection
            medicalConditionSelect.addEventListener('change', function () {
                medicalConditionDetails.style.display = this.value === 'Yes' ? 'block' : 'none';
            });

            // Show/Hide criminal record details based on selection
            criminalRecordSelect.addEventListener('change', function () {
                criminalRecordDetails.style.display = this.value === 'Yes' ? 'block' : 'none';
            });
        });
    </script>
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
        <h2 class="mb-4">Application Form - Other Information</h2>
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Step 6 of 9</div>
        </div>
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <!-- How did you hear about NTSS? -->
                    <div class="mb-4">
                        <label for="how_did_you_hear" class="form-label">How did you hear about NTSS? *</label>
                        <select id="how_did_you_hear" name="how_did_you_hear" class="form-control" required>
                            <option value="" disabled selected>Please select...</option>
                            <?php foreach ($sources as $source): ?>
                                <option value="<?= htmlspecialchars($source) ?>"><?= htmlspecialchars($source) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Do you have any special medical condition? -->
                    <div class="mb-4">
                        <label for="medical_condition" class="form-label">Do you have any special medical condition? (Required)</label>
                        <select id="medical_condition" name="medical_condition" class="form-select" required>
                            <option value="" disabled selected>Please select...</option>
                            <?php foreach ($yesNoOptions as $option): ?>
                                <option value="<?= htmlspecialchars($option) ?>"><?= htmlspecialchars($option) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div> 
            </div>
            <!-- Medical Condition Details -->
            <div class="mb-4" id="medical_condition_details" style="display: none;">
                <label for="medical_condition_details_text" class="form-label">If yes, explain the type of condition</label>
                <textarea id="medical_condition_details_text" name="medical_condition_details" class="form-control" rows="3" placeholder="Describe the medical condition if applicable" required></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- Do you have any criminal record? -->
                    <div class="mb-4">
                        <label for="criminal_record" class="form-label">Do you have any criminal record? (Required)</label>
                        <select id="criminal_record" name="criminal_record" class="form-select" required>
                            <option value="" disabled selected>Please select...</option>
                            <?php foreach ($yesNoOptions as $option): ?>
                                <option value="<?= htmlspecialchars($option) ?>"><?= htmlspecialchars($option) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Criminal Record Details -->
            <div class="mb-4" id="criminal_record_details" style="display: none;">
                <label for="criminal_record_details_text" class="form-label">If yes, explain</label>
                <textarea id="criminal_record_details_text" name="criminal_record_details" class="form-control" rows="3" placeholder="Provide details of the criminal record if applicable" required></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Previous</button>
                <button type="submit" class="btn btn-primary">Save & Continue</button>
            </div>
        </form>
    </div>
    <?php include("../includes/footer.php"); ?>
</body>
</html>