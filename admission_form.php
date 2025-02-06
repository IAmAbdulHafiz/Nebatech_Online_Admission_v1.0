<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTSS Admission</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .carousel-item {
            height: 100%;
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            filter: brightness(90%); /* Dark overlay effect */
            border-radius: 15px; /* Rounded corners */
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        /* Adjust page content to fit with fixed header and footer */
        body {
            padding-top: 70px; /* Adjust to the height of the header */
            padding-bottom: 60px; /* Adjust to the height of the footer */
        }

        .card-body {
            min-height: 400px; /* Maintain consistent height for the right-side card */
        }
    </style>
</head>

<body>
    <!-- Include Header -->
    <?php include("includes/public_header.php"); ?>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row align-items-center">
            <!-- Left Side: Fading Slideshow -->
            <div class="col-md-6 mb-3 py-4">
                <div id="welcomeCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/welcome1.jpg" alt="Welcome to NTSS" class="d-block w-20">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/welcome2.jpg" alt="Learning Environment" class="d-block w-20">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/welcome3.jpg" alt="Our Community" class="d-block w-20">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Payment Information -->
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h2 class="text-center mb-4" style="color: #002060;">Online Admission Form</h2>
                        <p class="text-center">The fee for the form is <b>GH₵100</b>.</p>
                        <p class="text-center">You must purchase the application form online through this platform.</p>
                        <p class="text-center">Click the button below to proceed with the payment.</p>
                        <div class="text-center mt-4">
                            <a href="payment_form.php" class="btn btn-primary w-100" style="background-color: #002060; border: 1px solid #002060;">Buy Form Now</a>
                        </div>
                        <div class="mt-3 text-center">
                            <p>Continue your application or check admission status. <a href="login.php">Login here.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <!-- Include Footer -->
    <?php include("includes/public_footer.php"); ?>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript for dynamically showing payment instructions
        document.getElementById('paymentMethod').addEventListener('change', function () {
            const instructions = document.getElementById('paymentInstructions');
            const selectedMethod = this.value;
            instructions.classList.remove('d-none');

            let content = '';
            switch (selectedMethod) {
                case 'momo':
                    content = `
                        <h5>MTN MoMo Payment Instructions</h5>
                        <ol>
                            <li>Dial *170#, Choose Option 2 (MoMo Pay)</li>
                            <li>Choose Option 3 and Enter Amount</li>
                            <li>Enter MoMo PIN to Confirm Payment</li>
                            <li>Input Reference: Use “<strong>NTSS form</strong>” and add your first name.</li>
                        </ol>
                    `;
                    break;
                case 'bank':
                    content = `
                        <h5>Bank Payment Instructions</h5>
                        <p>Visit any Zenith Bank Branch to make a deposit into the following account details:</p>
                        <ol>
                            <li>Account Name: <b>Nebatech Software Solution Ltd.</b></li>
                            <li>Account Number: <b>6011119549</b></li>
                            <li>Branch: <b>Tamale Main</b></li>
                            <li>Send the <b>Deposit Slip</b> Picture to us on WhatsApp: 0247636080</li>
                            <li>You will get <b>SERIAL NUMBER & PIN</b>.</li>
                            <li>Use the serial number and pin to apply.</li>
                        </ol>
                    `;
                    break;
                case 'cash':
                    content = `
                        <h5>Cash Payment Instructions</h5>
                        <p>Visit the NTSS Main office in Tamale to make your payment and obtain your <b>SERIAL NUMBER</b> and <b>PIN</b> to proceed with your application.</p>
                    `;
                    break;
                default:
                    content = `<p>Select a payment method to see the instructions.</p>`;
            }

            instructions.innerHTML = content;
        });
    </script>
</body>

</html>
