<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEBATECH - Online Admission</title>
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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

        /* Adjust page content to fit with fixed header and footer */
        body {
            padding-top: 70px; /* Adjust to the height of the header */
            padding-bottom: 60px; /* Adjust to the height of the footer */
        }

        .card-body {
            min-height: 400px; /* Maintain consistent height for the right-side card */
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

            <!-- Admission Info -->
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h2 class="text-center" style="color: #002060;">Online Admission Form</h2>
                        <p class="text-center">Application Fee: <b>GH₵100</b></p>
                        <p class="text-center">Purchase the application form online through this platform.</p>
                    </div>
                    <div class="text-center mt-3">
                        <a href="payment_form.php" class="btn btn-primary" style="background-color: #002060; border: 1px solid #002060; width: 200px;">Buy Form Now</a>
                    </div>
                    <hr>
                    <p class="text-center">Already applied? <a href="login.php">Login to continue</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Include Footer -->
    <?php include("includes/footer.php"); ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
