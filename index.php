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
                            "Nebatech's innovative approach has revolutionized our learning experience."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Alhaj Dr. Tanko Mohammed</h6>
                        <small class="text-muted d-block">
                            Managing Director at Keen International Academy
                        </small>
                        <small class="text-muted d-block">
                            <!-- Ghana Flag -->
                            <img src="../../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
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
                            "Their commitment to excellence has been a game-changer for our construction projects."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Hamdu</h6>
                        <small class="text-muted d-block">
                            CEO at DM Sky Construction
                        </small>
                        <small class="text-muted d-block">
                            <!-- Ghana Flag -->
                            <img src="../../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                        </small>
                        <small class="text-muted">February 10, 2023</small>
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
                            "Professional and reliable – they helped us streamline our operations."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Idris Issah</h6>
                        <small class="text-muted d-block">
                            Owner at EastEnd Liquidation
                        </small>
                        <small class="text-muted d-block">
                            <!-- USA Flag -->
                            <img src="../../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">Country: USA
                        </small>
                        <small class="text-muted">March 05, 2023</small>
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
                            "The creative solutions provided have enhanced our brand image significantly."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Gladys</h6>
                        <small class="text-muted d-block">
                            CEO, MakeUp Arties at Nag Glitterglaze
                        </small>
                        <small class="text-muted d-block">
                            <!-- USA Flag -->
                            <img src="../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">Country: USA
                        </small>
                        <small class="text-muted">April 20, 2023</small>
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
                            "Their expert services have given our business a competitive edge."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Mitchell Kowalski</h6>
                        <small class="text-muted d-block">
                            Owner at Big K's Lawns
                        </small>
                        <small class="text-muted d-block">
                            <!-- USA Flag -->
                            <img src="../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">Country: USA
                        </small>
                        <small class="text-muted">May 18, 2023</small>
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
                            "Outstanding service and top-notch support every step of the way."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Alhaji Issah Yakubu</h6>
                        <small class="text-muted d-block">
                            CEO at Northern Light International
                        </small>
                        <small class="text-muted d-block">
                            <!-- Ghana Flag -->
                            <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                        </small>
                        <small class="text-muted">June 25, 2023</small>
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
                            "Their dedication to quality has transformed our educational outreach."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Flourence</h6>
                        <small class="text-muted d-block">
                            Owner at Etoile Royale Education Center
                        </small>
                        <small class="text-muted d-block">
                            <!-- Ghana Flag -->
                            <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                        </small>
                        <small class="text-muted">July 15, 2023</small>
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
                            "Efficiency and reliability are the hallmarks of their service."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Rafic Fuseini</h6>
                        <small class="text-muted d-block">
                            CEO at Global Cold Store
                        </small>
                        <small class="text-muted d-block">
                            <!-- Ghana Flag -->
                            <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                        </small>
                        <small class="text-muted">August 10, 2023</small>
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
                            "Their innovative solutions have greatly improved our lab operations."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Catelina</h6>
                        <small class="text-muted d-block">
                            Managing Director at NG Laboratory Care
                        </small>
                        <small class="text-muted d-block">
                            <!-- Ghana Flag -->
                            <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                        </small>
                        <small class="text-muted">September 05, 2023</small>
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
                            "Nebatech's expertise has empowered our educational vision."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Hajia Zulfawu</h6>
                        <small class="text-muted d-block">
                            CEO at Zulfawu International School
                        </small>
                        <small class="text-muted d-block">
                            <!-- Ghana Flag -->
                            <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                        </small>
                        <small class="text-muted">October 20, 2023</small>
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
                            "Their commitment to customer satisfaction is unmatched."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Hajia Dady</h6>
                        <small class="text-muted d-block">
                            CEO at Daim World Collection
                        </small>
                        <small class="text-muted d-block">
                            <!-- Ghana Flag -->
                            <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                        </small>
                        <small class="text-muted">November 10, 2023</small>
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
                            "Incredible service and a genuine dedication to quality."
                        </p>
                        </div>
                        <div class="card-footer bg-white">
                        <h6 class="mb-0" style="color: #002060;">Hajia Fati</h6>
                        <small class="text-muted d-block">
                            CEO at Kabita Memorial School Complex
                        </small>
                        <small class="text-muted d-block">
                            <!-- Tamale (Ghana) Flag -->
                            <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Tamale
                        </small>
                        <small class="text-muted">December 05, 2023</small>
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
                            "Their visionary approach has propelled our business forward."
                        </p>
                        </div>
                        <div class="card-footer bg-white text-center">
                        <h6 class="mb-0" style="color: #002060;">Madam Sara</h6>
                        <small class="text-muted d-block">
                            Founder & CEO at Truandrew Ventures
                        </small>
                        <small class="text-muted d-block">
                            <!-- Tamale (Ghana) Flag -->
                            <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Tamale
                        </small>
                        <small class="text-muted">January 10, 2024</small>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Desktop Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarouselDesktop" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarouselDesktop" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
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
                    <div class="mb-3">
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                        <i class="fas fa-star" style="color: #FFA500;"></i>
                    </div>
                    <p class="card-text fst-italic">
                        "Nebatech's innovative approach has revolutionized our learning experience."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Alhaj Dr. Tanko Mohammed</h6>
                    <small class="text-muted d-block">
                        Managing Director at Keen International Academy
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
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
                        "Their commitment to excellence has been a game-changer for our construction projects."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Hamdu</h6>
                    <small class="text-muted d-block">
                        CEO at DM Sky Construction
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                    </small>
                    <small class="text-muted">February 10, 2023</small>
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
                        "Professional and reliable – they helped us streamline our operations."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Idris Issah</h6>
                    <small class="text-muted d-block">
                        Owner at EastEnd Liquidation
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">Country: USA
                    </small>
                    <small class="text-muted">March 05, 2023</small>
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
                        "The creative solutions provided have enhanced our brand image significantly."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Gladys</h6>
                    <small class="text-muted d-block">
                        CEO, MakeUp Arties at Nag Glitterglaze
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">Country: USA
                    </small>
                    <small class="text-muted">April 20, 2023</small>
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
                        "Their expert services have given our business a competitive edge."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Mitchell Kowalski</h6>
                    <small class="text-muted d-block">
                        Owner at Big K's Lawns
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/usa.png" alt="USA" style="width:20px; margin-right:5px;">Country: USA
                    </small>
                    <small class="text-muted">May 18, 2023</small>
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
                        "Outstanding service and top-notch support every step of the way."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Alhaji Issah Yakubu</h6>
                    <small class="text-muted d-block">
                        CEO at Northern Light International
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                    </small>
                    <small class="text-muted">June 25, 2023</small>
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
                        "Their dedication to quality has transformed our educational outreach."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Flourence</h6>
                    <small class="text-muted d-block">
                        Owner at Etoile Royale Education Center
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                    </small>
                    <small class="text-muted">July 15, 2023</small>
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
                        "Efficiency and reliability are the hallmarks of their service."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Rafic Fuseini</h6>
                    <small class="text-muted d-block">
                        CEO at Global Cold Store
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                    </small>
                    <small class="text-muted">August 10, 2023</small>
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
                        "Their innovative solutions have greatly improved our lab operations."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Catelina</h6>
                    <small class="text-muted d-block">
                        Managing Director at NG Laboratory Care
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                    </small>
                    <small class="text-muted">September 05, 2023</small>
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
                        "Nebatech's expertise has empowered our educational vision."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Hajia Zulfawu</h6>
                    <small class="text-muted d-block">
                        CEO at Zulfawu International School
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                    </small>
                    <small class="text-muted">October 20, 2023</small>
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
                        "Their commitment to customer satisfaction is unmatched."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Hajia Dady</h6>
                    <small class="text-muted d-block">
                        CEO at Daim World Collection
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Ghana
                    </small>
                    <small class="text-muted">November 10, 2023</small>
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
                        "Incredible service and a genuine dedication to quality."
                    </p>
                    </div>
                    <div class="card-footer bg-white">
                    <h6 class="mb-0" style="color: #002060;">Hajia Fati</h6>
                    <small class="text-muted d-block">
                        CEO at Kabita Memorial School Complex
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Tamale
                    </small>
                    <small class="text-muted">December 05, 2023</small>
                    </div>
                </div>
                </div>
                <!-- Testimonial 13 -->
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
                        "Their visionary approach has propelled our business forward."
                    </p>
                    </div>
                    <div class="card-footer bg-white text-center">
                    <h6 class="mb-0" style="color: #002060;">Madam Sara</h6>
                    <small class="text-muted d-block">
                        Founder & CEO at Truandrew Ventures
                    </small>
                    <small class="text-muted d-block">
                        <img src="../assets/images/flags/ghana.png" alt="Ghana" style="width:20px; margin-right:5px;">Country: Tamale
                    </small>
                    <small class="text-muted">January 10, 2024</small>
                    </div>
                </div>
                </div>
            </div>
            <!-- Mobile Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarouselMobile" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarouselMobile" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
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