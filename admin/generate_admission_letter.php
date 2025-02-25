<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/generate_admission_letter.php
require_once('../vendor/autoload.php');
include("../config/database.php");

if (isset($_GET['id'])) {
    $application_id = $_GET['id'];

    // Fetch application details
    $query = "
        SELECT 
            pi.first_name,
            pi.middle_name,
            pi.last_name,
            ps.program_name,
            ads.status
        FROM applications a
        LEFT JOIN personal_information pi ON a.id = pi.application_id
        LEFT JOIN program_selections ps ON a.id = ps.application_id AND ps.choice_number = 1
        LEFT JOIN admission_status ads ON a.id = ads.applicant_id
        WHERE a.id = :application_id
    ";
    $stmt = $conn->prepare($query);
    $stmt->execute([':application_id' => $application_id]);
    $application = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($application) {
        // Generate PDF
        $mpdf = new \Mpdf\Mpdf();
        $html = "
            <h1>Admission Letter</h1>
            <p>Dear {$application['first_name']} {$application['middle_name']} {$application['last_name']},</p>
            <p>We are pleased to inform you that you have been {$application['status']} for the {$application['program_name']} program.</p>
            <p>Congratulations!</p>
        ";
        $mpdf->WriteHTML($html);
        $mpdf->Output("admission_letter_{$application_id}.pdf", 'D');
    } else {
        echo "Application not found.";
    }
} else {
    echo "Invalid request.";
}
?>