<?php
include("../config/database.php");

// Fetch filtered applications
$query = "SELECT * FROM applications WHERE 1=1";
$params = [];

if (!empty($_POST['full_name'])) {
    $query .= " AND full_name LIKE :full_name";
    $params[':full_name'] = '%' . $_POST['full_name'] . '%';
}

if (!empty($_POST['email'])) {
    $query .= " AND email LIKE :email";
    $params[':email'] = '%' . $_POST['email'] . '%';
}

if (!empty($_POST['status'])) {
    $query .= " AND status = :status";
    $params[':status'] = $_POST['status'];
}

$stmt = $conn->prepare($query);
$stmt->execute($params);
$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['export_csv'])) {
    // Export as CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="applications.csv"');

    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'Full Name', 'Email', 'Program', 'Status', 'Date'));

    foreach ($applications as $app) {
        fputcsv($output, $app);
    }

    fclose($output);
    exit();
}

if (isset($_POST['export_pdf'])) {
    // Export as PDF
    require_once('../libs/fpdf/fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(190, 10, 'Applications Report', 1, 1, 'C');
    $pdf->Ln();

    foreach ($applications as $app) {
        $pdf->Cell(40, 10, $app['id'], 1);
        $pdf->Cell(50, 10, $app['full_name'], 1);
        $pdf->Cell(50, 10, $app['email'], 1);
        $pdf->Cell(50, 10, $app['program'], 1);
        $pdf->Ln();
    }

    $pdf->Output('D', 'applications.pdf');
    exit();
}
?>
