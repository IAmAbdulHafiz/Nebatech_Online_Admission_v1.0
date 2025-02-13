<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Graphic Design & Digital Arts - Nebatech Software Solution Ltd</title>
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
        <h2 class="course-header">Graphic Design & Digital Arts</h2>
        <p class="text-center lead">Learn the essentials of graphic design and digital arts. This course will teach you how to create stunning designs for various digital platforms using industry-standard software.</p>

        <div class="row">
            <!-- Course Overview -->
            <div class="col-md-8">
                <div class="course-content">
                    <h4 class="section-title">Course Overview</h4>
                    <p>This course is designed to help you develop the skills needed to create high-quality designs for print, web, and multimedia. You'll become proficient in using graphic design software like **Adobe Photoshop**, **Illustrator**, and **InDesign**, while also learning key design principles and techniques.</p>

                    <h5>Key Topics Covered:</h5>
                    <ul>
                        <li>Introduction to Graphic Design and Digital Arts</li>
                        <li>Working with Adobe Photoshop: Image Editing, Retouching, and Manipulation</li>
                        <li>Creating Vector Art with Adobe Illustrator</li>
                        <li>Designing Layouts and Documents with Adobe InDesign</li>
                        <li>Typography: Choosing and Combining Fonts Effectively</li>
                        <li>Color Theory and Branding</li>
                        <li>Designing for Print and Web: Resizing and File Formats</li>
                        <li>Introduction to Motion Graphics and Animation</li>
                    </ul>

                    <h5>Learning Outcomes:</h5>
                    <ul>
                        <li>Master Adobe Photoshop, Illustrator, and InDesign for graphic design and digital arts</li>
                        <li>Understand the principles of visual design, including typography, color theory, and layout</li>
                        <li>Learn how to create logos, brochures, posters, and other marketing materials</li>
                        <li>Gain experience creating digital graphics for websites, social media, and multimedia projects</li>
                        <li>Learn how to apply design principles to branding and visual storytelling</li>
                    </ul>

                    <h5>Course Duration:</h5>
                    <p>This course spans 6 weeks, with each week focusing on a different aspect of graphic design. You will work on hands-on projects and assignments that help you build a professional portfolio for future job opportunities.</p>

                    <h5>Prerequisites:</h5>
                    <p>This course is suitable for beginners with no prior experience in graphic design. However, a basic understanding of computers and an interest in creative design will be helpful. The course will cover everything from the fundamentals of graphic design to more advanced techniques.</p>
                </div>
            </div>

            <!-- Enroll Now Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Enroll Now</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Ready to start your journey in graphic design?</p>
                        <!-- Link to Admission Portal -->
                        <a href="admission_portal.php" class="btn btn-primary">Visit Our Admission Portal</a>
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