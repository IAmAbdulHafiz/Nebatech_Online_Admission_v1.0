<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Discover the fundamentals of Back-End Development with Nebatech. Learn how to build robust server-side applications, manage databases, and create APIs. Start your Back-End development journey today.">
  <meta name="keywords" content="back-end development, server-side programming, databases, APIs, web development, programming, software development">
  <meta name="author" content="Nebatech Software Solution Ltd">
  <meta property="og:title" content="Back-End Development - Nebatech Software Solution Ltd">
  <meta property="og:description" content="Discover the fundamentals of Back-End Development with Nebatech. Learn how to build robust server-side applications, manage databases, and create APIs. Start your Back-End development journey today.">
  <meta name="robots" content="index, follow">
  <link rel="icon" href="../assets/images/favicon.ico">
  <title>Back-End Development - Nebatech Software Solution Ltd</title>
  
  <!-- External Stylesheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  
  <style>
    /* Reset & Base */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f4f6f9;
      color: #333;
      line-height: 1.6;
    }
    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0,32,96,0.9), rgba(0,32,96,0.9)), url('../assets/images/hero_bg1.JPG');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 9rem 0;
      text-align: center;
    }
    .hero h1 {
      font-size: 2.8rem;
      margin-bottom: 1rem;
    }
    .hero p {
      font-size: 1.3rem;
      max-width: 800px;
      margin: 0 auto;
      opacity: 0.9;
    }
    /* Course Section */
    .course-section {
      padding: 20px 0;
    }
    .course-header {
      text-align: center;
      color: #002060;
      margin-bottom: 40px;
      font-weight: 600;
    }
    .course-content {
      margin: 20px 1rem;
      font-size: 1rem;
      line-height: 1.8;
      color: #555;
    }
    .course-content ul {
      list-style: disc inside;
      margin: 1rem 0;
    }
    .section-title {
      color: orange;
      margin-top: 20px;
      margin-bottom: 15px;
      font-size: 1.5rem;
      font-weight: 600;
    }
    /* Modern Card Style for Fee & Duration */
    .quote-card {
      border: none;
      border-radius: 10px;
      background: #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
      margin: 1rem;
    }
    .quote-card:hover {
      transform: translateY(-5px);
    }
    .quote-card .card-header {
      background: #002060;
      color: white;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      font-size: 1.2rem;
      text-align: center;
      padding: 1rem;
    }
    .quote-card .card-body {
      padding: 1.5rem;
      text-align: center;
    }
    .quote-card .card-body p {
      margin: 0.5rem 0;
      font-size: 1rem;
    }
    .quote-card .btn {
      margin-top: 1rem;
      font-size: 1rem;
      border-radius: 5px;
    }
    /* Button Styling */
    .btn-primary {
      background-color: #002060;
      border-color: #002060;
      color: white;
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: orange;
      border-color: orange;
      color: white;
    }
    /* Responsive Styling */
    @media (max-width: 768px) {
      .course-section {
        padding: 50px 0;
      }
      .course-content {
        margin: 10px 0.5rem;
      }
      .quote-card {
        margin: 0.5rem;
      }
    }
  </style>
</head>
<body>
  <?php include("includes/public_header.php"); ?>
  
  <!-- Hero Section -->
  <header class="hero">
    <h1>Back-End Development</h1>
    <p>Learn how to build robust server-side applications, manage databases, and create APIs to power dynamic websites and applications.</p>
  </header>
  
  <!-- Course Section -->
  <div class="container course-section mt-5">
    <div class="row">
      <!-- Course Overview -->
      <div class="col-md-8">
        <div class="course-content">
          <h4 class="section-title">Course Overview</h4>
          <p>This course will teach you the fundamentals of back-end development, focusing on server-side programming, database management, API development, and more. You will learn to work with server-side technologies, manage databases, and build secure, scalable applications that communicate seamlessly with the front-end.</p>
          
          <h5>Key Topics Covered:</h5>
          <ul>
            <li>Introduction to Back-End Development</li>
            <li>Server-Side Programming with Node.js, Python (Django/Flask), or PHP</li>
            <li>Working with Databases: SQL (MySQL/PostgreSQL) and NoSQL (MongoDB)</li>
            <li>Building and Consuming RESTful APIs</li>
            <li>User Authentication and Security (JWT, OAuth)</li>
            <li>Understanding MVC (Model-View-Controller) Architecture</li>
            <li>Deploying and Maintaining Server-Side Applications</li>
          </ul>
          
          <h5>Learning Outcomes:</h5>
          <ul>
            <li>Understand the basics of back-end programming languages</li>
            <li>Gain hands-on experience with both SQL and NoSQL databases</li>
            <li>Create and work with RESTful APIs</li>
            <li>Implement user authentication and secure your web applications</li>
            <li>Understand MVC architecture and the overall structure of web applications</li>
          </ul>
          
          <h5>Course Duration:</h5>
          <p>The course is structured over 5 weeks, with weekly lessons, hands-on projects, and assessments to reinforce your learning.</p>
          
          <h5>Prerequisites:</h5>
          <p>This course assumes a basic understanding of front-end development (HTML, CSS, JavaScript) and programming concepts. No prior experience in back-end development is required.</p>
        </div>
      </div>
      
      <!-- Program Fee & Duration Card -->
      <div class="col-md-4">
        <div class="card quote-card">
          <div class="card-header">
            Program Details
          </div>
          <div class="card-body">
            <p><strong>Fee:</strong> GHS 4500.00</p>
            <p><strong>Duration:</strong> 20 Weeks</p>
            <a href="../admission/admission_portal.php" class="btn btn-primary btn-block">Enroll Now</a>
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