<?php
session_start();

// Check if the application session data exists
if (!isset($_SESSION['application'])) {
    header('Location: applicant_dashboard.php'); // Redirect to the starting page if no session data
    exit();
}

// Retrieve the application data
$applicationData = $_SESSION['application'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $workExperience = [];
    foreach ($_POST['company'] as $index => $company) {
        $workExperience[] = [
            'company' => htmlspecialchars($company),
            'role' => htmlspecialchars($_POST['role'][$index]),
            'duration' => htmlspecialchars($_POST['duration'][$index])
        ];
    }
    $_SESSION['application']['work_experience'] = $workExperience;
    header('Location: review.php'); // Redirect to the review page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTSS - Work Experience</title>
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
        .remove-btn {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <div class="content mt-5">
        <h2 class="mb-4">Application Form - Work Experience</h2>
        <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">Step 8 of 9</div>
        </div>
        <form action="work_experience.php" method="post">
            <div id="work-experience-section">
                <div class="card shadow-sm p-3 mb-3">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" name="company[]" class="form-control" placeholder="e.g., ABC Corp" required>
                        </div>
                        <div class="col-md-4">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" name="role[]" class="form-control" placeholder="e.g., Software Engineer" required>
                        </div>
                        <div class="col-md-4">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" name="duration[]" class="form-control" placeholder="e.g., Jan 2020 - Dec 2021" required>
                        </div>
                        <div class="col-md-4 remove-btn">
                            <button type="button" class="btn btn-danger" onclick="removeWorkExperience(this)">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary mb-3" onclick="addWorkExperience()">Add More</button>
            <div class="d-flex justify-content-between mt-4">
                <a href="personal_info.php" class="btn btn-secondary">Previous</a>
                <button type="submit" class="btn btn-success">Save and Continue</button>
            </div>
        </form>
    </div>
    <?php include("../includes/footer.php"); ?>
    <script>
        function addWorkExperience() {
            var section = document.getElementById('work-experience-section');
            var newExperience = document.createElement('div');
            newExperience.className = 'card shadow-sm p-3 mb-3';
            newExperience.innerHTML = `
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="company" class="form-label">Company</label>
                        <input type="text" name="company[]" class="form-control" placeholder="e.g., ABC Corp" required>
                    </div>
                    <div class="col-md-4">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" name="role[]" class="form-control" placeholder="e.g., Software Engineer" required>
                    </div>
                    <div class="col-md-4">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" name="duration[]" class="form-control" placeholder="e.g., Jan 2020 - Dec 2021" required>
                    </div>
                    <div class="col-md-4 remove-btn">
                        <button type="button" class="btn btn-danger" onclick="removeWorkExperience(this)">Delete</button>
                    </div>
                </div>
            `;
            section.appendChild(newExperience);
        }

        function removeWorkExperience(button) {
            var card = button.closest('.card');
            card.remove();
        }
    </script>
</body>
</html>
