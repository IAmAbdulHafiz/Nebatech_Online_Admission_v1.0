<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <icon href="assets/images/favicon.ico" rel="icon">
    <title>NEBATECH-Online Admission</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .carousel-item {
            height: 100%;
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            filter: brightness(90%); /* Dark overlay effect */
            border-radius: 15px; /* Rounded corners */
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
        .card-body {
            min-height: 400px; /* Maintain consistent height for the right-side card */
        }
    </style>
</head>

<body>
    <!-- Include Header -->
    <?php include("includes/header.php"); ?>

    <!-- Welcome Section -->
    <div class="welcome-section">
        <div class="overlay"></div>
        <div class="content">
            <h1 class="welcome-text" style="font-size: 3em;">Welcome to Nebatech Admission Portal</h1>
            <p>Where technology meets innovation and learning fosters transformation.</p>
            <a href="admission_form.php" class="btn btn-light btn-lg login-btn">Get Started</a>
        </div>
    </div>

    <!-- Welcome Message Section -->
    <div class="container text-center mt-5">
        <h2>Welcome Message</h2>
        <p class="lead text-start">
            Dear Student,<br><br>
            Welcome to Nebatech Software Solution Ltd, where technology meets innovation and learning fosters transformation. 
            We are thrilled to have you join our growing community of passionate learners and professionals dedicated to 
            leveraging technology for impact and excellence.<br><br>At Nebatech, we believe in your potential to innovate and 
            create a better future through technology. With our competence base training programs, exceptional faculty, and 
            supportive community, we are committed to equipping you with the knowledge, skills, and tools needed to excel 
            in today’s fast-evolving digital world. We also want to express our gratitude to our investor, <strong>Mr. Rafik 
                Fuseini</strong>, for believing in our vision and supporting our growth.<br><br> Additionally, we extend our 
                heartfelt appreciation to <strong>Alhaj Dr. Tanko Mohammed</strong>, a valued member of our Board of Advisory, 
                and <strong>Mr. Awal Fuseini</strong>, who serves as the Board Advisor Secretary, for their immense contributions 
                toward the success of Nebatech Software Solution Ltd. Their guidance and dedication continue to inspire and 
                propel us forward.<br><br>Warm regards,<br>
            <strong>Abdul-Hafiz Yussif</strong><br>
            Founder & CEO, Nebatech Software Solution Ltd.
        </p>
    </div>

    <!-- Cards Section -->
    <div class="container card-section">
        <div class="row">
            <!-- Admission Information -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-user-graduate fa-3x mb-3" style="color: #002060"></i>
                        <h5 class="card-title">Admission Requirements</h5>
                        <p class="card-text">
                            To enroll in any of our programs, students must meet the following requirements:
                        </p>
                        <ul class="list-unstyled text-left">
                            <li><i class="fas fa-check-circle text-success"></i> Basic literacy and numeracy skills (minimum JHS certificate).</li>
                            <li><i class="fas fa-check-circle text-success"></i> A passion for technology and a commitment to learning.</li>
                            <li><i class="fas fa-check-circle text-success"></i> Access to a laptop is highly recommended for technical programs.</li>
                            <br>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Learning Tools and Resources -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-book-open fa-3x mb-3" style="color: #002060"></i>
                        <h5 class="card-title">Learning Tools and Resources</h5>
                        <p class="card-text">
                            Nebatech provides the following tools and resources to enhance your learning experience:
                        </p>
                        <ul class="list-unstyled text-left">
                            <li><i class="fas fa-check-circle text-success"></i> Modern Classroom with high-speed internet.</li>
                            <li><i class="fas fa-check-circle text-success"></i> Free Wi-Fi for research and assignments.</li>
                            <li><i class="fas fa-check-circle text-success"></i> Access to licensed software and tools relevant to your program.</li>
                            <li><i class="fas fa-check-circle text-success"></i> Study guides, e-books, and video tutorials for each course.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Student Handbook Section -->
            <div class="container student-handbook py-5 text-center">
                <p>For more information on our programs, admission requirements, and policies, please download our Student Handbook.</p>
                <a href="downloads/student_handbook.pdf" class="btn btn-primary btn-lg">
                    <i class="fas fa-file-pdf"></i> Download Student Handbook
                </a>
            </div>
        </div>
    </div>
    <!-- Include Footer -->
    <?php include("../includes/public_footer.php"); ?>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
