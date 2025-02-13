<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Blog - Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .blog-section {
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
        .section-title {
            color: orange;
        }
        @media (max-width: 768px) {
            .blog-section {
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
<div class="content">
    <div class="container mt-5 blog-section">
        <!-- Blogs Section -->
        <h2 class="text-center section-title">Blogs</h2>
        <p class="text-center lead">Read through our insightful blog posts on various topics related to technology, business, and more:</p>

        <div class="row mt-5">
            <!-- Blog 1 -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">The Power of Custom Mobile Apps: How They Can Transform Your Business</h5>
                        <p class="card-text">In today's digital age, mobile applications are more than just a convenience – they can be a game changer for businesses. At Nebatech, we specialize in creating custom mobile apps tailored to your business needs. Whether you're looking to enhance customer engagement, streamline operations, or expand your market reach, a well-designed mobile app can be the key to success.</p>
                        <ul>
                            <li>Enhanced User Experience: Custom apps allow businesses to create personalized experiences for their users.</li>
                            <li>Improved Efficiency: Apps can streamline tasks like booking, purchasing, and customer support.</li>
                            <li>Data Collection: Apps help collect valuable insights into user behavior, which can be used for smarter business decisions.</li>
                        </ul>
                        <a href="custom-mobile-apps-blog.php" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Blog 2 -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Why Every Business Needs a Responsive Website: The Role of Web Design in Business Growth</h5>
                        <p class="card-text">In today’s competitive digital landscape, having an attractive and functional website is more important than ever. But it's not just about having any website – it's about having a responsive website that adapts to different devices.</p>
                        <ul>
                            <li>User Experience: A responsive site ensures visitors have a smooth experience, leading to higher conversion rates.</li>
                            <li>SEO Benefits: Google prioritizes mobile-friendly websites, which can improve your search engine ranking.</li>
                            <li>Cost-Efficiency: A responsive design saves you time and money, avoiding the need for separate desktop and mobile sites.</li>
                        </ul>
                        <a href="responsive-web-design-blog.php" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- More Blogs Section -->
        <h2 class="text-center section-title mt-5">More Blogs</h2>
        <p class="text-center lead">Learn about other important topics to help you stay ahead in the digital world:</p>

        <div class="row mt-5">
            <!-- Blog 3 -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">The Importance of Network Security for Your Business</h5>
                        <p class="card-text">As more businesses move online, ensuring your network is secure has never been more important. A single data breach can have severe consequences, including loss of customer trust, financial penalties, and even a damaged reputation.</p>
                        <ul>
                            <li>Common Network Security Risks: What hackers are after and how they target businesses.</li>
                            <li>Best Practices for Network Security: Simple steps like firewalls, secure passwords, and encryption.</li>
                            <li>Why You Need Expert Help: Ensuring network security requires professional expertise.</li>
                        </ul>
                        <a href="network-security-blog.php" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Blog 4 -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">How Barcode Systems Are Revolutionizing Inventory Management</h5>
                        <p class="card-text">Inventory management can be a complex and time-consuming task. With barcode systems, businesses can automate and streamline inventory tracking, ensuring accuracy and efficiency.</p>
                        <ul>
                            <li>What Is a Barcode System?: A simple explanation of how barcode systems work in inventory management.</li>
                            <li>Benefits for Businesses: Reducing human errors, improving stock control, and speeding up the checkout process.</li>
                            <li>Custom Solutions for Your Business: How Nebatech designs barcode systems tailored to your needs.</li>
                        </ul>
                        <a href="barcode-system-blog.php" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/public_footer.php"); ?>

</body>
</html>
