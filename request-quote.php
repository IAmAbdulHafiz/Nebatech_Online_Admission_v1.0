<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Request a Quote - Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .request-quote-section {
            padding: 100px 0;
        }
        .section-title {
            color: orange;
        }
        /* Responsive styling */
        @media (max-width: 768px) {
            .request-quote-section {
                padding: 50px 0;
            }
            .card-body {
                padding: 1rem;
            }
            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <?php include("includes/public_header.php"); ?>

    <div class="container mt-5 request-quote-section">
        <h2 class="text-center section-title">Request a Quote</h2>
        <p class="text-center">Fill out the form below to get a personalized quote for your project.</p>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Request a Quote</h4>
                    </div>
                    <div class="card-body">
                        <form action="submit_quote.php" method="POST">
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

                            <!-- Project Details Field -->
                            <div class="form-group">
                                <label for="project">Project Details</label>
                                <textarea class="form-control" id="project" name="project" rows="4" placeholder="Describe your project needs" required></textarea>
                            </div>

                            <!-- Estimated Budget Field -->
                            <div class="form-group">
                                <label for="budget">Estimated Budget</label>
                                <input type="number" class="form-control" id="budget" name="budget" placeholder="Enter your estimated budget" required>
                            </div>

                            <!-- Timeline Field -->
                            <div class="form-group">
                                <label for="timeline">Timeline</label>
                                <input type="text" class="form-control" id="timeline" name="timeline" placeholder="Enter your preferred project timeline" required>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary btn-block">Submit Request</button>
                        </form>
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
