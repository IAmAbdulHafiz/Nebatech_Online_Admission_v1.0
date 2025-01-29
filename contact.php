<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - NTSS</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .contact-header {
            background-color: #002060;
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        .contact-details {
            padding: 40px 0;
        }

        .map-container {
            height: 400px;
            margin-bottom: 40px;
        }

        .contact-form {
            background-color: #f9f9f9;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php include("includes/public_header.php"); ?>

    <!-- Page Header -->
    <div class="contact-header">
        <h1>Contact Us</h1>
        <p>We’re here to help. Reach out to us for any assistance or inquiries.</p>
    </div>

    <!-- Contact Details and Form -->
    <div class="container">
        <div class="row">
            <!-- Contact Details -->
            <div class="col-md-6 contact-details">
                <h2>Get in Touch</h2>
                <p>If you have any questions, feel free to contact us through the following channels:</p>
                <ul class="list-unstyled">
                    <li><strong>Phone:</strong> +233 249 241 156</li>
                    <li><strong>Email:</strong> info@nebatech.com</li>
                    <li><strong>Address:</strong> Choggu Yapalsi, Tamale, Northern Region, Ghana</li>
                </ul>
                <p>Our team is available Monday to Friday, 9 AM to 5 PM.</p>
            </div>

            <!-- Contact Form -->
            <div class="col-md-6">
                <div class="contact-form">
                    <h2>Send Us a Message</h2>
                    <form action="send_message.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Map -->
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.137533050229!2d-0.8545!3d9.4401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x102b4f8342b7f42d%3A0x95e6439b122c8057!2sChoggu%20Yapalsi%2C%20Tamale%2C%20Ghana!5e0!3m2!1sen!2sgh!4v1618263810335!5m2!1sen!2sgh"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <?php include("footer.php"); ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
