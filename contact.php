<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Get in touch with us. You can reach us through the contact details below or fill out the form on the left.">
    <meta name="keywords" content="Contact Us, Contact Nebatech, Contact Nebatech Software Solution, Contact Nebatech Software Solution Ltd, 
    Contact Nebatech Software Solution Limited, Contact Nebatech Software, Contact Nebatech Ltd, Contact Nebatech Limited, Contact Nebatech Software Ltd, 
    Contact Nebatech Software Limited, Contact Nebatech Software Solution Ltd., Contact Nebatech Software Solution Limited., Contact Nebatech Software Solution Limited">
    <meta name="author" content="Nebatech Software Solution Ltd">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Contact Us - Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .contact-section {
            padding: 100px 0;
            background-color: #f9f9f9;
        }
        .section-title {
            color: orange;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        .icon-container {
            font-size: 1.5em;
            color: #002060;
            margin-right: 10px;
        }
        .contact-details, .contact-form {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .map-container {
            position: relative;
            overflow: hidden;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            max-width: 100%;
            height: 500px;
        }
        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .btn-primary {
            background-color: #002060;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: orange;
        }
        /* Responsive styling */
        @media (max-width: 768px) {
            .contact-section {
                padding: 50px 0;
            }
            .contact-details, .contact-form {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

    <?php include("includes/public_header.php"); ?>
<div class="content mt-5">
    <div class="container mt-5 contact-section">
        <h2 class="text-center section-title">Contact Us</h2>
        <p class="text-center lead">Feel free to get in touch with us. You can reach us through the contact details below or fill out the form on the left.</p>

        <div class="row">
            <!-- Contact Form (Left Side) -->
            <div class="col-md-6 contact-form">
                <h4>Contact Form</h4>
                <form action="submit_contact.php" method="POST">
                    <!-- Full Name Field -->
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <!-- Phone Number Field -->
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>

                    <!-- Message Field -->
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                </form>
            </div>

            <!-- Contact Details (Right Side) -->
            <div class="col-md-6 contact-details">
                <h4><i class="fas fa-info-circle icon-container"></i>Contact Details</h4>

                <!-- Phone Numbers -->
                <h5><i class="fas fa-phone-alt icon-container"></i>Phone Numbers</h5>
                <ul>
                    <li><strong>0247636080</strong></li>
                    <li><strong>0206789600</strong></li>
                    <li><strong>0249241156</strong></li>
                </ul>

                <!-- Email -->
                <h5><i class="fas fa-envelope icon-container"></i>Email</h5>
                <p><strong>info@nebatech.com</strong></p>

                <!-- Website -->
                <h5><i class="fas fa-laptop-code icon-container"></i>Website</h5>
                <p><strong><a href="http://www.nebatech.com" target="_blank">www.nebatech.com</a></strong></p>

                <!-- Physical Address -->
                <h5><i class="fas fa-map-marker-alt icon-container"></i>Physical Address</h5>
                <p><strong>Choggu Yapalsi, Tamale, Northern Ghana</strong></p>
            </div>
            <div class="col-md-12 contact-details">
                <!-- Google Map Embed -->
                <h5>Our Location</h5>
                <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3935.728530530022!2d-0.8559374999999998!3d9.4451875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfd43d5eea5f0bd7%3A0xae93c3a8941f1fcd!2sNebatech%20Software%20Solution%20Ltd.!5e0!3m2!1sen!2sgh!4v1739412809299!5m2!1sen!2sgh"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
