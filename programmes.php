<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Our Programmes - Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .programmes-section {
            padding: 100px 0;
        }
        .card {
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
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
    </style>
</head>
<body>

    <?php include("includes/public_header.php"); ?>

    <div class="container mt-5 programmes-section">
        <h2 class="text-center" style="color: orange;">Competency-Based Training Programs</h2>
        <p class="text-center lead">We offer specialized training programs designed to help individuals develop skills in the following areas:</p>

        <!-- Programs List -->
        <div class="row mt-5">
            <!-- Program 1: Introduction to AI -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-robot fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Introduction to AI</h5>
                        <p class="card-text">A beginner-friendly course that introduces the fundamentals of Artificial Intelligence (AI) and its applications.</p>
                        <a href="ai-introduction.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Program 2: Basic AI in Machine Learning -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-brain fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Basic AI in Machine Learning</h5>
                        <p class="card-text">An introduction to the concepts and techniques of machine learning, including supervised and unsupervised learning.</p>
                        <a href="basic-ai-ml.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Program 3: Front-End Development -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-laptop-code fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Front-End Development</h5>
                        <p class="card-text">Learn the essential skills for building beautiful, responsive websites using HTML, CSS, and JavaScript.</p>
                        <a href="front-end-development.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Program 4: Back-End Development -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-server fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Back-End Development</h5>
                        <p class="card-text">Master server-side technologies, databases, and APIs to build powerful back-end systems.</p>
                        <a href="back-end-development.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Program 5: Database Management & Administration -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-database fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Database Management & Administration</h5>
                        <p class="card-text">Get hands-on experience in managing databases using MySQL and other popular database tools.</p>
                        <a href="database-management.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Program 6: Microsoft Office Suite Mastery -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-file-excel fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Microsoft Office Suite Mastery</h5>
                        <p class="card-text">Master the essential tools of Microsoft Office (Word, Excel, PowerPoint) for professional productivity.</p>
                        <a href="office-suite-mastery.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Program 7: Video Editing & Production Technology -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-video fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Video Editing & Production Technology</h5>
                        <p class="card-text">Learn the art of video production, editing, and post-production using industry-standard software and techniques.</p>
                        <a href="video-editing.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Program 8: Graphic Design & Digital Arts -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-paint-brush fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Graphic Design & Digital Arts</h5>
                        <p class="card-text">Unleash your creativity and learn graphic design using industry-standard tools like Adobe Photoshop and Illustrator.</p>
                        <a href="graphic-design.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Program 9: Digital Literacy -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-laptop fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">Digital Literacy</h5>
                        <p class="card-text">Gain essential digital skills for navigating modern technology and online platforms with ease.</p>
                        <a href="digital-literacy.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <!-- Program 10: iPhone & Computer Hardware Technician -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-tools fa-3x mb-3" style="color: #002060;"></i>
                        <h5 class="card-title">iPhone & Computer Hardware Technician</h5>
                        <p class="card-text">Learn how to diagnose, repair, and maintain iPhones and computers, focusing on hardware issues.</p>
                        <a href="hardware-technician.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

</body>
</html>