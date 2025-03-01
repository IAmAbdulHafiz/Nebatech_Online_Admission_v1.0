<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEBATECH - Online Admission</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/images/favicon.ico">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #002060;
            --secondary-color: #FFA500;
            --text-color: #333;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Hero Section */
        .welcome-section {
            position: relative;
            height: 100vh;
            background: linear-gradient(rgba(0, 32, 96, 0.8), rgba(0, 32, 96, 0.9)),
                        url('../assets/images/welcome2.JPG') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 2rem;
        }

        .welcome-text {
            padding-top: 100px;
            font-size: 4.5em;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .welcome-btn {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            padding: 0.7rem 2.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .welcome-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            background-color: #fff;
            color: #002060;
        }

        /* Welcome Message */
        .welcome-message {
            padding: 5rem 0;
            background-color: var(--light-bg);
        }
        
        /* Accommodation Notice Section */
        .accommodation-notice {
            padding: 2rem 0;
            background-color: var(--light-bg);
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-icon {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .list-item {
            margin-bottom: 1rem;
            display: flex;
            align-items: start;
            gap: 0.5rem;
        }

        .list-icon {
            color: #28a745;
            flex-shrink: 0;
            margin-top: 0.25rem;
        }

        /* Student Handbook */
        .student-handbook {
            background-color: var(--primary-color);
            color: white;
            border-radius: 0.5rem;
            margin: 3rem 0;
            padding: 3rem !important;
        }

        .download-btn {
            background-color: white;
            color: var(--primary-color);
            border: none;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .download-btn:hover {
            background-color: var(--secondary-color);
            color: white;
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .welcome-section {
                height: 90vh;
                padding-top: 100px;
            }
            
            .card {
                margin-bottom: 2rem;
            }
            .welcome-text {
                height: auto;
                font-size: 3em;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include("includes/header_potal_login.php"); ?>
    <!-- Hero Section -->
    <section class="welcome-section">
        <div class="container">
            <h1 class="welcome-text" data-aos="fade-up" id="typed-text"></h1>
            <p class="lead mb-4" data-aos="fade-up" data-aos-delay="200">
                Where technology meets innovation and learning fosters transformation.
            </p>
            <a href="admission_form.php" class="btn welcome-btn" data-aos="fade-up" data-aos-delay="400">
                Get Started
            </a>
        </div>
    </section>

    <!-- Welcome Message -->
    <section class="welcome-message">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Welcome Message</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white p-5 rounded-3 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                        <p class="lead">
                            Dear Learner,<br><br>
                            Welcome to Nebatech Software Solution Ltd, where technology meets innovation and learning fosters transformation. 
                            We are thrilled to have you join our growing community of passionate learners and professionals dedicated to 
                            leveraging technology for impact and excellence.<br><br>
                            
                            At Nebatech, we believe in your potential to innovate and create a better future through technology. With our 
                            competence base training programs, exceptional faculty, and supportive community, we are committed to equipping 
                            you with the knowledge, skills, and tools needed to excel in today's fast-evolving digital world.<br><br>
                            
                            We also want to express our gratitude to our investor, <strong>Mr. Rafik Fuseini</strong>, for believing in 
                            our vision and supporting our growth. Additionally, we extend our heartfelt appreciation to <strong>Alhaj Dr. 
                            Tanko Mohammed</strong>, a valued member of our Board of Advisory, and <strong>Mr. Awal Fuseini</strong>, 
                            who serves as the Board Advisor Secretary, for their immense contributions toward the success of Nebatech 
                            Software Solution Ltd.<br><br>
                            
                            Warm regards,<br>
                            <strong>Abdul-Hafiz Yussif</strong><br>
                            Founder & CEO, Nebatech Software Solution Ltd.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Accommodation Notice Section -->
    <section class="accommodation-notice">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Important Notice</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white p-5 rounded-3 shadow-sm">
                        <p class="lead">
                            Please note that Nebatech is solely a training hub and does not provide accommodation or boarding facilities for learners coming from far away. We kindly advise that you make your own arrangements for lodging.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Admission Requirements -->
                <div class="col-md-6 mb-4" data-aos="fade-right">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <i class="fas fa-user-graduate fa-4x card-icon"></i>
                                <h3 class="card-title mt-4">Admission Requirements</h3>
                            </div>
                            <div class="card-text">
                                <p class="text-center mb-4">To enroll in any of our programs, students must meet the following requirements:</p>
                                <div class="list-items">
                                    <div class="list-item">
                                        <i class="fas fa-check-circle list-icon"></i>
                                        <span>Basic literacy and numeracy skills (minimum JHS certificate)</span>
                                    </div>
                                    <div class="list-item">
                                        <i class="fas fa-check-circle list-icon"></i>
                                        <span>A passion for technology and a commitment to learning</span>
                                    </div>
                                    <div class="list-item">
                                        <i class="fas fa-check-circle list-icon"></i>
                                        <span>Access to a laptop is highly recommended for technical programs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Learning Tools -->
                <div class="col-md-6 mb-4" data-aos="fade-left">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <i class="fas fa-book-open fa-4x card-icon"></i>
                                <h3 class="card-title mt-4">Learning Tools and Resources</h3>
                            </div>
                            <div class="card-text">
                                <p class="text-center mb-4">Nebatech provides the following tools and resources to enhance your learning experience:</p>
                                <div class="list-items">
                                    <div class="list-item">
                                        <i class="fas fa-check-circle list-icon"></i>
                                        <span>Modern Classroom with high-speed internet</span>
                                    </div>
                                    <div class="list-item">
                                        <i class="fas fa-check-circle list-icon"></i>
                                        <span>Free Wi-Fi for research and assignments</span>
                                    </div>
                                    <div class="list-item">
                                        <i class="fas fa-check-circle list-icon"></i>
                                        <span>Access to licensed software and tools relevant to your program</span>
                                    </div>
                                    <div class="list-item">
                                        <i class="fas fa-check-circle list-icon"></i>
                                        <span>Study guides, e-books, and video tutorials for each course</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Handbook -->
            <div class="student-handbook text-center" data-aos="fade-up">
                <h3 class="mb-4">Student Handbook</h3>
                <p class="lead mb-4">For more information on our programs, admission requirements, and policies, please download our Student Handbook.</p>
                <a href="../downloads/student_handbook.pdf" class="btn download-btn">
                    <i class="fas fa-file-pdf me-2"></i> Download Student Handbook
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("../includes/footer.php"); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Typed.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Initialize Typed.js
        new Typed("#typed-text", {
            strings: [
                "Welcome to Nebatech Admission Portal",
                "Introduction to Artificial Intelligence",
                "Basic AI in Machine Learning",
                "Front-End Development",
                "Back-End Development",
                "Database Management and Administration",
                "Cybersecurity and Ethical Hacking",
                "Microsoft Office Suite Mastery",
                "Video Editing and Production",
                "Graphic Design and Digital Art",
                "Digital Literacy and Online Safety",
            ],
            typeSpeed: 100,
            backSpeed: 25,
            startDelay: 500,
            backDelay: 1500,
            loop: true,
            showCursor: true
        });
    </script>
</body>
</html>
