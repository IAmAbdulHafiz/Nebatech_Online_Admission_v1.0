<?php 
session_start();
if (!isset($_SESSION['applicant'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$applicant = $_SESSION['applicant'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $email = htmlspecialchars($applicant['email']);

    // Send email to support (example)
    $to = 'support@nebatech.com';
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $body = "<p><strong>From:</strong> $email</p>
             <p><strong>Subject:</strong> $subject</p>
             <p><strong>Message:</strong><br>$message</p>";

    if (mail($to, $subject, $body, $headers)) {
        $success = "Your message has been sent successfully.";
    } else {
        $error = "There was an error sending your message. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Support - Nebatech Admissions</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <style>
    body {
      background: #f8f9fa;
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column;
    }
    /* Main content: desktop has a 250px left margin; mobile, the sidebar overlaps */
    .main-content {
      margin-left: 250px;
      padding: 20px;
      position: relative;
      z-index: 1;
      flex: 1;
    }
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
      }
    }
    /* Content container styling */
    .content {
      padding: 20px;
      max-width: 600px;
      margin: auto;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <?php include("includes/header.php"); ?>
  <?php include("includes/sidebar.php"); ?>

  <div class="main-content">
    <div class="content">
      <h2 class="mb-3 text-center">Contact Support</h2>
      <?php if (isset($success)): ?>
          <div class="alert alert-success"><?= $success ?></div>
      <?php elseif (isset($error)): ?>
          <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>
      <form id="contactForm" action="contact_support.php" method="post" novalidate>
          <div class="mb-3">
              <label for="subject" class="form-label">Subject *</label>
              <input type="text" id="subject" name="subject" class="form-control" required>
              <div class="invalid-feedback">
                  Please enter a subject.
              </div>
          </div>
          <div class="mb-3">
              <label for="message" class="form-label">Message *</label>
              <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
              <div class="invalid-feedback">
                  Please enter your message.
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Send Message</button>
      </form>
    </div>
  </div>

  <?php include("../includes/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Bootstrap client-side form validation
    (function () {
      'use strict'
      const form = document.getElementById('contactForm');
      form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
          }
          form.classList.add('was-validated');
      }, false);
    })();
  </script>
</body>
</html>