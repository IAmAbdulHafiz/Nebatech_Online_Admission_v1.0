<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NEBATECH - Online Admission Form</title>
  <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    /* Remove default margin/padding from columns */
    .row.no-gutters [class^="col-"], .row.no-gutters [class*=" col-"] {
      padding-right: 0;
      padding-left: 0;
      margin: 0;
    }

    /* Left column: carousel side */
    .left-column {
      background-color: #002060; /* or remove this if you only want the carousel image */
      height: 100vh; /* stretch full height */
      position: relative; /* for positioning carousel if needed */
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .left-column .carousel-item img {
      object-fit: cover; 
      width: 100%;
      height: 100vh; 
      filter: brightness(90%);
    }

    /* Right column: form side */
    .right-column {
      background-color: #ffffff; /* or another color */
      height: 100vh; /* stretch full height */
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-container {
      max-width: 400px; /* limit form width */
      width: 100%;
      padding: 1rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 0.5rem;
    }

    .form-control {
      border-radius: 8px;
      padding: 1rem; 
    }

    .btn-primary { 
      background: #002060; 
      border: none; 
      border-radius: 8px; 
      font-size: 16px; 
      padding: 12px; 
      transition: 0.3s; 
    }
    .btn-primary:hover { 
      background: #FFA500; 
    }

    /* Alerts, headings, etc. */
    .alert { 
      font-size: 14px; 
      text-align: center; 
    }
    .notice-container {
      margin: 1rem 0;
    }

    @media (max-width: 768px) {
      .left-column .carousel-item img {
        height: 50vh;
      }
    }
  </style>
</head>
<body>
  <!-- Include Header -->
  <?php include("includes/header_potal_login.php"); ?>

  <!-- Container Fluid for full-width layout -->
  <div class="container-fluid">
    <div class="row no-gutters">
      <!-- Left Side: Carousel/Image -->
      <div class="col-md-6 left-column">
        <!-- If you prefer a static image, replace this carousel with an <img> tag -->
        <div id="welcomeCarousel" class="carousel slide carousel-fade w-100" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../assets/images/welcome1.JPG" alt="Welcome to NTSS" />
            </div>
            <div class="carousel-item">
              <img src="../assets/images/welcome2.JPG" alt="Learning Environment" />
            </div>
            <div class="carousel-item">
              <img src="../assets/images/welcome3.JPG" alt="Our Community" />
            </div>
          </div>
        </div>
      </div>

      <!-- Right Side: Admission Form -->
      <div class="col-md-6 right-column">
        <div class="form-container">
          <!-- Notice (Optional) -->
          <div class="notice-container">
            <div class="alert alert-info">
              <strong>Important Notice:</strong> Please note that Nebatech is solely a training hub and does not provide accommodation or boarding facilities for learners coming from far away. We kindly advise that you make your own arrangements for lodging.
            </div>
          </div>

          <h2 class="text-center" style="color: #002060;">NTSS Admission Form</h2>
          <p class="text-center">Application Fee: <b>GH₵100</b></p>
          <p class="text-center">Fill the form below to purchase the application form online</p>
          <p class="text-center"><b>Note:</b> After payment, you will receive your Serial Number and PIN via SMS and Email.</p>

          <!-- Success/Error Messages -->
          <?php if (!empty($_SESSION['success_message'])) : ?>
              <div class="alert alert-success">
                  <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
              </div>
          <?php endif; ?>

          <?php if (!empty($_SESSION['error_message'])) : ?>
              <div class="alert alert-danger">
                  <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
              </div>
          <?php endif; ?>

          <!-- Form -->
          <form method="POST" action="api/hubtel_payment.php">
            <div class="mb-3">
              <label><i class="fas fa-user"></i> Full Name:</label>
              <input type="text" name="customer_name" class="form-control" placeholder="Enter full name" required>
            </div>
            <div class="mb-3">
              <label><i class="fas fa-envelope"></i> Email:</label>
              <input type="email" name="customer_email" class="form-control" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
              <label><i class="fas fa-phone"></i> Phone Number (For Serial & PIN):</label>
              <input type="text" name="customer_phone" class="form-control" placeholder="Enter phone number" required>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-money-check-alt"></i> Pay with Hubtel
              </button>
            </div>
          </form>
          <hr>
          <p class="text-center">Already applied? <a href="login.php">Login to continue</a></p>
          <p class="text-center">Yet to start your application? <a href="signup.php">Signup</a></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <!-- Include Footer -->
  <?php include("../includes/footer.php"); ?>
</body>
</html>