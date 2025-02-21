<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEBATECH - Online Admission</title>
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .carousel-item {
            height: 100%;
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            filter: brightness(90%); /* Dark overlay effect */
            border-radius: 15px; /* Rounded corners */
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .card-body {
            min-height: 400px; /* Maintain consistent height for the right-side card */
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            background: #ff6a00;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            padding: 12px;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #e55c00;
        }

        .alert {
            font-size: 14px;
            text-align: center;
        }

        iframe {
            width: 100%;
            height: 600px;
            border: none;
            margin-top: 20px;
        }
        .container{
            padding-bottom: 50px;
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include("includes/header.php"); ?>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row align-items-center">
            <!-- Left Side: Fading Slideshow -->
            <div class="col-md-6 mb-3 py-4">
                <div id="welcomeCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/welcome1.JPG" alt="Welcome to NTSS" class="d-block w-20">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/welcome2.JPG" alt="Learning Environment" class="d-block w-20">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/welcome3.JPG" alt="Our Community" class="d-block w-20">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admission Info and Payment Form -->
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h2 class="text-center" style="color: #002060;">Online Admission Form</h2>
                        <p class="text-center">Application Fee: <b>GH₵100</b></p>
                        <p class="text-center">Fill the form below to Purchase the application form online</p>
                        <p class="text-center"><b>Note:</b> After completing the payment, you will receive your Serial Number and PIN, which you will use to sign up and complete the application form online.</p>

                        <?php if (!empty($_SESSION['success_message'])) : ?>
                            <div class="alert alert-success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
                        <?php endif; ?>

                        <?php if (!empty($_SESSION['error_message'])) : ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
                        <?php endif; ?>

                        <form method="POST" action="api/hubtel_payment.php">
                            <div class="mb-3">
                                <label><i class="fas fa-user"></i> Full Name:</label>
                                <input type="text" name="customer_name" class="form-control" placeholder="Enter full name" required>
                            </div>
                            <div class="mb-3">
                                <label><i class="fas fa-envelope"></i> Email:</label>
                                <input type="email" name="customer_email" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                <label><i class="fas fa-phone"></i> Phone Number (For Serial & PIN):</label>
                                <input type="text" name="customer_phone" class="form-control" placeholder="Enter phone number" required>
                            </div>
                            <input type="hidden" name="serial_number" id="serial_number">
                            <input type="hidden" name="pin" id="pin">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-money-check-alt"></i> Pay with Hubtel
                                </button>
                            </div>
                        </form> <!-- Closing form tag added -->
                    </div> <!-- Closing div tag added -->
                    <hr>
                    <p class="text-center">Already applied? <a href="login.php">Login to continue</a></p>
                    <p class="text-center">Yet to Start your application? <a href="admission_portal/signup.php">Signup</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Generate Serial Number and PIN
        function generateSerialAndPin() {
            const serialNumber = 'SN' + Math.floor(Math.random() * 1000000);
            const pin = Math.floor(1000 + Math.random() * 9000);
            document.getElementById('serial_number').value = serialNumber;
            document.getElementById('pin').value = pin;
        }

        // Call the function to generate Serial Number and PIN on page load
        window.onload = generateSerialAndPin;
    </script>
    <!-- Include Footer -->
    <?php include("../includes/public_footer.php"); ?>
</body>
</html>
