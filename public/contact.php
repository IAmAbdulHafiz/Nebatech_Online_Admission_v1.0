<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Get in touch with us. Contact Nebatech Software Solution Ltd through our contact form or find our location in Tamale, Ghana.">
    <meta name="keywords" content="Contact Nebatech, Software Solution, Ghana, Tamale">
    <meta name="author" content="Nebatech Software Solution Ltd">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Contact Us - Nebatech Software Solution Ltd</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/contact.css">
</head>
<body>
    <?php include("includes/public_header.php"); ?>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1 class="display-4 text-center text-white mb-4">Get in Touch</h1>
            <p class="lead text-center text-white">We're here to help and answer any questions you might have</p>
        </div>
    </div>

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
                        
                        <div class="contact-info-item">
                            <div class="icon-box">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Phone Numbers</h4>
                                <p><a href="tel:0247636080">024 763 6080</a></p>
                                <p><a href="tel:0206789600">020 678 9600</a></p>
                                <p><a href="tel:0249241156">024 924 1156</a></p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="icon-box">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h4>Email</h4>
                                <p><a href="mailto:info@nebatech.com">info@nebatech.com</a></p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="icon-box">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Location</h4>
                                <p>Choggu Yapalsi, Tamale,<br>Northern Ghana</p>
                            </div>
                        </div>

                        <div class="social-links">
                            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
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
    <script src="assets/js/contact.js"></script>
</body>
</html>