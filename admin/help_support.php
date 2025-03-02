<?php
// filepath: /C:/xampp/htdocs/GitHub/online-admission-system/admin/help_support.php
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Help & Support</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            padding-top: 100px;
            padding-bottom: 70px;
            background-color: #f4f6f9;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .content{
            margin-left: 250px;
            overflow-y: auto;
        }
        .table-action-btn {
            padding: 5px 10px;
            font-size: 14px;
        }
        .table-action-btn i {
            margin-right: 5px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
            margin-left: 250px;
        }
        /* Responsive layout for mobile screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .content {
                margin-left: 250px;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <h2 class="text-center mb-4">Help & Support</h2>

    <div class="card">
        <div class="card-body">
            <!-- Help Section / FAQs -->
            <h4>Frequently Asked Questions (FAQs)</h4>
            <div class="accordion" id="faqAccordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How do I manage user accounts?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                        <div class="card-body">
                            To manage user accounts, navigate to the "User Management" section in the admin dashboard. Here you can add, edit, or delete user accounts.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How do I generate reports?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                        <div class="card-body">
                            To generate reports, go to the "Reports & Analytics" section in the admin dashboard. You can view and download various reports on application statistics, user activity, and more.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                How do I contact technical support?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                        <div class="card-body">
                            If you need technical support, please use the contact form below to reach out to our support team. We will get back to you as soon as possible.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form for Technical Support -->
            <h4 class="mt-4">Contact Technical Support</h4>
            <form action="send_support_request.php" method="POST">
                <div class="form-group">
                    <label for="supportEmail">Email address</label>
                    <input type="email" class="form-control" id="supportEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="supportSubject">Subject</label>
                    <input type="text" class="form-control" id="supportSubject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="supportMessage">Message</label>
                    <textarea class="form-control" id="supportMessage" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
<script src="../assets/js/jquery-3.7.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>