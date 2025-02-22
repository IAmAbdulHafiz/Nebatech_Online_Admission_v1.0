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
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <style>
        .hero-section {
            background-image: url('assets/images/bg1.jpg'); /* Keeping your image as background */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 100px 0;
            position: relative;
        }

        .hero-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 32, 96, 0.4); /* Changed to a semi-transparent primary color overlay */
        }

        .hero-section .content {
            position: relative;
            z-index: 1;
        }

        .card-section {
            padding: 100px 0;
        }
        .card-link {
            text-decoration: none;
            color: inherit; /* Inherit the color of the text from the card */
        }

        .card {
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer; /* Make the card appear clickable */
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 15px;
            height: 100%;
            color: #002060;
        }
        .card:hover {
            transform: scale(1.05);
        }

        .nav-card{

        }

        .btn-lgs{
            color: orange;
        }
        .page-background {
            background-image: url('assets/images/welcome2.JPG'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
            
        }

        .page-background .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 32, 96, 0.85);
        }

        .page-background .content {
            position: relative;
            z-index: 0;
        }
        .body{
            background-color: #F5F5F5;
        }
        .quote-btn {
            background: linear-gradient(135deg, #ff9800, #ff5722); /* Gradient Effect */
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none; /* Ensure no underline */
            transition: all 0.3s ease-in-out;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .quote-btn:hover {
            background: linear-gradient(135deg, #ff5722, #ff9800); /* Reverse Gradient */
            color: #002060; /* Dark blue text */
            transform: scale(1.05); /* Slight Zoom Effect */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            text-decoration: none; /* Ensure no underline on hover */
        }

        .quote-btn:active {
            transform: scale(0.98);
            box-shadow: none;
        }

        .btn-primary {
            background-color: #002060;
            border-color: #002060;
            color: white;
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: orange;
            border-color: orange;
            color: white;
        }

        .hover-effect:hover {
            transform: scale(1.03);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .text-decoration-none {
            text-decoration: none;
            color: inherit;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #FFA500;
        }

        /* Icon Wrapper */
        .icon-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 70px;
            height: 70px;
            background-color: #002060;
            color: white;
            font-size: 2rem;
            border-radius: 50%;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            cursor: pointer;
        }

        /* Icon Hover Effect */
        .icon-wrapper:hover {
            transform: scale(1.1);
            box-shadow: 0px 4px 10px rgba(0, 32, 96, 0.4);
            background-color: #FFA500; /* Gold color on hover */
            color: #002060;
        }

        .ml-3 {
            margin-left: 15px;
        }

        /* Arrow Styling */
        .arrow-wrapper {
            font-size: 1.5rem;
            color: #002060;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .hover-effect:hover .arrow-wrapper {
            transform: translateX(5px);
            color: #FFA500; /* Gold color on hover */
        }

        .why-choose-nebatech {
            background-color:rgba(255, 166, 0, 0.71);
            color: white;
            padding: 60px 0;
            position: relative;
            border-radius: 15px;
        }

        /* Flexbox Layout */
        .feature-item {
            display: flex;
            gap: 15px;
            text-align: left;
            margin-bottom: 20px;
        }

        /* Icon Styling */
        .icon-box {
            width: 60px;
            height: 60px;
            min-width: 60px;  /* Ensures it doesn’t stretch */
            min-height: 60px; /* Prevents distortion */
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #002060;
            color: white;
            border-radius: 50%;  /* Ensures perfect circle */
            font-size: 1.8rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }


        .icon-box:hover {
            transform: scale(1.1);
            box-shadow: 0px 4px 10px rgba(0, 32, 96, 0.4);
            background-color: #FFD700; /* Gold on hover */
            color: #002060;
        }

        .text-left h5 {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .text-left p {
            margin: 0;
            font-size: 1rem;
        }

        /* Responsive styling for hero section */
        @media (max-width: 768px) {
            .hero-section {
                padding: 50px 0;
            }
            .hero-section .content h1 {
                font-size: 2em;
            }
            .hero-section .content p {
                font-size: 1em;
            }
            .btn-lgs {
                font-size: 0.9em;
                padding: 10px 20px;
            }
        }
    </style>
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
                    <h2 class="section-title">Why Choose Nebatech?</h2>
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
