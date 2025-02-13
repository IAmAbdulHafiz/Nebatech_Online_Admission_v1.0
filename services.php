<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Our Services - Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .services-section {
            padding: 100px 0;
        }
        .card {
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-body {
            padding: 2rem;
        }
        .card-title {
            color: #002060;
        }
        .card-text {
            color: #555;
        }
    </style>
</head>
<body>

    <?php include("includes/public_header.php"); ?>

    <div class="container mt-5 services-section">
        <h2 class="text-center" style="color: orange;">Our Services</h2>
        <p class="text-center lead">At Nebatech, we provide a variety of services to cater to your needs. Below are the services we offer:</p>

        <!-- Services List -->
        <div class="row mt-5">
            <!-- Service 1: Mobile & Web Application Development -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-mobile-alt fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Mobile & Web Application Development</h5>
                        <p class="card-text">We create custom mobile apps (Android/iOS) and web applications tailored to meet the needs of businesses and individuals.</p>
                        <a href="mobile-web-development.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Service 2: Website Design & Development -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-laptop-code fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Website Design & Development</h5>
                        <p class="card-text">We design and develop responsive and visually appealing websites, ensuring that they are user-friendly and fully optimized.</p>
                        <a href="website-design.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Service 3: Network Installation & Troubleshooting -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-network-wired fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Network Installation & Troubleshooting</h5>
                        <p class="card-text">Nebatech offers professional network setup, installation, and troubleshooting services to keep your systems running smoothly.</p>
                        <a href="network-services.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Service 4: CCTV Camera Installation -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-camera fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">CCTV Camera Installation</h5>
                        <p class="card-text">We provide security solutions with the installation of CCTV cameras to ensure the safety of homes, businesses, and other premises.</p>
                        <a href="cctv-installation.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Service 5: iPhone & Laptop Repairs -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-tools fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">iPhone & Laptop Repairs</h5>
                        <p class="card-text">Our expert technicians offer repair services for iPhones and laptops, including hardware and software issues.</p>
                        <a href="iphone-laptop-repair.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

</body>
</html>
