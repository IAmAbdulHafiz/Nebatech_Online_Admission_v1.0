<head>
    <link rel="stylesheet" href="assets/css/stylesheet.css">
</head>

<div class="topbar" id="topbar">
    <div class="container-topbar">
        <div class="contact-info">
            <span><i class="fas fa-phone-alt"></i> 0247636080 | 0206789600 | 0249241156</span>
            <span><i class="fas fa-envelope"></i> info@nebatech.com</span>
        </div>
        <div class="working-hours">
            <span><i class="fas fa-clock"></i> Mon-Fri: 8:00am - 6:00pm</span>
        </div>
        <div class="social-media">
            <a class="social-media-link" href="https://facebook.com" target="_blank" aria-label="Facebook">
                <i class="fab fa-facebook"></i>
            </a>
            <a class="social-media-link" href="https://twitter.com" target="_blank" aria-label="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="social-media-link" href="https://linkedin.com" target="_blank" aria-label="LinkedIn">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </div>
</div>

<header class="custom-header" style="box-shadow: 4px 2px 10px rgba(0, 0, 0, 0.5);">
    <div class="container container-padding" id="main-container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="assets/images/logo.png" alt="Nebatech Logo" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programmes.php">Programmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="projects.php">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn login-btn btn-sm ms-3" href="admission_portal/admission_portal.php">Admission Portal</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
    // Hide topbar on scroll
    let lastScrollTop = 0;
    window.addEventListener("scroll", function () {
        let topbar = document.getElementById("topbar");
        let header = document.querySelector(".custom-header");
        let st = window.pageYOffset || document.documentElement.scrollTop;

        if (st > lastScrollTop && st > 50) {
            topbar.classList.add("topbar-hidden");
            header.style.top = "0"; // Fix the header at the top
        } else {
            topbar.classList.remove("topbar-hidden");
            header.style.top = "25px"; // Move header down when topbar is visible
        }
        lastScrollTop = st <= 0 ? 0 : st;
    });


    // Set active class dynamically based on current page URL
    document.addEventListener("DOMContentLoaded", function () {
        let navLinks = document.querySelectorAll(".nav-link");
        let currentUrl = window.location.pathname.split("/").pop();

        navLinks.forEach(link => {
            if (link.getAttribute("href") === currentUrl || (currentUrl === "" && link.getAttribute("href") === "index.php")) {
                link.classList.add("active");
            }
        });
    });
</script>
