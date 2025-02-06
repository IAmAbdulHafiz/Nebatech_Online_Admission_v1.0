<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/edit_serial_pin.php
<?php
include '../config/database.php'; // Include your database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the serial pin details
    $fetchQuery = "SELECT * FROM serial_pins WHERE id = :id";
    $stmt = $conn->prepare($fetchQuery);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $serialPin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $serialNumber = $_POST['serial_number'];
        $pin = $_POST['pin'];

        // Update the serial pin details
        $updateQuery = "UPDATE serial_pins SET serial_number = :serial_number, pin = :pin WHERE id = :id";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bindParam(':serial_number', $serialNumber);
        $stmt->bindParam(':pin', $pin);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('Location: generate_serial_pin.php');
        exit;
    }
} else {
    header('Location: generate_serial_pin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Serial Number and Pin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"> <!-- Include your CSS file -->
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Serial Number and Pin</h2>
        <form method="post">
            <div class="mb-3">
                <label for="serial_number" class="form-label">Serial Number</label>
                <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?php echo $serialPin['serial_number']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="pin" class="form-label">Pin</label>
                <input type="text" class="form-control" id="pin" name="pin" value="<?php echo $serialPin['pin']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script> <!-- Include your JS file -->
</body>
</html>