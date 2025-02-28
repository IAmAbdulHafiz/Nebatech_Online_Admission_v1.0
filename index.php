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
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <!-- Header will be included here -->
    <?php include 'includes/public_header.php'; ?>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <h1 class="hero-text" data-aos="fade-up" id="typed-text"></h1>
                <p class="text-light mb-4 fs-5">Empowering businesses and individuals with cutting-edge technology solutions.</p>
                <br><br>
                <a href="public/request-quote.php" class="quote-btn" data-aos="fade-up">Request a Quote</a>
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
                    <a href="public/programmes.php" class="text-decoration-none">
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
                    <a href="public/services.php" class="text-decoration-none">
                        <div class="nav-card p-4 d-flex align-items-center">
                            <div class="icon-wrapper me-3">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div>
                                <h5 class="mb-1" style="color: var(--primary-color);">Our Services</h5>
                                <p class="mb-0 text-muted">Explore the solutions we offer</p>
                            </div>
                            <i class="fas fa-arrow-right ms-auto" style="color: var(--secondary-color);"></i>
                        </div>
                    </a>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <a href="public/projects.php" class="text-decoration-none">
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
                    <a href="public/contact.php" class="text-decoration-none">
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
    <?php include 'includes/footer.php'; ?>
</body>
</html>