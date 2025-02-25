<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/profile.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("../config/database.php");

$user_id = $_SESSION['user_id'];

// Fetch user profile
$query = "SELECT * FROM users WHERE id = :user_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Handle profile picture upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $target_dir = "../uploads/";
        $profile_picture = $target_dir . basename($_FILES['profile_picture']['name']);
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile_picture);
    } else {
        $profile_picture = $profile['profile_picture'];
    }

    // Update user profile
    $update_query = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number, profile_picture = :profile_picture WHERE id = :user_id";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bindParam(':first_name', $first_name);
    $update_stmt->bindParam(':last_name', $last_name);
    $update_stmt->bindParam(':email', $email);
    $update_stmt->bindParam(':phone_number', $phone_number);
    $update_stmt->bindParam(':profile_picture', $profile_picture);
    $update_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $update_stmt->execute();

    // Update session variables
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['profile_picture'] = $profile_picture;

    header("Location: profile.php");
    exit();
}
?>
<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        .profile-img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-img-container img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .profile-img-container img:hover {
            transform: scale(1.05);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .alert {
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2 class="text-center mb-4">User Profile</h2>

        <div class="card">
            <div class="card-body">
                <?php if (isset($message)): ?>
                    <div class="alert alert-success">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="profile-img-container">
                        <?php if ($profile['profile_picture']): ?>
                            <img src="<?php echo htmlspecialchars($profile['profile_picture']); ?>" alt="Profile Picture">
                        <?php else: ?>
                            <img src="../assets/images/default-profile.jpg" alt="Default Profile Picture">
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo htmlspecialchars($profile['first_name']); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo htmlspecialchars($profile['last_name']); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($profile['email']); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?php echo htmlspecialchars($profile['phone_number']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile_picture" class="form-label">Profile Picture</label>
                        <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
    <?php include("../includes/footer.php"); ?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>