<head>
    <style>
        /* Custom Header Background Color */
        .custom-header {
            background-color: rgba(0, 32, 96, 0.9); /* Dark blue */
            color: white;
        }

        /* Topbar Styling */
        .topbar {
            background-color: orange; /* Gold */
            color: #002060; /* Dark blue text */
            padding: 5px 0 0px 20px;
            text-align: center;
            font-size: 0.9em;
            transition: top 0.3s;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }
        .container-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .container-topbar .contact-info,
        .container-topbar .working-hours {
            display: flex;
            gap: 15px;
        }
        /* Login Button Styling */
        .login-btn {
            background-color: #fff; /* White button background */
            color: #002060; /* Dark blue text */
            border: none;
            font-weight: bold;
            padding: 5px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .social-media {
            color: #002060;
            display: flex;
            gap: 15px;
        }
        .social-media-link {
            color: #002060;
        }
        .login-btn:hover {
            background-color: orange; /* Gold on hover */
            color: #002060; /* Dark blue text */
            text-decoration: none;
        }

        /* Hide topbar on scroll */
        .topbar-hidden {
            top: -50px;
        }

        /* Adjust container padding */
        .container-padding {
            padding-top: 50px;
            transition: padding-top 0.3s;
        }

        .container-padding-reduced {
            padding-top: 0;
        }

        /* Hide main header on mobile/tablet view */
        @media (max-width: 768px) {
            .container-topbar .contact-info,
            .container-topbar .working-hours {
                display: none;
            }
            .custom-header .container {
                display: block;
            }
        }
    </style>
</head>

<header class="custom-header fixed-top">
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
                <a class="social-media-link" href="https://facebook.com" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="social-media-link" href="https://twitter.com" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="social-media-link" href="https://linkedin.com" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container container-padding" id="main-container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="assets/images/logo.png" alt="Nebatech Logo" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <!-- Navigation Menu -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                <!--<li class="nav-item">
                        <a class="nav-link" href="admission_portal/admission_.php">Admission</a>
                    </li>-->
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
                        <!-- Custom Styled Login Button -->
                        <a class="btn login-btn btn-sm ms-3" href="admission_portal/admission_portal.php">Admission Portal</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
    // Hide topbar on scroll and adjust container padding
    let lastScrollTop = 0;
    window.addEventListener("scroll", function() {
        let topbar = document.getElementById("topbar");
        let mainContainer = document.getElementById("main-container");
        let st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > lastScrollTop) {
            topbar.classList.add("topbar-hidden");
            mainContainer.classList.add("container-padding-reduced");
        } else {
            topbar.classList.remove("topbar-hidden");
            mainContainer.classList.remove("container-padding-reduced");
        }
        lastScrollTop = st <= 0 ? 0 : st;
    }, false);
</script>
