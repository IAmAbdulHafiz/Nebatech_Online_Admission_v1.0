<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - NTSS</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .faq-header {
            background-color: #002060;
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        .faq-section {
            padding: 40px 0;
        }

        .faq-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .faq-card .card-header {
            background-color: #f9f9f9;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php include("includes/public_header.php"); ?>

    <!-- Page Header -->
    <div class="faq-header">
        <h1>Frequently Asked Questions</h1>
        <p>Find answers to the most commonly asked questions about our programs, admissions, and more.</p>
    </div>

    <!-- FAQs Section -->
    <div class="container faq-section">
        <div class="accordion" id="faqAccordion">

            <!-- Question 1 -->
            <div class="card faq-card">
                <div class="card-header" id="faqHeading1">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                            What programs are offered at NTSS?
                        </button>
                    </h2>
                </div>
                <div id="faqCollapse1" class="collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                    <div class="card-body">
                        NTSS offers a wide range of programs, including Front-End Development, Back-End Development, Full-Stack Development, Database Management, Digital Literacy, and more.
                    </div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="card faq-card">
                <div class="card-header" id="faqHeading2">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                            How can I apply for admission?
                        </button>
                    </h2>
                </div>
                <div id="faqCollapse2" class="collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                    <div class="card-body">
                        You can apply online by purchasing an admission form, completing the application, and submitting all required documents through our admission portal.
                    </div>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="card faq-card">
                <div class="card-header" id="faqHeading3">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                            What are the payment options for the admission form?
                        </button>
                    </h2>
                </div>
                <div id="faqCollapse3" class="collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                    <div class="card-body">
                        Payment can be made using MTN MoMo, bank transfer, or cash payment at our office. Details are available on the payment page.
                    </div>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="card faq-card">
                <div class="card-header" id="faqHeading4">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                            Can I apply for multiple programs?
                        </button>
                    </h2>
                </div>
                <div id="faqCollapse4" class="collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                    <div class="card-body">
                        Yes, applicants can select up to three programs during the application process.
                    </div>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="card faq-card">
                <div class="card-header" id="faqHeading5">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5">
                            How do I check my admission status?
                        </button>
                    </h2>
                </div>
                <div id="faqCollapse5" class="collapse" aria-labelledby="faqHeading5" data-bs-parent="#faqAccordion">
                    <div class="card-body">
                        Applicants can log in to their dashboard using their registered email and password to check their admission status and print the admission letter.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include("footer.php"); ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
