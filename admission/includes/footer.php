<footer class="text-white py-3" style="background: #002060; box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.5);">
    <div class="container">
        <div class="row align-items-center">
            <!-- Social Media Links -->
            <div class="col-12 col-md-3 text-center text-md-start mb-2 mb-md-0">
                <a href="https://web.facebook.com/nebatechsoftware" target="_blank" style="text-decoration: none; color: white; margin-right: 15px;">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://twitter.com/nebatechSS" target="_blank" style="text-decoration: none; color: white; margin-right: 15px;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/company/nebatech/" target="_blank" style="text-decoration: none; color: white; margin-right: 15px;">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://www.instagram.com/nebatechsoftwaresolution/" target="_blank" style="text-decoration: none; color: white;">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>

            <!-- Footer Text -->
            <div class="col-12 col-md-6 text-center mb-2 mb-md-0">
                <p class="mb-0">&copy; 2019-<?php echo date('Y'); ?> Nebatech Software Solution Ltd. All Rights Reserved.</p>
            </div>

            <!-- System Version -->
            <div class="col-12 col-md-3 text-center text-md-end">
                <p class="mb-0">v3.2.0</p>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.getElementById('sidebar');
      const toggleBtn = document.getElementById('sidebarToggle');

      toggleBtn.addEventListener('click', function () {
          const currentLeft = window.getComputedStyle(sidebar).left;
          if (currentLeft === '0px') {
              sidebar.style.left = '-250px';
              toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
          } else {
              sidebar.style.left = '0px';
              toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
          }
      });
  });
</script>

<!-- Place this at the end of your dashboard page, after including header and sidebar -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include Font Awesome for social media icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="../assets/js/jquery-3.7.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>