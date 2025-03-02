<?php 
session_start();
include('../config/database.php'); // Include database connection
include('../includes/functions.php'); // Include helper functions

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure session data exists
    if (!isset($_SESSION['application'])) {
        echo "No application data found in session.";
        exit();
    }

    // Retrieve all data from the session
    $applicationData = $_SESSION['application'];

    // Retrieve legal consent data from the form submission
    $privacy_policy_accepted = isset($_POST['legal_consent']) ? 1 : 0;
    $accurate_information_acknowledged = $privacy_policy_accepted;

    try {
        // Ensure database connection is successful
        if (!$conn) {
            throw new Exception("Database connection failed.");
        }

        $conn->beginTransaction();

        // Insert applicant record (replacing applications table)
        $stmt = $conn->prepare("INSERT INTO applicants (user_id, application_status, payment_status) VALUES (?, 'Pending', 'Unpaid')");
        $stmt->execute([$_SESSION['user_id']]);
        $applicant_id = $conn->lastInsertId();

        // Add notification for new application submission
        addNotification($conn, $_SESSION['user_id'], "Your application has been submitted successfully.");

        // Insert personal information (using applicant_id)
        $stmt = $conn->prepare("INSERT INTO personal_information 
            (applicant_id, first_name, middle_name, last_name, date_of_birth, sex, place_of_birth, house_address, digital_address, city, region, country, nationality, identification_type, identification_number, identification_document, marital_status, number_of_children, religion, email, phone_number, other_phone_number, postal_address, passport_photo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $applicant_id,
            htmlspecialchars($applicationData['personal_info']['first_name']),
            htmlspecialchars($applicationData['personal_info']['middle_name']),
            htmlspecialchars($applicationData['personal_info']['last_name']),
            htmlspecialchars($applicationData['personal_info']['dob']),
            htmlspecialchars($applicationData['personal_info']['sex']),
            htmlspecialchars($applicationData['personal_info']['place_of_birth']),
            htmlspecialchars($applicationData['personal_info']['house_address']),
            htmlspecialchars($applicationData['personal_info']['digital_address']),
            htmlspecialchars($applicationData['personal_info']['city']),
            htmlspecialchars($applicationData['personal_info']['region']),
            htmlspecialchars($applicationData['personal_info']['country']),
            htmlspecialchars($applicationData['personal_info']['nationality']),
            htmlspecialchars($applicationData['personal_info']['identification_type']),
            htmlspecialchars($applicationData['personal_info']['identification_number']),
            htmlspecialchars($applicationData['personal_info']['identification_document']),
            htmlspecialchars($applicationData['personal_info']['marital_status']),
            htmlspecialchars($applicationData['personal_info']['number_of_children']),
            htmlspecialchars($applicationData['personal_info']['religion']),
            htmlspecialchars($applicationData['personal_info']['email']),
            htmlspecialchars($applicationData['personal_info']['phone_number']),
            htmlspecialchars($applicationData['personal_info']['other_phone_number']),
            htmlspecialchars($applicationData['personal_info']['postal_address']),
            htmlspecialchars($applicationData['personal_info']['passport_photo'])
        ]);

        // Insert educational background (using applicant_id)
        foreach ($applicationData['educational_background']['school'] as $index => $school) {
            $stmt = $conn->prepare("INSERT INTO educational_background 
                (application_id, school_name, course, qualification, start_year, end_year, certificate_path) 
                VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $applicant_id,
                htmlspecialchars($school),
                htmlspecialchars($applicationData['educational_background']['course'][$index]),
                htmlspecialchars($applicationData['educational_background']['qualification'][$index]),
                htmlspecialchars($applicationData['educational_background']['start_period'][$index]),
                htmlspecialchars($applicationData['educational_background']['end_period'][$index]),
                htmlspecialchars($applicationData['certificates'][$index])
            ]);
        }

        // Insert programme selection (using applicant_id)
        $stmt = $conn->prepare("INSERT INTO program_selections (application_id, choice_number, program_name, program_fee) VALUES (?, 1, ?, ?)");
        $stmt->execute([
            $applicant_id,
            htmlspecialchars($applicationData['programme_selection']['first_choice']),
            htmlspecialchars($applicationData['programme_selection']['first_choice_fee'] ?? 0)
        ]);
        if (!empty($applicationData['programme_selection']['second_choice'])) {
            $stmt = $conn->prepare("INSERT INTO program_selections (application_id, choice_number, program_name, program_fee) VALUES (?, 2, ?, ?)");
            $stmt->execute([
                $applicant_id,
                htmlspecialchars($applicationData['programme_selection']['second_choice']),
                htmlspecialchars($applicationData['programme_selection']['second_choice_fee'] ?? 0)
            ]);
        }
        if (!empty($applicationData['programme_selection']['third_choice'])) {
            $stmt = $conn->prepare("INSERT INTO program_selections (application_id, choice_number, program_name, program_fee) VALUES (?, 3, ?, ?)");
            $stmt->execute([
                $applicant_id,
                htmlspecialchars($applicationData['programme_selection']['third_choice']),
                htmlspecialchars($applicationData['programme_selection']['third_choice_fee'] ?? 0)
            ]);
        }

        // Insert other information (using applicant_id)
        $stmt = $conn->prepare("INSERT INTO other_information 
            (application_id, source_of_information, has_medical_condition, medical_condition_description, has_criminal_record, criminal_record_description) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $applicant_id,
            htmlspecialchars($applicationData['other_information']['how_did_you_hear']),
            htmlspecialchars($applicationData['other_information']['medical_condition'] === 'Yes' ? 1 : 0),
            htmlspecialchars($applicationData['other_information']['medical_condition_details'] ?? ''),
            htmlspecialchars($applicationData['other_information']['criminal_record'] === 'Yes' ? 1 : 0),
            htmlspecialchars($applicationData['other_information']['criminal_record_details'] ?? '')
        ]);

        // Insert sponsor information (using applicant_id)
        $stmt = $conn->prepare("INSERT INTO sponsor_information 
            (application_id, first_name, last_name, relationship, occupation, house_address, digital_address, city, region, phone_number) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $applicant_id,
            htmlspecialchars($applicationData['sponsor_information']['sponsor_first_name']),
            htmlspecialchars($applicationData['sponsor_information']['sponsor_last_name']),
            htmlspecialchars($applicationData['sponsor_information']['sponsor_relationship']),
            htmlspecialchars($applicationData['sponsor_information']['sponsor_occupation']),
            htmlspecialchars($applicationData['sponsor_information']['sponsor_house_address']),
            htmlspecialchars($applicationData['sponsor_information']['sponsor_digital_address']),
            htmlspecialchars($applicationData['sponsor_information']['sponsor_city']),
            htmlspecialchars($applicationData['sponsor_information']['sponsor_region']),
            htmlspecialchars($applicationData['sponsor_information']['sponsor_phone'])
        ]);

        // Insert work experience (if provided; using applicant_id)
        if (!empty($applicationData['work_experience'])) {
            foreach ($applicationData['work_experience'] as $experience) {
                $stmt = $conn->prepare("INSERT INTO work_experience (application_id, company_name, position, start_date, end_date) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([
                    $applicant_id,
                    htmlspecialchars($experience['company']),
                    htmlspecialchars($experience['role']),
                    htmlspecialchars($experience['duration'])
                ]);
            }
        }

        // Insert legal consent (using applicant_id)
        $stmt = $conn->prepare("INSERT INTO legal_consent (application_id, privacy_policy_accepted, accurate_information_acknowledged) VALUES (?, ?, ?)");
        $stmt->execute([
            $applicant_id,
            $privacy_policy_accepted,
            $accurate_information_acknowledged
        ]);

        // Commit the transaction
        $conn->commit();

        // Set session variable to indicate successful submission
        $_SESSION['application_submitted'] = true;
        $_SESSION['application_number'] = $applicant_id;

        // Clear session application data
        unset($_SESSION['application']);

        // Redirect to confirmation page
        if (!headers_sent()) {
            header('Location: confirmation.php');
            exit();
        } else {
            echo '<script type="text/javascript">window.location.href="confirmation.php";</script>';
            echo '<noscript><meta http-equiv="refresh" content="0;url=confirmation.php" /></noscript>';
            exit();
        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo "Failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTSS - Submit Application</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            padding-top: 70px; /* Height of the fixed header */
            padding-bottom: 70px; /* Height of the fixed footer */
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 70px;
            bottom: 70px;
            left: 0;
            background-color: #FFA500;
            padding-top: 20px;
            overflow-y: auto;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            height: calc(100vh - 140px);
            overflow-y: auto;
        }
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
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    <div class="content mt-5">
        <h2 class="mb-3 text-center">Submit Your Application</h2>
        <p class="text-muted text-center">Please review all the information you provided and submit your application.</p>
        <form action="submit_application.php" method="post">
            <div class="d-flex justify-content-between mt-4">
                <a href="review.php" class="btn btn-secondary">Back to Review</a>
                <button type="submit" class="btn btn-success">Submit Application</button>
            </div>
        </form>
    </div>
    <?php include("../includes/footer.php"); ?>
</body>
</html>