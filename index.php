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
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #002060;
            --secondary-color: #FFA500;
            --text-light: #ffffff;
            --text-dark: #333333;
            --transition: all 0.3s ease-in-out;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #F5F5F5;
        }

        .hero-section {
            min-height: 80vh;
            background-image: linear-gradient(rgba(0, 32, 96, 0.8), rgba(0, 32, 96, 0.8)), url('assets/images/bg1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 7rem 0;
        }

        .hero-text {
            font-size: clamp(2rem, 5vw, 3.5rem);
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            padding: 2rem;
            transition: var(--transition);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-card {
            background: white;
            border-radius: 1rem;
            transition: var(--transition);
            overflow: hidden;
            border: none;
        }

        .nav-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .icon-wrapper {
            width: 60px;
            height: 60px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: var(--transition);
        }

        .nav-card:hover .icon-wrapper {
            background: var(--secondary-color);
        }

        .quote-btn {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 2rem;
            border-radius: 2rem;
            text-decoration: none;
            transition: var(--transition);
            border: none;
            font-weight: 600;
        }

        .quote-btn:hover {
            background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
            transform: scale(1.05);
            color: white;
        }

        .why-choose-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 2rem;
            padding: 4rem 2rem;
            margin: 4rem 4rem;
            text-align: center;
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 60vh;
                padding: 10rem 0;
            }
            .why-choose-section{
                margin: 3rem 1rem;
            }
            .feature-card {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header will be included here -->
    <?php include 'includes/public_header.php'; ?>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <h1 class="hero-text" id="typed-text"></h1>
                <p class="text-light mb-4 fs-5">Empowering businesses and individuals with cutting-edge technology solutions.</p>
                <a href="request-quote.php" class="quote-btn" data-aos="fade-up">Request a Quote</a>
            </div>
        </section>

        <!-- Why Choose Section -->
        <section class="why-choose-section" data-aos="fade-up">
            <h2 class="text-center mb-5">Why Choose Nebatech?</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card h-100">
                        <i class="fas fa-award fa-2x mb-3 text-warning"></i>
                        <h5>Expertise</h5>
                        <p class="mb-0">Highly skilled team with expertise in diverse technologies.</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card h-100">
                        <i class="fas fa-handshake fa-2x mb-3 text-warning"></i>
                        <h5>Reliability</h5>
                        <p class="mb-0">Trusted partner for reliable and robust solutions.</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card h-100">
                        <i class="fas fa-users fa-2x mb-3 text-warning"></i>
                        <h5>Customer-Centric</h5>
                        <p class="mb-0">Dedicated to delivering exceptional customer service.</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card h-100">
                        <i class="fas fa-cogs fa-2x mb-3 text-warning"></i>
                        <h5>Innovation</h5>
                        <p class="mb-0">Constantly innovating to stay ahead in technology trends.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Navigation Cards -->
        <section class="container mb-5">
            <h2 class="text-center mb-5" style="color: var(--primary-color);">Explore Our Solutions</h2>
            <div class="row g-4">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="programmes.php" class="text-decoration-none">
                        <div class="nav-card p-4 d-flex align-items-center">
                            <div class="icon-wrapper me-3">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div>
                                <h5 class="mb-1" style="color: var(--primary-color);">Our Programmes</h5>
                                <p class="mb-0 text-muted">Join our learners and advance your skills</p>
                            </div>
                            <i class="fas fa-arrow-right ms-auto" style="color: var(--secondary-color);"></i>
                        </div>
                    </a>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <a href="services.php" class="text-decoration-none">
                        <div class="nav-card p-4 d-flex align-items-center">
                            <div class="icon-wrapper me-3">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div>
                                <h5 class="mb-1" style="color: var (--primary-color);">Our Services</h5>
                                <p class="mb-0 text-muted">Explore the solutions we offer</p>
                            </div>
                            <i class="fas fa-arrow-right ms-auto" style="color: var(--secondary-color);"></i>
                        </div>
                    </a>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <a href="projects.php" class="text-decoration-none">
                        <div class="nav-card p-4 d-flex align-items-center">
                            <div class="icon-wrapper me-3">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <div>
                                <h5 class="mb-1" style="color: var(--primary-color);">Our Projects</h5>
                                <p class="mb-0 text-muted">Discover our successful projects</p>
                            </div>
                            <i class="fas fa-arrow-right ms-auto" style="color: var(--secondary-color);"></i>
                        </div>
                    </a>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <a href="contact.php" class="text-decoration-none">
                        <div class="nav-card p-4 d-flex align-items-center">
                            <div class="icon-wrapper me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5 class="mb-1" style="color: var(--primary-color);">Get in Touch</h5>
                                <p class="mb-0 text-muted">Contact us for more details</p>
                            </div>
                            <i class="fas fa-arrow-right ms-auto" style="color: var(--secondary-color);"></i>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Initialize Typed.js
        new Typed("#typed-text", {
            strings: [
                "Nebatech Software Solution Ltd",
                "Mobile and Web Application Development",
                "e-Commerce Development",
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
    <!-- Footer will be included here -->
    <?php include 'includes/public_footer.php'; ?>
</body>
</html>