<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn the essential skills to become a professional front-end developer. This course covers web development technologies like HTML, CSS, and JavaScript.">
    <meta name="keywords" content="Front-End Development, Web Development, HTML, CSS, JavaScript, Responsive Design, Front-End Frameworks">
    <meta name="author" content="Nebatech Software Solution Ltd">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Front-End Development - Nebatech Software Solution Ltd</title>
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
        <h2 class="course-header">Front-End Development</h2>
        <p class="text-center lead">Learn the essential skills to become a professional front-end developer. This course covers web development technologies like HTML, CSS, and JavaScript.</p>

        <div class="row">
            <!-- Course Overview -->
            <div class="col-md-8">
                <div class="course-content">
                    <h4 class="section-title">Course Overview</h4>
                    <p>In this course, you will learn the foundational skills needed to create modern websites and web applications. You will become familiar with the core technologies used by web developers: **HTML**, **CSS**, and **JavaScript**.</p>

                    <h5>Key Topics Covered:</h5>
                    <ul>
                        <li>Introduction to Web Development</li>
                        <li>HTML: Building Web Pages Structure</li>
                        <li>CSS: Styling Web Pages (Layouts, Colors, Fonts, etc.)</li>
                        <li>JavaScript: Making Websites Interactive</li>
                        <li>Responsive Design: Mobile-Friendly Websites</li>
                        <li>Introduction to Front-End Frameworks (e.g., Bootstrap, React, Angular)</li>
                    </ul>

                    <h5>Learning Outcomes:</h5>
                    <ul>
                        <li>Understand the basics of HTML, CSS, and JavaScript</li>
                        <li>Learn how to structure and style websites</li>
                        <li>Gain hands-on experience with responsive design and mobile-first development</li>
                        <li>Implement interactive elements using JavaScript</li>
                        <li>Start building dynamic and professional web pages</li>
                    </ul>

                    <h5>Course Duration:</h5>
                    <p>The course is divided into 4 weeks, with weekly modules focusing on different aspects of front-end development. Each week includes video tutorials, coding exercises, and quizzes to ensure you are grasping the concepts.</p>

                    <h5>Prerequisites:</h5>
                    <p>This course is designed for beginners. No prior coding experience is necessary, though a basic understanding of computers and internet navigation is helpful. By the end of the course, you will be able to build your own websites from scratch.</p>
                </div>
            </div>

            <!-- Enroll Now Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Enroll Now</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Ready to start your front-end development journey?</p>
                        <!-- Link to Admission Portal -->
                        <a href="admission/admission.php" class="btn btn-primary">Visit Our Admission Portal</a>
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