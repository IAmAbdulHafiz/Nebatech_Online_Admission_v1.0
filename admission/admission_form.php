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
      background: #fff;
      padding-bottom: 2rem;
      padding-top: 5.9rem;
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
    }
    .form-container {
      background: #fff;
      max-width: 600px;
      width: 100%;
      height: 100vh;
      padding: 1rem 2rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border-radius: 10px;
      padding-bottom: 1rem;
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
    /* Adjust Bootstrap floating labels if needed */
    .form-floating > .form-control,
    .form-floating > label {
      height: 3.5rem;
      padding: 1rem;
      border-radius: 8px;
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
        height: auto;
      }
        .form-container {
            height: auto;
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
            The fee for the form is <strong>GH₵100</strong> <br>
            Fill the form below to make payment of the form.
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
            <div class="form-floating mb-3">
              <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Full Name" required>
              <label for="customer_name">Full Name</label>
            </div>
            
            <div class="form-floating mb-3">
              <input type="email" name="customer_email" class="form-control" id="customer_email" placeholder="Email" required>
              <label for="customer_email">Email</label>
            </div>
            
            <div class="form-floating mb-3">
              <input type="text" name="customer_phone" class="form-control" id="customer_phone" placeholder="Phone Number" required>
              <label for="customer_phone">Phone Number (For Serial & PIN)</label>
            </div>
            
            <div class="mb-3 text-center">
              <button type="submit" class="btn btn-primary d-block mx-auto">
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