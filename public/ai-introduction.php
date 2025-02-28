<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Learn the basics of Artificial Intelligence (AI) with Nebatech's Introduction to AI course. Understand AI concepts, applications, and how they are transforming industries. Start your AI journey today.">
  <meta name="keywords" content="Introduction to AI, AI concepts, artificial intelligence course, AI applications, AI for beginners, learn AI, AI technology, machine learning, AI development, Nebatech AI course">
  <meta name="author" content="Nebatech Software Solution Ltd">
  <meta name="robots" content="index, follow">
  <link rel="icon" href="../assets/images/favicon.ico">
  <title>Introduction to AI - Nebatech Software Solution Ltd</title>
  
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
      background: linear-gradient(rgba(0, 32, 96, 0.9), rgba(0, 32, 96, 0.9)), url('../assets/images/hero_bg1.JPG');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 9rem 0rem;
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
    <h1>Introduction to Artificial Intelligence (AI)</h1>
    <p>Start your journey into the world of AI and explore the fundamentals that are transforming industries.</p>
  </header>
  
  <!-- Course Section -->
  <div class="container course-section mt-5">
    <div class="row">
      <!-- Course Overview -->
      <div class="col-md-8">
        <div class="course-content">
          <h4 class="section-title">Course Overview</h4>
          <p>This course provides a comprehensive introduction to <strong>Artificial Intelligence (AI)</strong>. It covers key topics including the history of AI, core concepts, various applications, and ethical implications. Discover how AI is reshaping industries and explore the foundational technologies behind it.</p>
          
          <h5>Key Topics Covered:</h5>
          <ul>
            <li>What is AI? An Introduction</li>
            <li>History of Artificial Intelligence</li>
            <li>AI in Everyday Life: Applications and Use Cases</li>
            <li>Types of AI: Narrow AI, General AI, and Superintelligence</li>
            <li>AI Technologies: Machine Learning, Deep Learning, and Neural Networks</li>
            <li>Ethical Implications of AI</li>
          </ul>
          
          <h5>Learning Outcomes:</h5>
          <ul>
            <li>Understand the foundational concepts of AI</li>
            <li>Learn about the evolution of AI technologies</li>
            <li>Identify real-world applications and use cases</li>
            <li>Gain insights into the future impact of AI on society</li>
          </ul>
          
          <h5>Prerequisites:</h5>
          <p>This course is designed for beginners. No prior experience in AI or programming is required. A basic understanding of mathematics is helpful but not mandatory.</p>
        </div>
      </div>
      
      <!-- Program Fee & Duration Card -->
      <div class="col-md-4">
        <div class="card quote-card">
          <div class="card-header">
            Program Details
          </div>
          <div class="card-body">
            <p><strong>Fee:</strong> GHS400.00</p>
            <p><strong>Duration:</strong> 3 Weeks</p>
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