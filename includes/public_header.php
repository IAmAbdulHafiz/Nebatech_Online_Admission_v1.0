<head>
    <style>
        /* Custom Header Background Color */
        .custom-header {
            background-color: #002060; /* Dark blue */
            color: white;
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

        .login-btn:hover {
            background-color: #FFD700; /* Gold on hover */
            color: #002060; /* Dark blue text */
            text-decoration: none;
        }
    </style>
</head>

<header class="custom-header fixed-top">
    <div class="container">
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
                    <li class="nav-item">
                        <a class="nav-link" href="admission.php">Admission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programs.php">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <!-- Custom Styled Login Button -->
                        <a class="btn login-btn btn-sm ms-3" href="admin/login.php">Student Portal</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
