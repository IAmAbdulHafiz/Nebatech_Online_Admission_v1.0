<head>
    <style>
        /*header styling*/
        .custom-header {
            background-color: rgba(0, 32, 96, 0.95); /* Dark blue */
            color: white;
            position: fixed;
            top: 25px;
            width: 100%;
            height: 70px;
            z-index: 1000;
            transition: top 0.3s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .topbar {
            background-color: orange; /* Gold */
            color: #002060; /* Dark blue text */
            padding: 2px 50px;
            text-align: center;
            font-size: 0.9em;
            position: fixed;
            width: 100%;
            height: 30px;
            z-index: 1001; /* Higher than .custom-header */
            top: 0;
            transition: top 0.3s ease-in-out;
        }

        .container-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            flex-wrap: wrap;
        }

        .contact-info,
        .working-hours {
            display: flex;
            gap: 15px;
        }

        .login-btn {
            background-color: #fff; /* White button background */
            color: #002060; /* Dark blue text */
            border: none;
            font-weight: bold;
            padding: 5px 15px;
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .login-btn:hover {
            background-color: orange; /* Gold on hover */
            color: #002060;
            text-decoration: none;
        }

        .social-media {
            display: flex;
            gap: 15px;
        }

        .social-media-link {
            color: #002060;
        }

        .topbar-hidden {
            top: -50px;
        }

        .container-padding {
            padding-top: 0px; /* Prevent content overlap */
        }

        .nav-link {
            color: white !important;
            padding: 10px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            border-bottom: 1px solid #FFA500;
            color: #fff !important;
        }

        .nav-item .active {
            border-bottom: 1px solid #FFA500 !important;
            color: #fff !important;
            font-weight: bold;
            box-shadow: 0px 2px 0px rgba(255, 165, 0, 0.9);
        }

        /* Login Button Styling */
        .login-btn {
            background-color: #fff; /* White button background */
            color: #002060; /* Dark blue text */
            border: none;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .login-btn:hover {
            background-color:orange; /* Gold on hover */
            color: #002060; /* Dark blue text */
            text-decoration: none;
        }
        /* header styling ends */
    </style>
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
            <a class="social-media-link" href="https://web.facebook.com/nebatechsoftware" target="_blank" aria-label="Facebook">
                <i class="fab fa-facebook"></i>
            </a>
            <a class="social-media-link" href="https://twitter.com/nebatechSS" target="_blank" aria-label="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="social-media-link" href="https://www.linkedin.com/company/nebatech/" target="_blank" aria-label="LinkedIn">
                <i class="fab fa-linkedin"></i>
            </a>
            <a class="social-media-link" href="https://www.instagram.com/nebatechsoftwaresolution/" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>
</div>

<header class="custom-header" style="box-shadow: 4px 2px 10px rgba(0, 0, 0, 0.5);">
    <div class="container container-padding" id="main-container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="../assets/images/logo.png" alt="Nebatech Logo" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../programmes.php">Programmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../projects.php">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../blog.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../faq.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn login-btn btn-sm ms-3" href="../admission/admission_portal.php">Admission Portal</a>
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
