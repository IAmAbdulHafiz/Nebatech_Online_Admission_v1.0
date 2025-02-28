<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Learn the essentials of database management and administration. This course covers relational databases, SQL, database design, and more.">
  <meta name="keywords" content="Database Management, Database Administration, Database Course, Database Training, SQL, Database Design, NoSQL, MongoDB">
  <meta name="author" content="Nebatech Software Solution Ltd">
  <meta name="robots" content="noindex, nofollow">
  <link rel="icon" href="../assets/images/favicon.ico">
  <title>Database Management & Administration - Nebatech Software Solution Ltd</title>
  
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
      padding: 100px 0;
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
    /* Modern Card Style for Program Details */
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
    <h1>Database Management & Administration</h1>
    <p>Learn the essential skills for managing and administering databases, including relational databases, SQL, and database design.</p>
  </header>
  
  <!-- Course Section -->
  <div class="container course-section mt-5">
    <div class="row">
      <!-- Course Overview -->
      <div class="col-md-8">
        <div class="course-content">
          <h4 class="section-title">Course Overview</h4>
          <p>This course is designed to provide a comprehensive understanding of database management and administration. You will learn the core concepts of relational databases, SQL, database design, and effective database maintenance practices.</p>
          
          <h5>Key Topics Covered:</h5>
          <ul>
            <li>Introduction to Databases and DBMS</li>
            <li>SQL Basics: Queries, Joins, and Subqueries</li>
            <li>Advanced SQL: Stored Procedures, Functions, and Triggers</li>
            <li>Database Design and Normalization</li>
            <li>Database Indexing and Optimization</li>
            <li>Backup and Recovery Strategies</li>
            <li>Security and Access Control in Databases</li>
            <li>Introduction to NoSQL Databases (e.g., MongoDB)</li>
          </ul>
          
          <h5>Learning Outcomes:</h5>
          <ul>
            <li>Understand the fundamentals of relational database design and management</li>
            <li>Gain proficiency in SQL for querying and managing data</li>
            <li>Learn to optimize database performance through indexing and optimization techniques</li>
            <li>Implement backup, recovery, and security measures in database systems</li>
            <li>Get introduced to NoSQL databases and understand their applications</li>
          </ul>
          
          <h5>Course Duration:</h5>
          <p>This course spans over 5 weeks, with each week focusing on key aspects of database management through theoretical lessons and hands-on exercises.</p>
          
          <h5>Prerequisites:</h5>
          <p>This course is suitable for beginners and assumes no prior knowledge of databases. A basic understanding of programming concepts and data structures is recommended.</p>
        </div>
      </div>
      
      <!-- Program Fee & Duration Card -->
      <div class="col-md-4">
        <div class="card quote-card">
          <div class="card-header">
            Program Details
          </div>
          <div class="card-body">
            <p><strong>Fee:</strong> GHS 4000.00</p>
            <p><strong>Duration:</strong> 16 Weeks</p>
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