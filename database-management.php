<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Database Management & Administration - Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .course-section {
            padding: 100px 0;
        }
        .course-header {
            text-align: center;
            color: #002060;
        }
        .course-content {
            margin-top: 20px;
            margin-left: 1rem;
            margin-right: 1rem;
        }
        .course-content ul {
            list-style-type: square;
            margin-left: 20px;
        }
        .section-title {
            color:orange;
        }
        .card{
            margin-left: 1rem;
            margin-right: 1rem;
        }
        .lead{
            margin-left: 1rem;
            margin-right: 1rem;
        }
        @media (max-width: 768px) {
            .course-section {
                padding: 100px 0;
            }
            .course-content {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }
            .card {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }
            .lead {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }
        }
    </style>
</head>
<body>

    <?php include("includes/public_header.php"); ?>

    <!-- Course Section -->
    <div class="container course-section mt-5">
        <h2 class="course-header">Database Management & Administration</h2>
        <p class="text-center lead">Learn the essential skills for managing and administering databases. This course covers relational databases, SQL, database design, and more.</p>

        <div class="row">
            <!-- Course Overview -->
            <div class="col-md-8">
                <div class="course-content">
                    <h4 class="section-title">Course Overview</h4>
                    <p>This course is designed to provide a comprehensive understanding of database management and administration. You will learn the core concepts of relational databases, SQL, database design, and how to manage and maintain databases effectively.</p>

                    <h5>Key Topics Covered:</h5>
                    <ul>
                        <li>Introduction to Databases and Database Management Systems (DBMS)</li>
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
                        <li>Understand how relational databases work and how to design them</li>
                        <li>Gain proficiency in SQL for querying, managing, and manipulating data</li>
                        <li>Learn how to optimize and index databases for better performance</li>
                        <li>Understand how to ensure database security and user access control</li>
                        <li>Gain practical experience with backup and recovery techniques</li>
                        <li>Get introduced to NoSQL databases and understand their use cases</li>
                    </ul>

                    <h5>Course Duration:</h5>
                    <p>This course spans over 5 weeks, with each week focusing on key aspects of database management. You will be guided through theoretical lessons, hands-on exercises, and real-world examples to deepen your understanding of databases.</p>

                    <h5>Prerequisites:</h5>
                    <p>This course is suitable for beginners and assumes no prior knowledge of databases. However, a basic understanding of programming concepts and data structures is recommended. By the end of the course, you will have a solid foundation in database management and administration.</p>
                </div>
            </div>

            <!-- Enroll Now Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Enroll Now</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Interested in mastering database management?</p>
                        <!-- Link to Admission Portal -->
                        <a href="admission_portal/admission_portal.php" class="btn btn-primary">Visit Our Admission Portal</a>
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