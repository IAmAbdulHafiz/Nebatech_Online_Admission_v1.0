<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

require_once("../config/database.php");
require_once("../includes/functions.php");

// Fetch applicant details
$query = "
    SELECT 
        pi.*, 
        ps.program_name, ps.program_fee, 
        si.first_name AS sponsor_first_name, si.last_name AS sponsor_last_name, si.relationship, si.occupation, si.phone_number AS sponsor_phone_number, 
        oi.source_of_information, oi.has_medical_condition, oi.medical_condition_description, oi.has_criminal_record, oi.criminal_record_description, 
        eb.school_name, eb.course, eb.qualification, eb.start_year, eb.end_year,
        we.company_name, we.position, we.start_date AS work_start_date, we.end_date AS work_end_date,
        lc.privacy_policy_accepted, lc.accurate_information_acknowledged,
        pi.passport_photo
    FROM applicants a
    LEFT JOIN personal_information pi ON a.id = pi.application_id
    LEFT JOIN program_selections ps ON a.id = ps.application_id
    LEFT JOIN sponsor_information si ON a.id = si.application_id
    LEFT JOIN other_information oi ON a.id = oi.application_id
    LEFT JOIN educational_background eb ON a.id = eb.application_id
    LEFT JOIN work_experience we ON a.id = we.application_id
    LEFT JOIN legal_consent lc ON a.id = lc.application_id
    WHERE a.id = :applicant_id
";

$applicant_id = $_GET['id']; // Ensure 'id' key is defined
$stmt = $conn->prepare($query);
$stmt->bindParam(":applicant_id", $applicant_id);
$stmt->execute();
$applicant = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$applicant) {
    echo "<p>Applicant not found.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applicant</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .card-body p {
            margin-bottom: 10px;
        }
        .passport-photo {
            max-width: 150px;
            max-height: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include("../includes/header.php"); ?>
    <?php include("../includes/sidebar.php"); ?>

    <div class="container mt-5 pt-5">
        <h2 class="mb-4">View Applicant</h2>
        <div class="card">
            <div class="card-header">
                Personal Information
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo htmlspecialchars($applicant['passport_photo']); ?>" alt="Passport Photo" class="passport-photo img-thumbnail">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($applicant['first_name'] . ' ' . $applicant['middle_name'] . ' ' . $applicant['last_name']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($applicant['date_of_birth']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Sex:</strong> <?php echo htmlspecialchars($applicant['sex']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Place of Birth:</strong> <?php echo htmlspecialchars($applicant['place_of_birth']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>House Address:</strong> <?php echo htmlspecialchars($applicant['house_address']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>City:</strong> <?php echo htmlspecialchars($applicant['city']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Region:</strong> <?php echo htmlspecialchars($applicant['region']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Country:</strong> <?php echo htmlspecialchars($applicant['country']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nationality:</strong> <?php echo htmlspecialchars($applicant['nationality']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($applicant['email']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($applicant['phone_number']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Educational Background
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>School Name:</strong> <?php echo htmlspecialchars($applicant['school_name']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Course:</strong> <?php echo htmlspecialchars($applicant['course']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Qualification:</strong> <?php echo htmlspecialchars($applicant['qualification']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Start Year:</strong> <?php echo htmlspecialchars($applicant['start_year']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>End Year:</strong> <?php echo htmlspecialchars($applicant['end_year']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Program Selection
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Program Name:</strong> <?php echo htmlspecialchars($applicant['program_name']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Program Fee:</strong> <?php echo htmlspecialchars($applicant['program_fee']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Sponsor Information
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($applicant['sponsor_first_name'] . ' ' . $applicant['sponsor_last_name']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Relationship:</strong> <?php echo htmlspecialchars($applicant['relationship']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Occupation:</strong> <?php echo htmlspecialchars($applicant['occupation']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($applicant['sponsor_phone_number']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Other Information
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Source of Information:</strong> <?php echo htmlspecialchars($applicant['source_of_information']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Has Medical Condition:</strong> <?php echo $applicant['has_medical_condition'] ? 'Yes' : 'No'; ?></p>
                    </div>
                    <?php if ($applicant['has_medical_condition']): ?>
                        <div class="col-md-12">
                            <p><strong>Medical Condition Description:</strong> <?php echo htmlspecialchars($applicant['medical_condition_description']); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-6">
                        <p><strong>Has Criminal Record:</strong> <?php echo $applicant['has_criminal_record'] ? 'Yes' : 'No'; ?></p>
                    </div>
                    <?php if ($applicant['has_criminal_record']): ?>
                        <div class="col-md-12">
                            <p><strong>Criminal Record Description:</strong> <?php echo htmlspecialchars($applicant['criminal_record_description']); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Work Experience
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Company Name:</strong> <?php echo htmlspecialchars($applicant['company_name']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Position:</strong> <?php echo htmlspecialchars($applicant['position']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Start Date:</strong> <?php echo htmlspecialchars($applicant['work_start_date']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>End Date:</strong> <?php echo htmlspecialchars($applicant['work_end_date']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header">
                Legal Consent
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Privacy Policy Accepted:</strong> <?php echo $applicant['privacy_policy_accepted'] ? 'Yes' : 'No'; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Accurate Information Acknowledged:</strong> <?php echo $applicant['accurate_information_acknowledged'] ? 'Yes' : 'No'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br>
    <?php include("../includes/footer.php"); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>