<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize POST data
    foreach ($_POST as $key => $value) {
        $_SESSION['application']['programme_selection'][$key] = htmlspecialchars($value);
    }
    header('Location: other_info.php'); // Redirect to Other Information page
    exit();
}

// Example programme options with associated fees
$programmes = [
    'Introduction to Artificial Intelligence' => '400.00 for 4 weeks',
    'AI for Beginners: Machine Learning' => '600.00',
    'Digital Literacy' => '1,000.00',
    'Front-End Development' => '3,500.00',
    'Back-End Development' => '4,500.00',
    'Full-Stack Development' => '7,000.00',
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
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
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
        <h2 class="mb-4">Application Form - Program Selection</h2>
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">Step 5 of 9</div>
        </div>

        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <!-- 4.2 | First Choice -->
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
                    <!-- 4.2 | Second Choice -->
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
                    <!-- 4.3 | Third Choice -->
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
                    <!-- 5.0 | Selection of Campus -->
                    <div class="mb-3">
                        <label for="campus" class="form-label">Select Session (Required)</label>
                        <select id="campus" name="campus" class="form-select" required>
                            <option value="" disabled selected>Please select...</option>
                            <?php foreach ($campuses as $campus): ?>
                                <option value="<?= $campus ?>"><?= $campus ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-muted">
                            Select the session you wish to enroll in. Different programmes may be pursued in separate sessions.
                        </small>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Previous</button>
                <button type="submit" class="btn btn-primary">Save & Continue</button>
            </div>
        </form>
    </div>

    <!-- Include Footer -->
    <?php include("../includes/footer.php"); ?>

    <script>
        function updateFees(selectElement, feeElementId) {
            const fee = selectElement.options[selectElement.selectedIndex].getAttribute('data-fee');
            document.getElementById(feeElementId).textContent = fee ? `GH₵${fee}` : '';
        }
    </script>
</body>
</html>