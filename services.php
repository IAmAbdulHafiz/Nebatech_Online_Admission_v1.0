<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - NTSS</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .services-header {
            background-color: #002060;
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        .services-section {
            padding: 40px 0;
        }

        .service-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .service-card img {
            border-radius: 10px 10px 0 0;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php include("includes/public_header.php"); ?>

    <!-- Page Header -->
    <div class="services-header">
        <h1>Our Services</h1>
        <p>Explore the wide range of services we offer to empower individuals and businesses with technology solutions.</p>
    </div>

    <!-- Services Section -->
    <div class="container services-section">
        <div class="row">

            <!-- Service 1 -->
            <div class="col-md-4 mb-4">
                <div class="card service-card">
                    <img src="assets/images/service-web-development.jpg" alt="Web Development">
                    <div class="card-body">
                        <h5 class="card-title">Website Design & Development</h5>
                        <p class="card-text">We create stunning, user-friendly websites tailored to your business needs.</p>
                    </div>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="col-md-4 mb-4">
                <div class="card service-card">
                    <img src="assets/images/service-mobile-app.jpg" alt="Mobile App Development">
                    <div class="card-body">
                        <h5 class="card-title">Mobile App Development</h5>
                        <p class="card-text">Build cross-platform mobile apps that provide seamless user experiences.</p>
                    </div>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="col-md-4 mb-4">
                <div class="card service-card">
                    <img src="assets/images/service-network.jpg" alt="Network Installation">
                    <div class="card-body">
                        <h5 class="card-title">Network Installation</h5>
                        <p class="card-text">Comprehensive network setup and troubleshooting for businesses and homes.</p>
                    </div>
                </div>
            </div>

            <!-- Service 4 -->
            <div class="col-md-4 mb-4">
                <div class="card service-card">
                    <img src="assets/images/service-cctv.jpg" alt="CCTV Installation">
                    <div class="card-body">
                        <h5 class="card-title">CCTV Camera Installation</h5>
                        <p class="card-text">Enhance your security with our professional CCTV camera installation services.</p>
                    </div>
                </div>
            </div>

            <!-- Service 5 -->
            <div class="col-md-4 mb-4">
                <div class="card service-card">
                    <img src="assets/images/service-repair.jpg" alt="Repairs">
                    <div class="card-body">
                        <h5 class="card-title">iPhone & Laptop Repairs</h5>
                        <p class="card-text">Expert repairs for iPhones, laptops, and other devices at affordable prices.</p>
                    </div>
                </div>
            </div>

            <!-- Service 6 -->
            <div class="col-md-4 mb-4">
                <div class="card service-card">
                    <img src="assets/images/service-training.jpg" alt="Training">
                    <div class="card-body">
                        <h5 class="card-title">Competency-Based Training</h5>
                        <p class="card-text">Empowering individuals with hands-on training in web development, design, and more.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include("footer.php"); ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
