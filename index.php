<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <icon href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Admission System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style1.css">
</head>
<body>
    <?php include("includes/public_header.php"); ?>

    <!-- Welcome Section -->
    <div class="welcome-section">
        <div class="overlay"></div>
        <div class="content">
            <h1 class="welcome-text" style="font-size: 3em;">Welcome to the Nebatech Software Solution</h1>
            <p>Where technology meets innovation and learning fosters transformation.</p>
            <a href="admission.php" class="btn btn-light btn-lg login-btn">Start Your Application</a>
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
                <a href="student_handbook.pdf" class="btn btn-primary btn-lg">
                    <i class="fas fa-file-pdf"></i> Download Student Handbook
                </a>
            </div>
        </div>
    </div>

    <?php include("includes/public_footer.php"); ?>
