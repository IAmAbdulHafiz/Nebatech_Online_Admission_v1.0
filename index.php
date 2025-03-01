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
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- AOS Animation Library -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
  /* Always show the carousel navigation controls */
  .carousel-control-prev,
  .carousel-control-next {
    position: absolute;
    bottom: 10px; /* Adjust this value to set the vertical position */
    opacity: 1 !important;
    display: block !important;
    width: auto;
  }
  /* Position the buttons at the left and right edges */
  .carousel-control-prev {
    left: -30px;  /* Adjust this value for horizontal spacing */
  }
  .carousel-control-next {
    right: -30px; /* Adjust this value for horizontal spacing */
  }
  /* Customize the control icons (adjust size & color as needed) */
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    font-size: 2rem;
    color: #002060;
  }
  /* Hide the default background image icons */
  .carousel-control-prev-icon {
    background-image: none;
  }
  .carousel-control-next-icon {
    background-image: none;
  }
  @media screen and (max-width: 768px) {
    /* Hide the desktop carousel navigation controls */
    .d-none.d-md-block {
      display: none !important;
    }
    /* Show the mobile carousel navigation controls */
    .d-block.d-md-none {
      display: block !important;
    }
    .carousel-control-prev{
        left: -5;
    }
    .carousel-control-next{
        right: -5;
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

    <!-- Desktop Testimonials Carousel (3 per slide) -->
    <section class="testimonials-section py-5 bg-light d-none d-md-block" data-aos="fade-up">
        <div class="container">
        <h2 class="text-center mb-5" style="color: var(--primary-color);">Testimonials</h2>
        <div id="testimonialCarouselDesktop" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <!-- Slide 1: Testimonials 1-3 -->
            <div class="carousel-item active">
                <div class="row">
                <!-- Testimonial 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <!-- Star Rating -->
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Nebatech's innovative approach has revolutionized our learning experience. Their methods feel personalized and genuinely impactful."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Alhaj Dr. Tanko Mohammed</h6>
                        <small class="text-muted d-block">
                        Managing Director - Keen International Academy
                        </small>
                        <small class="text-muted d-block">
                        <!-- Ghana Flag -->
                        <img src="../../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                        </small>
                        <small class="text-muted">January 15, 2023</small>
                    </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Their commitment to excellence has been a game-changer for our construction projects – we now work with renewed passion."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Hamdu</h6>
                        <small class="text-muted d-block">
                        CEO at DM Sky Construction
                        </small>
                        <small class="text-muted d-block">
                        <!-- Ghana Flag -->
                        <img src="../../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                        </small>
                        <small class="text-muted">April 10, 2023</small>
                    </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Professional and reliable – they helped us streamline our operations in ways that truly make a difference."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Idris Issah Galadima</h6>
                        <small class="text-muted d-block">
                        Founder & CEO - EastEnd Liquidation
                        </small>
                        <small class="text-muted d-block">
                        <!-- USA Flag -->
                        <img src="../../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">USA
                        </small>
                        <small class="text-muted">May 05, 2023</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Slide 2: Testimonials 4-6 -->
            <div class="carousel-item">
                <div class="row">
                <!-- Testimonial 4 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "The creative solutions provided have enhanced our brand image significantly. Their service feels personal and innovative."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Gladys Utesy</h6>
                        <small class="text-muted d-block">
                        CEO - Nag Glitterglaze
                        </small>
                        <small class="text-muted d-block">
                        <!-- USA Flag -->
                        <img src="../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">USA
                        </small>
                        <small class="text-muted">July 20, 2023</small>
                    </div>
                    </div>
                </div>
                <!-- Testimonial 5 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Their expert services have given our business a competitive edge. We feel supported every step of the way."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Mitchell Kowalski</h6>
                        <small class="text-muted d-block">
                        Owner - Big K's Lawn Care
                        </small>
                        <small class="text-muted d-block">
                        <!-- USA Flag -->
                        <img src="../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">USA
                        </small>
                        <small class="text-muted">September 18, 2023</small>
                    </div>
                    </div>
                </div>
                <!-- Testimonial 6 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Outstanding service and excellent support at every turn. We truly feel they care about our success."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Alhaji Issah Yakubu</h6>
                        <small class="text-muted d-block">
                        CEO - Northern Light International
                        </small>
                        <small class="text-muted d-block">
                        <!-- Ghana Flag -->
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                        </small>
                        <small class="text-muted">November 25, 2023</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Slide 3: Testimonials 7-9 -->
            <div class="carousel-item">
                <div class="row">
                <!-- Testimonial 7 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Their dedication to quality has transformed our educational outreach, making every project feel unique and tailored."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Florence Pul</h6>
                        <small class="text-muted d-block">
                        Owner at Etoile Royale Education Center
                        </small>
                        <small class="text-muted d-block">
                        <!-- Ghana Flag -->
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                        </small>
                        <small class="text-muted">February 15, 2024</small>
                    </div>
                    </div>
                </div>
                <!-- Testimonial 8 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Efficiency and reliability are at the heart of their service – they consistently deliver beyond expectations."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Rafic Fuseini</h6>
                        <small class="text-muted d-block">
                        CEO - Global Cold Store
                        </small>
                        <small class="text-muted d-block">
                        <!-- Ghana Flag -->
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                        </small>
                        <small class="text-muted">April 10, 2024</small>
                    </div>
                    </div>
                </div>
                <!-- Testimonial 9 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Their innovative solutions have greatly improved our lab operations, making work smoother and more enjoyable."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Carolyn Puobebe</h6>
                        <small class="text-muted d-block">
                        Founder & Managing Director - NG Medicare Laboratory
                        </small>
                        <small class="text-muted d-block">
                        <!-- Ghana Flag -->
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                        </small>
                        <small class="text-muted">May 05, 2024</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Slide 4: Testimonials 10-12 -->
            <div class="carousel-item">
                <div class="row">
                <!-- Testimonial 10 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Nebatech's expertise has empowered our educational vision and given us a new perspective on growth."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Hajia Zulfawu Abdulai</h6>
                        <small class="text-muted d-block">
                        CEO - Braifi International School
                        </small>
                        <small class="text-muted d-block">
                        <!-- Ghana Flag -->
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                        </small>
                        <small class="text-muted">July 20, 2024</small>
                    </div>
                    </div>
                </div>
                <!-- Testimonial 11 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Their commitment to customer satisfaction is truly unmatched, making every interaction feel personal and thoughtful."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Hajia Fadila Abdulai</h6>
                        <small class="text-muted d-block">
                        Founder & CEO - Daimila World
                        </small>
                        <small class="text-muted d-block">
                        <!-- Ghana Flag -->
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                        </small>
                        <small class="text-muted">August 10, 2024</small>
                    </div>
                    </div>
                </div>
                <!-- Testimonial 12 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Incredible service and a genuine dedication to quality – they make every project feel uniquely cared for."
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Hajia Fati Sumani</h6>
                        <small class="text-muted d-block">
                        CEO - Kabita Memorial School Complex
                        </small>
                        <small class="text-muted d-block">
                        <!-- Tamale (Ghana) Flag -->
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                        </small>
                        <small class="text-muted">September 05, 2024</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Slide 5: Testimonial 13 -->
            <div class="carousel-item">
                <div class="row justify-content-center">
                <!-- Testimonial 13 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm mx-auto">
                    <div class="card-body">
                        <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        </div>
                        <p class="card-text fst-italic">
                        "Their visionary approach has truly propelled our business forward, inspiring us to achieve new heights."
                        </p>
                    </div>
                    <div class="card-footer bg-white text-center">
                        <h6 class="mb-0" style="color: #002060;">Waltrude Kurugu</h6>
                        <small class="text-muted d-block">
                        Founder & CEO - Truandrew Natural Market
                        </small>
                        <small class="text-muted d-block">
                        <!-- Tamale (Ghana) Flag -->
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                        </small>
                        <small class="text-muted">January 10, 2025</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Desktop Carousel Controls with Font Awesome Icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarouselDesktop" data-bs-slide="prev">
            <span class="carousel-control-prev-icon">
                <i class="fa-solid fa-chevron-left"></i>
            </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarouselDesktop" data-bs-slide="next">
            <span class="carousel-control-next-icon">
                <i class="fa-solid fa-chevron-right"></i>
            </span>
            </button>
        </div>
        </div>
    </section>

    <!-- Mobile Testimonials Carousel (1 per slide) -->
    <section class="testimonials-section py-5 bg-light d-block d-md-none" data-aos="fade-up">
        <div class="container">
        <h2 class="text-center mb-5" style="color: var(--primary-color);">Testimonials</h2>
        <div id="testimonialCarouselMobile" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <!-- Testimonial 1 -->
            <div class="carousel-item active">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <!-- Star Rating -->
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Nebatech's innovative approach has truly revolutionized our learning experience. Their methods feel personalized and genuinely impactful."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Alhaj Dr. Tanko Mohammed</h6>
                    <small class="text-muted d-block">
                    Managing Director - Keen International Academy
                    </small>
                    <small class="text-muted d-block">
                    <!-- Ghana Flag -->
                    <img src="../../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                    </small>
                    <small class="text-muted">January 15, 2023</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Their commitment to excellence has been nothing short of transformative for our construction projects – we now work with renewed passion."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Hamdu</h6>
                    <small class="text-muted d-block">
                    CEO at DM Sky Construction
                    </small>
                    <small class="text-muted d-block">
                    <!-- Ghana Flag -->
                    <img src="../../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                    </small>
                    <small class="text-muted">April 10, 2023</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Professional and reliable – Nebatech has helped us streamline our operations in ways that truly make a difference."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Idris Issah Galadima</h6>
                    <small class="text-muted d-block">
                    Founder & CEO - EastEnd Liquidation
                    </small>
                    <small class="text-muted d-block">
                    <!-- USA Flag -->
                    <img src="../../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">USA
                    </small>
                    <small class="text-muted">May 05, 2023</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 4 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "The creative solutions provided have enhanced our brand image significantly. Their service feels personal and innovative."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Gladys Utesy</h6>
                    <small class="text-muted d-block">
                    CEO - Nag Glitterglaze
                    </small>
                    <small class="text-muted d-block">
                    <!-- USA Flag -->
                    <img src="../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">USA
                    </small>
                    <small class="text-muted">July 20, 2023</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 5 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Their expert services have given our business a competitive edge. We feel supported every step of the way."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Mitchell Kowalski</h6>
                    <small class="text-muted d-block">
                    Owner - Big K's Lawn Care
                    </small>
                    <small class="text-muted d-block">
                    <!-- USA Flag -->
                    <img src="../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">USA
                    </small>
                    <small class="text-muted">September 18, 2023</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 6 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Outstanding service and excellent support at every turn. We truly feel they care about our success."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Alhaji Issah Yakubu</h6>
                    <small class="text-muted d-block">
                    CEO - Northern Light International
                    </small>
                    <small class="text-muted d-block">
                    <!-- Ghana Flag -->
                    <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                    </small>
                    <small class="text-muted">November 25, 2023</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 7 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Their dedication to quality has transformed our educational outreach, making every project feel unique and tailored."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Florence Pul</h6>
                    <small class="text-muted d-block">
                    Owner at Etoile Royale Education Center
                    </small>
                    <small class="text-muted d-block">
                    <!-- Ghana Flag -->
                    <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                    </small>
                    <small class="text-muted">February 15, 2024</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 8 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Efficiency and reliability are at the heart of their service – they consistently deliver beyond expectations."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Rafic Fuseini</h6>
                    <small class="text-muted d-block">
                    CEO - Global Cold Store
                    </small>
                    <small class="text-muted d-block">
                    <!-- Ghana Flag -->
                    <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                    </small>
                    <small class="text-muted">April 10, 2024</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 9 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Their innovative solutions have greatly improved our lab operations, making work smoother and more enjoyable."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Carolyn Puobebe</h6>
                    <small class="text-muted d-block">
                    Founder & Managing Director - NG Medicare Laboratory
                    </small>
                    <small class="text-muted d-block">
                    <!-- Ghana Flag -->
                    <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                    </small>
                    <small class="text-muted">May 05, 2024</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 10 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Nebatech's expertise has empowered our educational vision and given us a new perspective on growth."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Hajia Zulfawu Abdulai</h6>
                    <small class="text-muted d-block">
                    CEO - Braifi International School
                    </small>
                    <small class="text-muted d-block">
                    <!-- Ghana Flag -->
                    <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                    </small>
                    <small class="text-muted">July 20, 2024</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 11 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Their commitment to customer satisfaction is truly unmatched, making every interaction feel personal and thoughtful."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Hajia Fadila Abdulai</h6>
                    <small class="text-muted d-block">
                    Founder & CEO - Daimila World
                    </small>
                    <small class="text-muted d-block">
                    <!-- Ghana Flag -->
                    <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                    </small>
                    <small class="text-muted">August 10, 2024</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 12 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Incredible service and a genuine dedication to quality – they make every project feel uniquely cared for."
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Hajia Fati Sumani</h6>
                    <small class="text-muted d-block">
                    CEO - Kabita Memorial School Complex
                    </small>
                    <small class="text-muted d-block">
                    <!-- Tamale (Ghana) Flag -->
                    <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                    </small>
                    <small class="text-muted">September 05, 2024</small>
                </div>
                </div>
            </div>
            <!-- Testimonial 13 -->
            <div class="carousel-item">
                <div class="card h-100 shadow-sm mx-auto">
                <div class="card-body">
                    <div class="mb-3">
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                    "Their visionary approach has truly propelled our business forward, inspiring us to achieve new heights."
                    </p>
                </div>
                <div class="card-footer bg-white text-center">
                    <h6 class="mb-0" style="color: #002060;">Waltrude Kurugu</h6>
                    <small class="text-muted d-block">
                    Founder & CEO - Truandrew Natural Market
                    </small>
                    <small class="text-muted d-block">
                    <!-- Tamale (Ghana) Flag -->
                    <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Ghana
                    </small>
                    <small class="text-muted">January 10, 2025</small>
                </div>
                </div>
            </div>
            </div>
            <!-- Mobile Carousel Controls with Font Awesome Icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarouselMobile" data-bs-slide="prev">
            <span class="carousel-control-prev-icon">
                <i class="fa-solid fa-chevron-left"></i>
            </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarouselMobile" data-bs-slide="next">
            <span class="carousel-control-next-icon">
                <i class="fa-solid fa-chevron-right"></i>
            </span>
            </button>
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
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/65dccd3d9131ed19d971d067/1hnj83egi';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
    })();
  </script>
  <!--End of Tawk.to Script-->
  <!-- Footer will be included here -->
  <?php include 'includes/footer.php'; ?>
</body>
</html>