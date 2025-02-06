<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

    <?php include("includes/public_header.php"); ?>

    <div class="content mt-5">
    <!-- Hero Section -->
    <div class="hero-section text-center">
        <div class="overlay"></div>
        <div class="content">
            <h1 class="hero-text" style="font-size: 3em;">Welcome to Nebatech Software Solution Ltd</h1>
            <p>Empowering businesses and individuals with cutting-edge technology solutions.</p>
            <a href="contact.php" class="btn btn-light btn-lg">Get In Touch</a>
        </div>
    </div>

    <!-- About Section -->
    <div class="container text-center mt-5">
        <h2>About Us</h2>
        <p class="lead text-start">
            At Nebatech Software Solution Ltd, we specialize in developing innovative software solutions tailored to businesses' and individuals' needs. Our team is dedicated to delivering high-quality, secure, and scalable applications to enhance productivity and drive digital transformation.
        </p>
    </div>

    <!-- Services Section -->
    <div class="container services-section">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-code fa-3x mb-3" style="color: #002060"></i>
                        <h5 class="card-title">Software Development</h5>
                        <p class="card-text">Custom software solutions tailored to your business needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-laptop fa-3x mb-3" style="color: #002060"></i>
                        <h5 class="card-title">IT Consultancy</h5>
                        <p class="card-text">Expert guidance to optimize your IT infrastructure and strategy.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-chalkboard-teacher fa-3x mb-3" style="color: #002060"></i>
                        <h5 class="card-title">Training & Capacity Building</h5>
                        <p class="card-text">Hands-on training to equip individuals with in-demand tech skills.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Section -->
    <div class="container mt-5">
        <h2 class="text-center">Our Portfolio</h2>
        <p class="text-center">Some of the projects we have successfully delivered.</p>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/images/project1.jpg" class="card-img-top" alt="Project 1">
                    <div class="card-body">
                        <h5 class="card-title">Project 1</h5>
                        <p class="card-text">A brief description of the project.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/images/project2.jpg" class="card-img-top" alt="Project 2">
                    <div class="card-body">
                        <h5 class="card-title">Project 2</h5>
                        <p class="card-text">A brief description of the project.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/images/project3.jpg" class="card-img-top" alt="Project 3">
                    <div class="card-body">
                        <h5 class="card-title">Project 3</h5>
                        <p class="card-text">A brief description of the project.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container text-center mt-5 contact-section">
        <h2>Contact Us</h2>
        <p class="lead">Have a project in mind? Let's discuss how we can help you achieve your goals.</p>
        <a href="contact.php" class="btn btn-primary btn-lg">Contact Us</a>
    </div>
</div>

    <?php include("includes/footer.php"); ?>
</body>
</html>