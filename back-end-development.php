<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <meta name="description" content="Discover the fundamentals of Back-End Development with Nebatech. Learn how to build robust server-side applications, manage databases, and create APIs. Start your Back-End development journey today.">
    <meta name="keywords" content="back-end development, server-side programming, databases, APIs, web development, programming, software development">
    <meta name="author" content="Nebatech Software Solution Ltd">
    <meta property="og:title" content="Back-End Development - Nebatech Software Solution Ltd">
    <meta property="og:description" content="Discover the fundamentals of Back-End Development with Nebatech. Learn how to build robust server-side applications, manage databases, and create APIs. Start your Back-End development journey today.">
    <meta name="robots" content="index, follow">
    <title>Back-End Development - Nebatech Software Solution Ltd</title>
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
            color: orange;
        }
        .card {
            margin-left: 1rem;
            margin-right: 1rem;
        }
        .lead {
            margin-left: 1rem;
            margin-right: 1rem;
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
        <h2 class="course-header">Back-End Development</h2>
        <p class="text-center lead">Learn the essential skills to become a proficient back-end developer. This course covers server-side programming, databases, APIs, and more.</p>
        <div class="row">
            <!-- Course Overview -->
            <div class="col-md-8">
                <div class="course-content">
                    <h4 class="section-title">Course Overview</h4>
                    <p>This course will teach you the fundamentals of back-end development, focusing on server-side programming, database management, API development, and more. You will learn how to work with server-side technologies, databases, and how to create dynamic websites and applications that interact with the front-end.</p>

                    <h5>Key Topics Covered:</h5>
                    <ul>
                        <li>Introduction to Back-End Development</li>
                        <li>Server-Side Programming with Node.js, Python (Django/Flask), or PHP</li>
                        <li>Working with Databases: SQL (MySQL/PostgreSQL) and NoSQL (MongoDB)</li>
                        <li>Building and Consuming APIs (RESTful APIs)</li>
                        <li>User Authentication and Security (JWT, OAuth)</li>
                        <li>Understanding MVC (Model-View-Controller) Architecture</li>
                        <li>Deploying and Maintaining Server-Side Applications</li>
                    </ul>

                    <h5>Learning Outcomes:</h5>
                    <ul>
                        <li>Understand the basics of back-end programming languages (Node.js, PHP, Python)</li>
                        <li>Gain hands-on experience with SQL and NoSQL databases</li>
                        <li>Learn how to create and work with RESTful APIs</li>
                        <li>Learn how to secure your web applications with proper authentication techniques</li>
                        <li>Understand the architecture of web applications and the importance of MVC</li>
                    </ul>

                    <h5>Course Duration:</h5>
                    <p>The course is structured over 5 weeks, with weekly lessons and assignments. Each week covers new topics and includes hands-on coding exercises, quizzes, and projects to help solidify your understanding of back-end development.</p>

                    <h5>Prerequisites:</h5>
                    <p>This course assumes a basic understanding of front-end development (HTML, CSS, JavaScript). It is recommended to have some experience with basic programming concepts, though no prior knowledge of back-end development is necessary.</p>
                </div>
            </div>

            <!-- Enroll Now Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Enroll Now</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Ready to dive into back-end development?</p>
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