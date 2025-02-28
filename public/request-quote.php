<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Get a personalized quote for your project with Nebatech. We offer custom software development, mobile & web apps, IT solutions, and more. Contact us today to discuss your requirements and get a free estimate!">
  <meta name="keywords" content="request a quote, get a quote, custom software pricing, IT solutions estimate, web development cost, mobile app development quote, Nebatech pricing, IT project quote, software development estimate, contact Nebatech">
  <meta name="author" content="Nebatech Software Solution Ltd">
  <meta name="robots" content="index, follow">
  <link rel="icon" href="../assets/images/favicon.ico">
  <title>Request a Quote - Nebatech Software Solution Ltd</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    /* Hero Section Styling (consistent with Updates & Events page) */
    .hero {
      background: linear-gradient(rgba(0, 32, 96, 0.9), rgba(0, 32, 96, 0.9)), url('assets/images/bg1.jpg');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 7rem 2rem;
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
    
    /* Request Quote Section */
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

  <!-- Hero Section -->
  <header class="hero">
    <h1>Request a Quote</h1>
    <p>Fill out the form below to get a personalized quote for your project.</p>
  </header>

  <!-- Request Quote Section -->
  <div class="container request-quote-section">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center">
            <h4>Request a Quote</h4>
          </div>
          <div class="card-body">
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
              <div class="alert alert-success">Your request has been submitted successfully!</div>
            <?php endif; ?>
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

  <?php include("includes/footer.php"); ?>

  <!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>