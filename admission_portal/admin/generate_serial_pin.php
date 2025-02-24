<?php
// filepath: /c:/xampp/htdocs/GitHub/online-admission-system/admin/generate_serial_pin.php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

include("../config/database.php");
include("../includes/header.php");
include("../includes/sidebar.php");

function generateSerialNumber() {
    $year = date('y'); // Get the current year in two digits
    $randomDigits = strtoupper(bin2hex(random_bytes(4))); // Generates 8 random hexadecimal digits
    return 'N' . $year . $randomDigits; // Combine to form the serial number
}

function generatePin() {
    return rand(100000, 999999); // Generates a 6-digit pin
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['generate'])) {
    $serialNumber = generateSerialNumber();
    $pin = generatePin();

    // Save to database
    $insertQuery = "INSERT INTO serial_pins (serial_number, pin) VALUES (:serial_number, :pin)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bindParam(':serial_number', $serialNumber);
    $stmt->bindParam(':pin', $pin);
    $stmt->execute();

    $message = "Serial Number: $serialNumber<br>Pin: $pin";
}

// Handle bulk delete
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bulk_delete'])) {
    $idsToDelete = $_POST['ids'] ?? [];
    if (!empty($idsToDelete)) {
        $placeholders = implode(',', array_fill(0, count($idsToDelete), '?'));
        $deleteQuery = "DELETE FROM serial_pins WHERE id IN ($placeholders)";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->execute($idsToDelete);
        $message = "Selected serial numbers and pins deleted successfully.";
    }
}

// Handle search functionality
$searchTerm = '';
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $fetchQuery = "SELECT * FROM serial_pins WHERE serial_number LIKE :searchTerm OR pin LIKE :searchTerm ORDER BY id DESC";
    $stmt = $conn->prepare($fetchQuery);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
    $stmt->execute();
    $serialPins = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Fetch all serial numbers and pins, ordered by the most recent first
    $fetchQuery = "SELECT * FROM serial_pins ORDER BY id DESC";
    $serialPins = $conn->query($fetchQuery)->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Serial Number and Pin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> <!-- Include your CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            padding-top: 100px;
            padding-bottom: 70px;
            background-color: #f4f6f9;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .content {
            margin-left: 250px;
            overflow-y: auto;
            width: auto;
        }
        .table-action-btn {
            padding: 5px 10px;
            font-size: 14px;
        }
        .table-action-btn i {
            margin-right: 5px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
            margin-left: 250px;
        }
        /* Responsive layout for mobile screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .content {
                margin-left: 250px;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <h2 class="text-center mb-4">Generate Serial Number and Pin</h2>

    <div class="card mb-4">
        <div class="card-body">
            <?php if (isset($message)): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <form method="post" class="text-center">
                <button type="submit" name="generate" class="btn btn-primary">
                    <i class="fas fa-cogs"></i> Generate
                </button>
            </form>
        </div>
    </div>

    <h2 class="mt-5 text-center">All Serial Numbers and Pins</h2>
    <div class="d-flex justify-content-between mb-3">
        <form method="get" class="search-bar">
            <input type="text" name="search" value="<?php echo htmlspecialchars($searchTerm); ?>" class="form-control" placeholder="Search by Serial Number or Pin" />
        </form>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="post">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>ID</th>
                            <th>Serial Number</th>
                            <th>Pin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($serialPins as $serialPin): ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?php echo $serialPin['id']; ?>"></td>
                                <td><?php echo $serialPin['id']; ?></td>
                                <td><?php echo $serialPin['serial_number']; ?></td>
                                <td><?php echo $serialPin['pin']; ?></td>
                                <td>
                                    <a href="delete_serial_pin.php?id=<?php echo $serialPin['id']; ?>" class="btn btn-danger btn-sm table-action-btn" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" name="bulk_delete" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Bulk Delete
                </button>
            </form>
        </div>
    </div>
</div>

<?php include("../includes/footer.php"); ?>

<script src="../assets/js/bootstrap.bundle.min.js"></script> <!-- Include your JS file -->
<script>
    // Select/Deselect all checkboxes
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.getElementsByName('ids[]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
</script>
</body>
</html>