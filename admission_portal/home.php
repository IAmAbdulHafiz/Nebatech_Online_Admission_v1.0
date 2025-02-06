    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <icon href="assets/images/favicon.ico">
    <title>NEBATECH-Online Admission</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
                            <img src="assets/images/welcome1.jpg" alt="Welcome to NTSS" class="d-block w-20">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/welcome2.jpg" alt="Learning Environment" class="d-block w-20">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/welcome3.jpg" alt="Our Community" class="d-block w-20">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Payment Information -->
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h2 class="text-center mb-4" style="color: #002060;">Online Admission Form</h2>
                        <p class="text-center">The fee for the form is <b>GH₵100</b>.</p>
                        <p class="text-center">You must purchase the application form online through this platform.</p>
                        <p class="text-center">Click the button below to proceed with the payment.</p>
                        <div class="text-center mt-4">
                            <a href="payment_form.php" class="btn btn-primary w-100" style="background-color: #002060; border: 1px solid #002060;">Buy Form Now</a>
                        </div>
                        <div class="mt-3 text-center">
                            <p>Continue your application or check admission status. <a href="login.php">Login here.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <!-- Include Footer -->
    <?php include("includes/footer.php"); ?>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>