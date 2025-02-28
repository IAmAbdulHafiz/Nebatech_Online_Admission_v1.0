<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Learn about Nebatech Software Solution Ltd, our mission, our CEO's message, and meet our dedicated team of experts.">
  <meta name="keywords" content="About Nebatech, Nebatech Software Solution, About Us, CEO, Team, Company History, Technology Solutions">
  <meta name="author" content="Nebatech Software Solution Ltd">
  <link rel="icon" href="assets/images/favicon.ico">
  <title>About Us - Nebatech Software Solution Ltd</title>
  
  <!-- External Stylesheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  
  <style>
    /* Common Hero Section Styling */
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
    
    /* About Section Styling */
    .about-section {
      padding: 100px 0;
      background-color: #f8f9fa;
    }
    .section-title {
      color: orange;
      margin-bottom: 30px;
    }
    .about-content {
      font-size: 1rem;
      color: #555;
      line-height: 1.6;
    }
    
    /* CEO Section Styling */
    .ceo-section {
      padding: 100px 0;
      background-color: #fff;
    }
    .ceo-img {
      width: 100%;
      max-width: 300px;
      border-radius: 50%;
    }
    .ceo-message {
      font-size: 1rem;
      color: #555;
      line-height: 1.6;
    }
    
    /* Team Section Styling */
    .team-section {
      padding: 100px 0;
      background-color: #f8f9fa;
    }
    .team-card {
      border: none;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }
    .team-card:hover {
      transform: scale(1.05);
    }
    .team-img {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }
    .team-name {
      color: #002060;
      font-weight: bold;
      margin-top: 15px;
    }
    .team-role {
      color: orange;
      margin-bottom: 10px;
    }
    
    @media (max-width: 768px) {
      .hero, .about-section, .ceo-section, .team-section {
        padding: 50px 1rem;
      }
    }
  </style>
</head>
<body>
  <?php include("includes/public_header.php"); ?>
  
  <!-- Hero Section -->
  <header class="hero">
    <h1>About Us</h1>
    <p>Discover our journey, our values, and the team behind Nebatech Software Solution Ltd.</p>
  </header>
  
  <!-- About Nebatech Section -->
  <section class="about-section">
    <div class="container">
      <h2 class="text-center section-title">Our Story</h2>
      <p class="text-center about-content">
        Nebatech Software Solution Ltd is a leading technology company dedicated to delivering innovative IT solutions and services.
        With a strong focus on mobile and web development, network installations, and IT training, we strive to empower businesses and individuals with cutting-edge technology.
        Our commitment to excellence and customer satisfaction drives us to continuously innovate and expand our offerings.
      </p>
    </div>
  </section>
  
  <!-- CEO Message Section -->
  <section class="ceo-section">
    <div class="container">
      <h2 class="text-center section-title">CEO Message</h2>
      <div class="row align-items-center">
        <div class="col-md-4 text-center">
          <img src="assets/images/ceo.jpg" alt="CEO Picture" class="ceo-img mb-3">
        </div>
        <div class="col-md-8">
          <p class="ceo-message">
            "At Nebatech, we believe in harnessing the power of technology to transform lives and businesses.
            Our mission is to deliver exceptional solutions that not only meet but exceed our clients' expectations.
            With a dedicated team of experts and a passion for innovation, we are committed to driving success and creating value in everything we do."
          </p>
          <h4 style="color: #002060;">Abdul-Hafiz Yussif</h4>
          <p style="color: orange;">Founder & CEO</p>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Team Section -->
  <section class="team-section">
    <div class="container">
      <h2 class="text-center section-title">Meet Our Team</h2>
      <div class="row">
        <!-- Team Member 1 -->
        <div class="col-md-4 mb-4">
          <div class="card team-card">
            <img src="assets/images/team1.jpg" alt="Team Member 1" class="team-img card-img-top">
            <div class="card-body text-center">
              <h5 class="team-name">John Doe</h5>
              <p class="team-role">Lead Developer</p>
              <p class="card-text">John has over 10 years of experience building scalable web applications.</p>
            </div>
          </div>
        </div>
        <!-- Team Member 2 -->
        <div class="col-md-4 mb-4">
          <div class="card team-card">
            <img src="assets/images/team2.jpg" alt="Team Member 2" class="team-img card-img-top">
            <div class="card-body text-center">
              <h5 class="team-name">Jane Smith</h5>
              <p class="team-role">UI/UX Designer</p>
              <p class="card-text">Jane specializes in creating intuitive and visually appealing designs.</p>
            </div>
          </div>
        </div>
        <!-- Team Member 3 -->
        <div class="col-md-4 mb-4">
          <div class="card team-card">
            <img src="assets/images/team3.jpg" alt="Team Member 3" class="team-img card-img-top">
            <div class="card-body text-center">
              <h5 class="team-name">Michael Brown</h5>
              <p class="team-role">Backend Engineer</p>
              <p class="card-text">Michael is an expert in building robust backend systems and ensuring data integrity.</p>
            </div>
          </div>
        </div>
        <!-- Team Member 4 -->
        <div class="col-md-4 mb-4">
          <div class="card team-card">
            <img src="assets/images/team4.jpg" alt="Team Member 4" class="team-img card-img-top">
            <div class="card-body text-center">
              <h5 class="team-name">Emily White</h5>
              <p class="team-role">Project Manager</p>
              <p class="card-text">Emily ensures our projects are delivered on time and exceed quality standards.</p>
            </div>
          </div>
        </div>
        <!-- Team Member 5 -->
        <div class="col-md-4 mb-4">
          <div class="card team-card">
            <img src="assets/images/team5.jpg" alt="Team Member 5" class="team-img card-img-top">
            <div class="card-body text-center">
              <h5 class="team-name">Robert Lee</h5>
              <p class="team-role">Quality Assurance</p>
              <p class="card-text">Robert is dedicated to maintaining high standards through rigorous testing.</p>
            </div>
          </div>
        </div>
        <!-- Team Member 6 -->
        <div class="col-md-4 mb-4">
          <div class="card team-card">
            <img src="assets/images/team6.jpg" alt="Team Member 6" class="team-img card-img-top">
            <div class="card-body text-center">
              <h5 class="team-name">Sophia Green</h5>
              <p class="team-role">Digital Marketing</p>
              <p class="card-text">Sophia drives our online presence and marketing strategy to reach a wider audience.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <?php include("includes/footer.php"); ?>
</body>
</html>