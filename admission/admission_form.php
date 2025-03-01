<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NEBATECH - Online Admission Form</title>
  <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
  
  <!-- External Stylesheets -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  
  <link rel="stylesheet" href="../assets/css/style.css">
  
  <style>
    /* Remove default column spacing */
    .row.no-gutters > [class*="col-"] {
      padding-right: 0;
      padding-left: 0;
    }
    /* Split-screen container: fill viewport minus header/footer */
    .split-screen-container {
      min-height: calc(100vh - 100px); /* Adjust as needed */
      background: #fff;
    }
    /* Left Column: Carousel with dark overlay */
    .left-column {
      background-color: #002060;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .left-column .carousel-item img {
      width: 100%;
      height: 100vh;
      object-fit: cover;
      filter: brightness(85%);
    }
    /* Right Column: Form card */
    .right-column {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0rem;
    }
    .form-container {
    background: transparent; /* removed solid background */
    max-width: none;         /* allow full width */
    width: 100%;             /* ensure full width */
    padding: 2rem;
    /* removed box-shadow and border-radius */
    }

    .form-container h2 {
      color: #002060;
      margin-bottom: 1rem;
      text-align: center;
    }
    .form-container p {
      font-size: 0.95rem;
      text-align: center;
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
      transition: background 0.3s;
    }
    .btn-primary:hover { 
      background: #FFA500; 
    }
    .alert {
      font-size: 14px; 
      text-align: center;
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .left-column .carousel-item img {
        height: auto;
      }
      .split-screen-container {
        flex-direction: column;
      }
      .right-column {
        padding: 1rem;
      }
    }
  </style>
</head>
<body>
  <!-- HEADER -->
  <?php include("includes/header_potal_login.php"); ?>
  
  <!-- Main Content: Split-Screen Layout -->
  <div class="container-fluid split-screen-container">
    <div class="row no-gutters">
      <!-- Left Side: Carousel -->
      <div class="col-md-6 left-column">
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
      
      <!-- Right Side: Form -->
      <div class="col-md-6 right-column">
        <div class="form-container">
          <h2>NTSS Admission Form</h2>
          <div class="alert alert-info">
            The fee for the form is <strong>GH₵100</strong> <br>Fill the form below to make peyment of the form.
            <br><strong>Note:</strong> After payment, you will receive your Serial Number and PIN via SMS and Email to proceed with registration.
          </div>
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
  
  <!-- FOOTER -->
  <?php include("../includes/footer.php"); ?>
  
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>