<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Video Editing & Production Technology - Nebatech Software Solution Ltd</title>
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
        <h2 class="course-header">Video Editing & Production Technology</h2>
        <p class="text-center lead">Master the art of video editing and production. This course will teach you the skills to create professional video content for various platforms.</p>

        <div class="row">
            <!-- Course Overview -->
            <div class="col-md-8">
                <div class="course-content">
                    <h4 class="section-title">Course Overview</h4>
                    <p>This course is designed to provide you with the essential skills to create and edit high-quality video content. You will learn how to use video editing software like **Adobe Premiere Pro**, **Final Cut Pro**, and other industry-standard tools. By the end of the course, you will be equipped to create professional videos for marketing, social media, entertainment, and more.</p>

                    <h5>Key Topics Covered:</h5>
                    <ul>
                        <li>Introduction to Video Editing Software (Adobe Premiere Pro, Final Cut Pro)</li>
                        <li>Basic Video Editing Techniques: Cutting, Trimming, and Organizing Footage</li>
                        <li>Working with Audio: Sound Design, Music, and Dialogue</li>
                        <li>Advanced Video Editing: Transitions, Effects, and Color Grading</li>
                        <li>Creating Titles, Credits, and Motion Graphics</li>
                        <li>Exporting Videos for Various Platforms (YouTube, Social Media, etc.)</li>
                        <li>Video Production: Lighting, Camera Angles, and Shooting Techniques</li>
                        <li>Post-Production Workflow and Project Management</li>
                    </ul>

                    <h5>Learning Outcomes:</h5>
                    <ul>
                        <li>Master video editing tools and techniques to create professional-quality videos</li>
                        <li>Learn how to manage audio and video elements to enhance your content</li>
                        <li>Understand color grading, transitions, and effects to create dynamic visual content</li>
                        <li>Gain the skills to produce videos for multiple platforms and understand video formats</li>
                        <li>Learn the complete post-production workflow, from footage import to final export</li>
                    </ul>

                    <h5>Course Duration:</h5>
                    <p>This course spans 6 weeks, with each week focused on a different aspect of video editing and production. You’ll have access to hands-on projects, weekly assignments, and tutorials that help you build your video production portfolio.</p>

                    <h5>Prerequisites:</h5>
                    <p>This course is designed for beginners and does not require prior experience in video editing. However, familiarity with basic computer operations and software use is recommended. The course will guide you from basic video editing to more advanced techniques, making it suitable for those looking to start or enhance their video editing career.</p>
                </div>
            </div>

            <!-- Enroll Now Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Enroll Now</h5>
                    </div>
                    <div class="card-body text-center">
                        <p>Ready to start creating amazing videos?</p>
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