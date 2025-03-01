<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Get in touch with us. Contact Nebatech Software Solution Ltd through our contact form or find our location in Tamale, Ghana.">
  <meta name="keywords" content="Contact Nebatech, Software Solution, Ghana, Tamale">
  <meta name="author" content="Nebatech Software Solution Ltd">
  <link rel="icon" href="../assets/images/favicon.ico">
  <title>Contact Us - Nebatech Software Solution Ltd</title>
  
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  
  <style>
    /* Common Hero Section Styling */
    .hero {
      background: linear-gradient(rgba(0, 32, 96, 0.9), rgba(0, 32, 96, 0.9)), url('../assets/images/hero_bg1.JPG');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 8rem 2rem;
      text-align: center;
      margin-bottom: 0;
    }
    .hero h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }
    .hero p {
      font-size: 1.2rem;
      max-width: 800px;
      margin: 0 auto;
      opacity: 0.9;
    }
    /* Contact Section Styling */
    .contact-section {
      padding: 100px 0;
      background-color: #f8f9fa;
    }
    .contact-form-wrapper,
    .contact-info-wrapper,
    .map-wrapper {
      background: white;
      padding: 2rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .section-title {
      color: orange;
      margin-bottom: 30px;
    }
    .social-links a {
      font-size: 1.5rem;
      margin-right: 10px;
      color: #002060;
    }
    .social-links a:hover {
      color: orange;
    }
    @media (max-width: 768px) {
      .contact-section {
        padding: 50px 0;
      }
    }
  </style>
</head>
<body>
  <?php include("includes/public_header.php"); ?>

  <!-- Hero Section -->
  <header class="hero">
    <h1>Get in Touch</h1>
    <p>We're here to help and answer any questions you might have.</p>
  </header>

  <!-- Contact Section -->
  <section class="contact-section">
    <div class="container">
      <div class="row g-4">
        <!-- Contact Form -->
        <div class="col-lg-6">
          <div class="contact-form-wrapper">
            <h3 class="section-title">Send us a Message</h3>
            <form id="contactForm" action="submit_contact.php" method="POST" class="needs-validation" novalidate>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                <label for="name">Full Name</label>
                <div class="invalid-feedback">Please enter your name</div>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                <label for="email">Email Address</label>
                <div class="invalid-feedback">Please enter a valid email</div>
              </div>
              <div class="form-floating mb-3">
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                <label for="phone">Phone Number</label>
                <div class="invalid-feedback">Please enter your phone number</div>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" id="message" name="message" placeholder="Your Message" style="height: 150px" required></textarea>
                <label for="message">Your Message</label>
                <div class="invalid-feedback">Please enter your message</div>
              </div>
              <button type="submit" class="btn btn-primary btn-lg w-100">
                <span class="button-text">Send Message</span>
                <div class="spinner-border spinner-border-sm d-none" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </button>
            </form>
          </div>
        </div>
        <!-- Contact Info -->
        <div class="col-lg-6">
          <div class="contact-info-wrapper">
            <h3 class="section-title">Contact Information</h3>
            <div class="mb-3">
              <div class="d-flex align-items-center">
                <i class="fas fa-phone-alt fa-2x me-3" style="color: #002060;"></i>
                <div>
                  <h5>Phone Numbers</h5>
                  <p><a href="tel:0247636080" style="text-decoration: none; color: #002060; margin-right: 5px;">024 763 6080</a>
                     <a href="tel:0206789600" style="text-decoration: none; color: #002060;">/ 020 678 9600</a>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="d-flex align-items-center">
                <i class="fas fa-envelope fa-2x me-3" style="color: #002060;"></i>
                <div>
                  <h5>Email</h5>
                  <p><a href="mailto:info@nebatech.com" style="text-decoration: none; color: #002060;">info@nebatech.com</a></p>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="d-flex align-items-center">
                <i class="fas fa-map-marker-alt fa-2x me-3" style="color: #002060;"></i>
                <div>
                  <h5>Location</h5>
                  <p style="text-decoration: none; color: #002060;">Choggu Yapalsi, Tamale, Northern Ghana</p>
                </div>
              </div>
            </div>
            <div class="social-links">
              <a href="https://web.facebook.com/nebatechsoftware" target="_blank" class="social-link"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/nebatechSS" target="_blank" class="social-link"><i class="fab fa-twitter"></i></a>
              <a href="https://www.linkedin.com/company/nebatech/" target="_blank" class="social-link"><i class="fab fa-linkedin-in"></i></a>
              <a href="https://www.instagram.com/nebatechsoftwaresolution/" target="_blank" class="social-link"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <!-- Map Section -->
        <div class="col-12">
          <div class="map-wrapper">
            <h3 class="section-title">Our Location</h3>
            <div class="map-container">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3935.728530530022!2d-0.8559374999999998!3d9.4451875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfd43d5eea5f0bd7%3A0xae93c3a8941f1fcd!2sNebatech%20Software%20Solution%20Ltd.!5e0!3m2!1sen!2sgh!4v1739412809299!5m2!1sen!2sgh" 
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include("includes/footer.php"); ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/contact.js"></script>
</body>
</html>