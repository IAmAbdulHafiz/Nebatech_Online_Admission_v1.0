<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Our Projects - Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .projects-section {
            padding: 100px 0;
        }
        .lead{
            margin-left: 1rem;
            margin-right: 1rem;
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
        .project-image {
            width: 100%;
            height: 200px;
            background-color: #f0f0f0;
            margin-bottom: 1rem;
        }
        /* Responsive styling */
        @media (max-width: 768px) {
            .projects-section {
                padding: 100px 0;
            }
            .card {
                margin-left: 1rem;
                margin-right: 1rem;
            }
            .card-body {
                padding: 1rem;
            }
            .card-title {
                font-size: 1.2rem;
            }
            .card-text {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

    <?php include("includes/public_header.php"); ?>

    <div class="container mt-5 projects-section">
        <h2 class="text-center" style="color: orange;">Our Accomplished Projects</h2>
        <p class="text-center lead">We have successfully completed numerous projects that have helped businesses grow and improve their operations. Here are some of the key projects we've worked on:</p>

        <!-- Projects List -->
        <div class="row mt-5">
            <!-- Project 1: Website Development Projects -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="project-image">
                        <!-- Image placeholder for Website Development -->
                        <img src="assets/images/website-development.jpg" alt="Website Development" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Website Development Projects</h5>
                        <p class="card-text">
                            <strong>Corporate Websites:</strong> Developed several corporate websites for businesses, ensuring they are responsive and user-friendly.<br>
                            <strong>E-commerce Websites:</strong> Developed e-commerce platforms with integrated payment gateways for online shopping.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Project 2: Mobile Application Development -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="project-image">
                        <!-- Image placeholder for Mobile App Development -->
                        <img src="assets/images/mobile-app-development.jpg" alt="Mobile App Development" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Mobile Application Development</h5>
                        <p class="card-text">
                            <strong>Custom Mobile Apps:</strong> Built Android and iOS apps tailored to specific business needs, providing seamless user experiences and robust functionality.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Project 3: POS and Inventory Management System -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="project-image">
                        <!-- Image placeholder for POS and Inventory Management -->
                        <img src="assets/images/pos-inventory-system.jpg" alt="POS and Inventory Management System" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">POS and Inventory Management System</h5>
                        <p class="card-text">
                            <strong>POS Systems:</strong> Designed and implemented Point of Sale (POS) systems for local businesses, ensuring efficient transactions and accurate stock management.<br>
                            <strong>Inventory Management:</strong> Developed inventory tracking solutions to help businesses manage their stock, sales, and orders effectively.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Project 4: CCTV Camera Installation -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="project-image">
                        <!-- Image placeholder for CCTV Installation -->
                        <img src="assets/images/cctv-installation.jpg" alt="CCTV Camera Installation" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">CCTV Camera Installation</h5>
                        <p class="card-text">
                            <strong>Security Systems:</strong> Installed and set up CCTV systems for various clients, ensuring their homes and businesses are secure.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Project 5: IT Infrastructure Setup -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="project-image">
                        <!-- Image placeholder for IT Infrastructure -->
                        <img src="assets/images/it-infrastructure.jpg" alt="IT Infrastructure Setup" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">IT Infrastructure Setup</h5>
                        <p class="card-text">
                            <strong>Network Installations:</strong> Successfully completed the installation of network infrastructures for several businesses, ensuring reliable and secure internet connectivity.<br>
                            <strong>Troubleshooting & Maintenance:</strong> Provided troubleshooting and maintenance services to improve network performance for organizations.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Project 6: Barcode Generator System for Truandrew Natural Market -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="project-image">
                        <!-- Image placeholder for Barcode Generator System -->
                        <img src="assets/images/barcode-generator.jpg" alt="Barcode Generator System" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Barcode Generator System for Truandrew Natural Market</h5>
                        <p class="card-text">
                            <strong>Barcode System:</strong> Developed a custom Barcode Generator system for Truandrew Natural Market to streamline product labeling and improve inventory management.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Project 7: AI and Machine Learning Projects -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="project-image">
                        <!-- Image placeholder for AI and Machine Learning -->
                        <img src="assets/images/ai-machine-learning.jpg" alt="AI and Machine Learning Projects" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">AI and Machine Learning Projects</h5>
                        <p class="card-text">
                            <strong>AI-Based Solutions:</strong> Developed AI-based applications to help businesses integrate intelligent systems into their processes for enhanced efficiency and productivity.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/public_footer.php"); ?>

</body>
</html>
