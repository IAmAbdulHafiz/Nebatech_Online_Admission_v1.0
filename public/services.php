<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Explore Nebatech's top-notch IT services, including mobile & web development, network installation, CCTV setup, POS systems, software development, and IT training. Get innovative solutions tailored for your business.">
  <meta name="keywords" content="IT services, software development, mobile app development, web design, network installation, CCTV installation, POS systems, custom software, IT training, digital solutions, Nebatech services, technology solutions">
  <meta name="author" content="Nebatech Software Solution Ltd">
  <meta name="robots" content="index, follow">
  <link rel="icon" href="../assets/images/favicon.ico">
  <title>Our Services - Nebatech Software Solution Ltd</title>
  
  <!-- External Stylesheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  
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
    
    /* Services Section Styling */
    .services-section {
      padding: 3rem 0;
      background-color: #f8f9fa;
    }
    .services-section h2 {
      color: orange;
    }
    .card {
      border: none;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
      height: 100%;
      margin-left: 1rem;
      margin-right: 1rem;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .card-body {
      padding: 2rem;
    }
    .card-title {
      color: #002060;
    }
    .card-text {
      color: #555;
    }
    .btn-primary {
      background-color: #002060;
      border-color: #002060;
      color: white;
      transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
    }
    .btn-primary:hover {
      background-color: orange;
      border-color: orange;
      color: white;
    }
    .lead {
      margin-left: 1rem;
      margin-right: 1rem;
    }
    @media (max-width: 768px) {
      .services-section {
        padding: 100px 0;
      }
      .card {
        margin-left: 1rem;
        margin-right: 1rem;
      }
      .card-body {
        padding: 1rem;
      }
      .card-title {
        font-size: 1.2rem;
      }
      .card-text {
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>
  <?php include("includes/public_header.php"); ?>
  
  <!-- Hero Section for Services -->
  <header class="hero">
    <h1>Our IT Services</h1>
    <p>Discover innovative IT solutions tailored to meet your business needs.</p>
  </header>
  
  <div class="content">
    <div class="container services-section">
      <p class="text-center lead">At Nebatech, we provide a variety of services to cater to your needs. Below are the services we offer:</p>
  
      <!-- Services List -->
      <div class="row mt-5">
        <!-- Service 1: Mobile & Web Application Development -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <i class="fas fa-mobile-alt fa-3x mb-3" style="color: #002060;"></i>
              <h5 class="card-title">Mobile & Web Application Development</h5>
              <p class="card-text">We create custom mobile apps (Android/iOS) and web applications tailored to meet the needs of businesses and individuals.</p>
              <a href="mobile-web-development.php" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <!-- Service 2: Website Design & Development -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <i class="fas fa-laptop-code fa-3x mb-3" style="color: #002060;"></i>
              <h5 class="card-title">Website Design & Development</h5>
              <p class="card-text">We design and develop responsive and visually appealing websites, ensuring that they are user-friendly and fully optimized.</p>
              <a href="website-design.php" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <!-- Service 3: POS System Development -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <i class="fas fa-cash-register fa-3x mb-3" style="color: #002060;"></i>
              <h5 class="card-title">POS System Development</h5>
              <p class="card-text">We develop custom Point of Sale (POS) systems to streamline your business transactions and inventory management.</p>
              <a href="pos-system-development.php" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <!-- Service 4: Inventory Management System -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <i class="fas fa-warehouse fa-3x mb-3" style="color: #002060;"></i>
              <h5 class="card-title">Inventory Management System</h5>
              <p class="card-text">Our inventory management systems help you keep track of your stock levels, orders, sales, and deliveries efficiently.</p>
              <a href="inventory-management-system.php" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <!-- Service 5: Network Installation & Troubleshooting -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <i class="fas fa-network-wired fa-3x mb-3" style="color: #002060;"></i>
              <h5 class="card-title">Network Installation & Troubleshooting</h5>
              <p class="card-text">Nebatech offers professional network setup, installation, and troubleshooting services to keep your systems running smoothly.</p>
              <a href="network-services.php" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <!-- Service 6: CCTV Camera Installation -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <i class="fas fa-camera fa-3x mb-3" style="color: #002060;"></i>
              <h5 class="card-title">CCTV Camera Installation</h5>
              <p class="card-text">We provide security solutions with the installation of CCTV cameras to ensure the safety of homes, businesses, and other premises.</p>
              <a href="cctv-installation.php" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <!-- Service 7: iPhone & Laptop Repairs -->
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <i class="fas fa-tools fa-3x mb-3" style="color: #002060;"></i>
              <h5 class="card-title">iPhone & Laptop Repairs</h5>
              <p class="card-text">Our expert technicians offer repair services for iPhones and laptops, including hardware and software issues.</p>
              <a href="iphone-laptop-repair.php" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php include("includes/footer.php"); ?>
</body>
</html>