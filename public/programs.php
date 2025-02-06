<?php
// Mocked program data (replace with a database query if needed)
$programs = [
    [
        'name' => 'Introduction to Artificial Intelligence',
        'description' => 'A beginner-friendly course introducing the basics of AI and its applications.',
        'fee' => 'GH₵ 400',
        'duration' => '4 Weeks',
        'image' => 'assets/images/program_ai.jpg'
    ],
    [
        'name' => 'Front-End Development',
        'description' => 'Learn how to build stunning and responsive web interfaces with HTML, CSS, and JavaScript.',
        'fee' => 'GH₵ 3,500',
        'duration' => '12 Weeks',
        'image' => 'assets/images/program_frontend.jpg'
    ],
    [
        'name' => 'Back-End Development',
        'description' => 'Master server-side development and database management with this comprehensive course.',
        'fee' => 'GH₵ 4,500',
        'duration' => '12 Weeks',
        'image' => 'assets/images/program_backend.jpg'
    ],
    [
        'name' => 'Full-Stack Development',
        'description' => 'Become a complete developer by mastering both front-end and back-end technologies.',
        'fee' => 'GH₵ 7,000',
        'duration' => '24 Weeks',
        'image' => 'assets/images/program_fullstack.jpg'
    ],
    [
        'name' => 'Graphic Design & Digital Arts',
        'description' => 'Explore your creativity with advanced tools and techniques for professional graphic design.',
        'fee' => 'GH₵ 3,200',
        'duration' => '10 Weeks',
        'image' => 'assets/images/program_graphics.jpg'
    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTSS - Programs</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        }
        .program-card img {
            height: 200px;
            object-fit: cover;
        }

        .program-header {
            background-color: #002060;
            color: white;
            padding: 40px;
            padding-top:100px;
            text-align: center;
        }

        .contact-section {
            background-color: #f9f9f9;
            padding: 40px 0;
        }
    </style>
</head>

<body>
    <?php include("includes/public_header.php"); ?>

    <!-- Page Header -->
    <div class="program-header">
        <h1>Our Programs</h1>
        <p>Explore our range of programs designed to help you achieve your goals.</p>
    </div>

    <!-- Programs Section -->
    <div class="container mt-5">
        <div class="row">
            <?php foreach ($programs as $program): ?>
                <div class="col-md-4 mb-4">
                    <div class="card program-card">
                        <img src="<?= $program['image'] ?>" class="card-img-top" alt="<?= $program['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $program['name'] ?></h5>
                            <p class="card-text"><?= $program['description'] ?></p>
                            <p><strong>Fee:</strong> <?= $program['fee'] ?></p>
                            <p><strong>Duration:</strong> <?= $program['duration'] ?></p>
                            <a href="contact.php" class="btn btn-primary w-100">Contact Us</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="contact-section text-center">
        <h2>Need Help Choosing a Program?</h2>
        <p>Contact us to discuss which program is right for you.</p>
        <a href="contact.php" class="btn btn-primary">Contact Us</a>
    </div>

    <?php include("includes/public_footer.php"); ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
