<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn the basics of Artificial Intelligence (AI) with Nebatech's Introduction to AI course. Understand AI concepts, applications, and how they are transforming industries. Start your AI journey today.">
    <meta name="keywords" content="Introduction to AI, AI concepts, artificial intelligence course, AI applications, AI for beginners, learn AI, AI technology, machine learning, AI development, Nebatech AI course">
    <meta name="author" content="Nebatech Software Solution Ltd">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Introduction to AI - Nebatech Software Solution Ltd</title>
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
        <h2 class="course-header">Introduction to Artificial Intelligence (AI)</h2>
        <p class="text-center lead">This course provides an introduction to the world of Artificial Intelligence, its history, and the fundamental concepts that define the field.</p>

        <div class="row">
            <!-- Course Overview -->
            <div class="col-md-8">
                <div class="course-content">
                    <h4 class="section-title">Course Overview</h4>
                    <p>This course is designed to provide a broad overview of **Artificial Intelligence (AI)**, covering key concepts and techniques. The course aims to familiarize learners with the history, development, and applications of AI, as well as the impact it is having on various industries.</p>

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
                        <li>Learn about the history and evolution of AI technologies</li>
                        <li>Identify real-world applications and use cases of AI</li>
                        <li>Gain insights into the future of AI and its potential impact on society</li>
                    </ul>

                    <h5>Course Duration:</h5>
                    <p>The course is structured over 2 weeks, with video tutorials, interactive exercises, and assessments to reinforce the learning. Each week will focus on key aspects of AI with practical examples to help solidify your understanding.</p>

                    <h5>Prerequisites:</h5>
                    <p>This course is designed for beginners, and no prior experience in AI or programming is required. A basic understanding of mathematics (especially algebra and probability) is helpful but not mandatory.</p>
                </div>
            </div>

            <!-- Enroll Now Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Enroll Now</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Interested in learning AI?</p>
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
