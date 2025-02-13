<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <style>
        body {
            background-color: #002060; /* Set primary color as background */
        }
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
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer; /* Make the card appear clickable */
            transition: transform 0.3s ease-in-out;
            height: 100%;
        }
        .card:hover {
            transform: scale(1.05);
        }

        .btn-lgs{
            color: orange;
        }
        .page-background {
            background-image: url('assets/images/welcome2.jpg'); /* Keeping your image as background */
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
            background: rgba(0, 32, 96, 0.85); /* Changed to a semi-transparent primary color overlay */
        }

        .page-background .content {
            position: relative;
            z-index: 0;
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
                        <h2 style="color: orange;">Why Choose Nebatech?</h2>
                        <p class="lead text-start" style="color: white;">
                            Nebatech Software Solution Ltd is a leading provider of software development and IT consultancy services. We are committed to delivering innovative solutions that drive business growth and digital transformation. Here are some reasons to choose Nebatech:
                        </p>
                    <div class="row mt-5">
                        <div class="col-md-3 mb-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-award fa-3x mb-3" style="color: #002060"></i>
                                    <h5 class="card-title">Expertise</h5>
                                    <p class="card-text">Highly skilled team with expertise in diverse technologies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-handshake fa-3x mb-3" style="color: #002060"></i>
                                    <h5 class="card-title">Reliability</h5>
                                    <p class="card-text">Trusted partner for reliable and robust solutions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-users fa-3x mb-3" style="color: #002060"></i>
                                    <h5 class="card-title">Customer-Centric</h5>
                                    <p class="card-text">Dedicated to delivering exceptional customer service.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-cogs fa-3x mb-3" style="color: #002060"></i>
                                    <h5 class="card-title">Innovation</h5>
                                    <p class="card-text">Constantly innovating to stay ahead in technology trends.</p><p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container mt-5 text-center card-section">
                    <h2 style="color: orange;">Explore Our Solutions</h2>
                    <div class="row mt-5">
                        <!-- Programmes Card -->
                        <div class="col-md-3 mb-4">
                            <a href="programmes.php" class="card-link">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <i class="fas fa-chalkboard-teacher fa-3x mb-3" style="color: #002060"></i>
                                        <h5 class="card-title">Our Programmes</h5>
                                        <p class="card-text">Join our learners and advance your skills</p>
                                        <button class="btn btn-lgs ">
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Services Card -->
                        <div class="col-md-3 mb-4">
                            <a href="services.php" class="card-link">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <i class="fas fa-cogs fa-3x mb-3" style="color: #002060"></i>
                                        <h5 class="card-title">Our Services</h5>
                                        <p class="card-text">Explore the solutions we offer</p>
                                        <button class="btn btn-lgs">
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Projects Card -->
                        <div class="col-md-3 mb-4">
                            <a href="projects.php" class="card-link">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <i class="fas fa-project-diagram fa-3x mb-3" style="color: #002060"></i>
                                        <h5 class="card-title">Our Projects</h5>
                                        <p class="card-text">Discover our successful projects</p>
                                        <button class="btn btn-lgs">
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Contact Us Card -->
                        <div class="col-md-3 mb-4">
                            <a href="contact.php" class="card-link">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <i class="fas fa-envelope fa-3x mb-3" style="color: #002060"></i>
                                        <h5 class="card-title">Get in Touch</h5>
                                        <p class="card-text">Contact us for more details</p>
                                        <button class="btn btn-lgs">
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
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
