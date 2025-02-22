// Header Scroll Behavior
let lastScrollTop = 0;
const topbar = document.getElementById('topbar');
const mainHeader = document.getElementById('main-header');

window.addEventListener('scroll', function() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
    
    // Topbar hide/show logic
    if (currentScroll > lastScrollTop && currentScroll > 50) {
        topbar.classList.add('topbar-hidden');
        mainHeader.style.top = '0';
    } else {
        topbar.classList.remove('topbar-hidden');
        mainHeader.style.top = topbar.offsetHeight + 'px';
    }
    
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
});

// Active Navigation Link
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const currentPage = window.location.pathname.split('/').pop() || 'index.php';

    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        }
    });
});

// Mobile Menu Animation
const navbarToggler = document.querySelector('.navbar-toggler');
const navbarCollapse = document.querySelector('.navbar-collapse');

navbarToggler.addEventListener('click', function() {
    this.classList.toggle('active');
});

// Smooth Scroll for Navigation Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});