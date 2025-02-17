<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nebatech Software Solution Ltd is a leading provider of software development and IT consultancy services. We are committed to delivering innovative solutions that drive business growth and digital transformation.">
    <meta name="keywords" content="Software Development, IT Consultancy, Training, Capacity Building, Digital Transformation, Technology Solutions">
    <meta name="author" content="Nebatech Software Solution Ltd">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="css/text" href="assets/css/stylesheet.css">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
</head>
<body>

    <?php include("includes/public_header.php"); ?>

    <div class="content mt-5">
        <!-- Hero Section -->
        <div class="hero-section text-center">
            <div class="overlay"></div>
            <div class="content">
                <h1 class="hero-text" style="font-size: 3em; color: orange;">
                    <span id="typed-text"></span>
                </h1>
                <p>Empowering businesses and individuals with cutting-edge technology solutions.</p>
                <a href="request-quote.php" class="quote-btn">Request a Quote</a>
            </div>
        </div>
        <!-- Page Background -->
        <div class="page-background">
            <div class="overlay"></div>
            <div class="content">
                <div class="container mt-5">

                <!-- Why Choose Nebatech Section -->
                <div class="container text-center mt-5">
                    <h2 class="section-title" style="color: orange;">Why Choose Nebatech?</h2>
                    <p class="lead text-start" style="color: #fff;">
                        Nebatech Software Solution Ltd is a leading provider of software development and IT consultancy services. 
                        We are committed to delivering innovative solutions that drive business growth and digital transformation. 
                        Here are some reasons to choose Nebatech:
                    </p>

                    <!-- New Flexbox Layout Without Cards -->
                    <div class="row mt-5 justify-content-center why-choose-nebatech" style="color: #fff;">
                        <div class="col-md-3 d-flex align-items-center feature-item ">
                            <div class="icon-box">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="text-left">
                                <h5>Expertise</h5>
                                <p>Highly skilled team with expertise in diverse technologies.</p>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex align-items-center feature-item">
                            <div class="icon-box">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="text-left">
                                <h5>Reliability</h5>
                                <p>Trusted partner for reliable and robust solutions.</p>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex align-items-center feature-item">
                            <div class="icon-box">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text-left">
                                <h5>Customer-Centric</h5>
                                <p>Dedicated to delivering exceptional customer service.</p>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex align-items-center feature-item">
                            <div class="icon-box">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div class="text-left">
                                <h5>Innovation</h5>
                                <p>Constantly innovating to stay ahead in technology trends.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigate to other pages -->
                <div class="container nav-card mt-5">
                    <h2 class="section-title text-center" style="color: orange; font-weight: bold;">Explore Our Solutions</h2>
                    <div class="row mt-4">
                        <!-- Programmes Card -->
                        <div class="col-md-6 mb-4">
                            <a href="programmes.php" class="text-decoration-none">
                                <div class="card shadow-sm p-3 d-flex align-items-center justify-content-between flex-row hover-effect">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-wrapper">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="card-title font-weight-bold">Our Programmes</h5>
                                            <p class="card-text">Join our learners and advance your skills</p>
                                        </div>
                                    </div>
                                    <div class="arrow-wrapper">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Services Card -->
                        <div class="col-md-6 mb-4">
                            <a href="services.php" class="text-decoration-none">
                                <div class="card shadow-sm p-3 d-flex align-items-center justify-content-between flex-row hover-effect">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-wrapper">
                                            <i class="fas fa-cogs"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="card-title font-weight-bold">Our Services</h5>
                                            <p class="card-text">Explore the solutions we offer</p>
                                        </div>
                                    </div>
                                    <div class="arrow-wrapper">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Projects Card -->
                        <div class="col-md-6 mb-4">
                            <a href="projects.php" class="text-decoration-none">
                                <div class="card shadow-sm p-3 d-flex align-items-center justify-content-between flex-row hover-effect">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-wrapper">
                                            <i class="fas fa-project-diagram"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="card-title font-weight-bold">Our Projects</h5>
                                            <p class="card-text">Discover our successful projects</p>
                                        </div>
                                    </div>
                                    <div class="arrow-wrapper">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Contact Us Card -->
                        <div class="col-md-6 mb-4">
                            <a href="contact.php" class="text-decoration-none">
                                <div class="card shadow-sm p-3 d-flex align-items-center justify-content-between flex-row hover-effect">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-wrapper">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="card-title font-weight-bold">Get in Touch</h5>
                                            <p class="card-text">Contact us for more details</p>
                                        </div>
                                    </div>
                                    <div class="arrow-wrapper">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed = new Typed("#typed-text", {
            strings: [
                "Nebatech Software Solution Ltd",
                "Mobile and Web Application Development",
                "e-Commernce Development",
                "POS System Development",
                "Website Design and Development",
                "Networking Installation & Troubleshooting",
                "CCTV Camera Installation",
                "iPhone and Laptop Repairs",
                "Competency-Based IT Training Programs"
            ],
            typeSpeed: 100,
            backSpeed: 25,
            startDelay: 500,
            backDelay: 1500,
            loop: true,
            showCursor: true
        });
    </script>
<?php include("includes/public_footer.php"); ?>
</body>
</html>
