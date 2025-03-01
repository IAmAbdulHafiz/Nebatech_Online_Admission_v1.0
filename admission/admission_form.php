<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Apply for admission to Nebatech Training & Solutions School (NTSS). Purchase the application form online and receive your Serial Number and PIN via SMS and Email.">
    <meta name="keywords" content="NTSS, Nebatech Training & Solutions School, Nebatech School, NTSS Admission, NTSS Application, NTSS Online Admission, NTSS Admission Form, NTSS Application Form, NTSS Online Admission Form, NTSS Admission Portal, NTSS Application Portal, NTSS Online Admission Portal">
    <title>NEBATECH - Online Admission Form</title>
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Your existing CSS styles */
        .carousel-item { 
            height: 100%; 
        }
        .carousel-item img { 
            object-fit: cover; 
            height: 100vh; 
            width: 100%; 
            filter: brightness(90%); 
            border-radius: 0.5rem; 
        }
        .carousel-caption { 
            position: absolute; 
            top: 50%; left: 50%; 
            transform: translate(-50%, -50%); 
            color: #fff; 
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); 
        }
        .card{
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }
        .card-body { 
            min-height: 400px;
            padding: 1rem;
            width: 100%; 
            border-radius: 0.5rem;
        }
        .form-control { 
            border-radius: 8px;
            padding: 1rem; 
        }
        .btn-primary { 
            background: #002060; 
            border: none; 
            border-radius: 8px; 
            font-size: 16px; 
            padding: 12px; 
            transition: 0.3s; 
            align: center;
        }
        .btn-primary:hover { 
            background: #FFA500; 
        }
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .alert { 
            font-size: 14px; 
            text-align: center; 
        }
        .admission_form { 
            padding-top: 4rem; 
            padding-bottom: 50px; 
        }
        .accommodation-notice { 
            font-size: 16px;
            padding-top: 7rem; 
            padding-bottom: 1rem; 
        }
        @media (max-width: 768px) {
            .carousel-item img {
                height: 60vh; 
            }
            .img{
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include("includes/header_potal_login.php"); ?>

    <!-- Accommodation Notice Section -->
    <div class="container accommodation-notice my-4">
        <div class="alert alert-info text-center">
            <strong>Important Notice:</strong> Please note that Nebatech is solely a training hub and does not provide accommodation or boarding facilities for learners coming from far away. We kindly advise that you make your own arrangements for lodging.
        </div>
    </div>

    <!-- Main Content -->
    <div class="container admission_form mt-4">
        <div class="row align-items-center">
            <!-- Left Side: Fading Slideshow -->
            <div class="col-md-6 mb-3 py-4">
                <div id="welcomeCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../assets/images/welcome1.JPG" alt="Welcome to NTSS" class="d-block w-20">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/images/welcome2.JPG" alt="Learning Environment" class="d-block w-20">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/images/welcome3.JPG" alt="Our Community" class="d-block w-20">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admission Info and Payment Form -->
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h2 class="text-center" style="color: #002060;">NTSS Admission Form</h2>
                        <p class="text-center">Application Fee: <b>GH₵100</b></p>
                        <p class="text-center">Fill the form below to purchase the application form online</p>
                        <p class="text-center"><b>Note:</b> After payment, you will receive your Serial Number and PIN via SMS and Email.</p>
                        
                        <?php if (!empty($_SESSION['success_message'])) : ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($_SESSION['error_message'])) : ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="api/hubtel_payment.php">
                            <div class="mb-4">
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
                            <div class="button-container mb-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-money-check-alt"></i> Pay with Hubtel
                                </button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <p class="text-center">Already applied? <a href="login.php">Login to continue</a></p>
                    <p class="text-center">Yet to start your application? <a href="signup.php">Signup</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Include Footer -->
    <?php include("../includes/footer.php"); ?>
</body>
</html>