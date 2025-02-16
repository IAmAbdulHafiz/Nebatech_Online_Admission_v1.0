<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Mobile & Web Application Development - Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .service-section {
            padding: 60px 0;
        }
        .service-header {
            text-align: center;
            color: #002060;
        }
        .service-content {
            margin-top: 40px;
        }
        .service-content ul {
            list-style-type: square;
            margin-left: 20px;
        }
        .section-title {
            color: #FFD700;
        }
    </style>
</head>
<body>

    <?php include("includes/public_header.php"); ?>

    <!-- Service Section -->
    <div class="container service-section">
        <h2 class="service-header">Mobile & Web Application Development</h2>
        <p class="text-center lead">We specialize in creating custom mobile and web applications tailored to your business needs. Our development team is proficient in building innovative solutions that deliver results.</p>

        <div class="row">
            <!-- Service Overview -->
            <div class="col-md-8">
                <div class="service-content">
                    <h4 class="section-title">Our Expertise in Mobile & Web Application Development</h4>
                    <p>At Nebatech, we offer top-notch mobile and web application development services. Whether you're looking to create a mobile app for iOS/Android or a fully responsive web application, we have the expertise to bring your ideas to life.</p>

                    <h5>Our Key Services:</h5>
                    <ul>
                        <li><strong>Mobile Application Development:</strong> We specialize in building custom mobile apps for iOS and Android, tailored to your business requirements. From concept to deployment, we deliver robust, scalable, and user-friendly mobile solutions.</li>
                        <li><strong>Web Application Development:</strong> Our web applications are designed to be responsive, secure, and optimized for performance. We use the latest web technologies to ensure that your application delivers a seamless user experience across all devices.</li>
                        <li><strong>UI/UX Design:</strong> We prioritize user experience in every mobile and web app we develop. Our design team focuses on creating intuitive and engaging user interfaces that improve usability and ensure customer satisfaction.</li>
                        <li><strong>API Integration:</strong> We offer custom API integration to enhance the functionality of your mobile and web applications, allowing them to connect seamlessly with other systems or third-party services.</li>
                        <li><strong>App Maintenance & Updates:</strong> Our services don't end at deployment. We provide ongoing support, maintenance, and updates to ensure your app remains secure, bug-free, and up-to-date with the latest features.</li>
                    </ul>

                    <h5>Technologies We Use:</h5>
                    <ul>
                        <li>React Native, Flutter (Cross-platform mobile app development)</li>
                        <li>Swift (iOS Development), Kotlin (Android Development)</li>
                        <li>HTML, CSS, JavaScript (Web Development)</li>
                        <li>Node.js, PHP (Back-End Development)</li>
                        <li>MySQL, MongoDB (Database Management)</li>
                        <li>Firebase, AWS (Cloud Services and Hosting)</li>
                        <li>RESTful API Development & Integration</li>
                    </ul>

                    <h5>Why Choose Us?</h5>
                    <ul>
                        <li>We offer **custom solutions** tailored to your specific needs and goals.</li>
                        <li>Our team is highly **skilled and experienced**, with a proven track record of successful projects.</li>
                        <li>We use the **latest technologies** and best practices to deliver high-quality, scalable applications.</li>
                        <li>We offer **comprehensive support** throughout the development lifecycle and beyond.</li>
                    </ul>
                </div>
            </div>

            <!-- Contact Us Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Contact Us for a Quote</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Ready to develop your mobile or web app?</p>
                        <!-- Link to Contact Page -->
                        <a href="contact.php" class="btn btn-primary">Get in Touch</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/public_footer.php"); ?>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>