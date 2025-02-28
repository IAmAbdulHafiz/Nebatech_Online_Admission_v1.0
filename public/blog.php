<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Read through our insightful blog posts on various topics related to technology, business, and more.">
    <meta name="keywords" content="Blog, Technology Blog, Business Blog, Blog Posts, Blog Topics, Blog Articles, Blog Insights, Blog Read, Blog Information, Blog Technology, Blog Business, Blog Posts, Blog Topics, Blog Articles, Blog Insights, Blog Read, Blog Information, Blog Technology, Blog Business">
    <meta name="author" content="Nebatech Software Solution Ltd">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="../assets/images/favicon.ico">
    <title>Updates & Events - Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        /* Header styles */
        .hero {
            background: linear-gradient(rgba(0, 32, 96, 0.9), rgba(0, 32, 96, 0.9)),url('../assets/images/hero_bg1.JPG');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 7rem 2rem; /* Reduced padding */
            text-align: center;
            margin-bottom: 0;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* Category filters */
        .filters {
            padding: 2rem 0;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .filter-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 25px;
            background: #f0f0f0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #002060;
            color: white;
        }

        /* Events grid */
        .events-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .event-card {
            background: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-5px);
        }

        .event-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .event-content {
            padding: 1.5rem;
        }

        .event-category {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: #e5e7eb;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .event-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #002060;
        }

        .event-date {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .event-description {
            color: #4b5563;
            margin-bottom: 1.5rem;
        }

        .cta-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #002060;
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: background 0.3s ease;
        }

        .cta-button:hover {
            background: #FFA500;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .events-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include("includes/public_header.php"); ?>
    <header class="hero">
        <h1>Nebatech Updates & Events</h1>
        <p>Stay updated with the latest news, events, and innovations from Nebatech Software Solution Ltd.</p>
    </header>

    <section class="filters">
        <div class="filter-container">
            <button class="filter-btn active" data-category="all">All</button>
            <button class="filter-btn" data-category="company">🏢 Company News</button>
            <button class="filter-btn" data-category="tech">🔬 Tech Insights</button>
            <button class="filter-btn" data-category="events">🎓 Events & Workshops</button>
            <button class="filter-btn" data-category="success">🌟 Success Stories</button>
        </div>
    </section>

    <main class="events-container">
    <!-- Event Card: New Location Announcement -->
    <article class="event-card" data-category="company">
        <img src="https://images.unsplash.com/photo-1593642532400-2682810df593?auto=format&fit=crop&q=80" alt="Nebatech New Location in Tamale" class="event-image">
        <div class="event-content">
            <span class="event-category">🏢 Company News</span>
            <h2 class="event-title">Now Operating from Choggu Yapalsi, Tamale</h2>
            <p class="event-date">🗓 February 5, 2025</p>
            <p class="event-description">
                We are excited to announce that Nebatech has moved to our new location at Choggu Yapalsi, Tamale. Operations have officially started!
            </p>
            <a href="#" class="cta-button">Read More</a>
        </div>
    </article>

    <!-- Event Card: New Courses Launch -->
    <article class="event-card" data-category="success">
        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80" alt="New Courses Launch" class="event-image">
        <div class="event-content">
            <span class="event-category">🌟 Success Stories</span>
            <h2 class="event-title">Launch of New Courses</h2>
            <p class="event-date">🗓 February 10, 2025</p>
            <p class="event-description">
                We are proud to introduce our new courses: Introduction to AI, Basic AI in Machine Learning, and iPhone & Computer Hardware Technician. Enroll now to upgrade your skills!
            </p>
            <a href="#" class="cta-button">Learn More</a>
        </div>
    </article>

    <!-- Event Card: Additional Services -->
    <article class="event-card" data-category="company">
        <img src="https://images.unsplash.com/photo-1573497491208-6b1acb260507?auto=format&fit=crop&q=80" alt="New Services" class="event-image">
        <div class="event-content">
            <span class="event-category">🏢 Company News</span>
            <h2 class="event-title">New Services Now Available</h2>
            <p class="event-date">🗓 February 12, 2025</p>
            <p class="event-description">
                In addition to our core offerings, we now provide CCTV Camera Installation and Network Installation & Troubleshooting.
            </p>
            <a href="#" class="cta-button">Discover More</a>
        </div>
    </article>

    <!-- Event Card: Online Admission Portal Launch -->
    <article class="event-card" data-category="events">
        <img src="https://images.unsplash.com/photo-1573164574572-cb89e39749b4?auto=format&fit=crop&q=80" alt="Admission Portal Launch" class="event-image">
        <div class="event-content">
            <span class="event-category">🎓 Events & Workshops</span>
            <h2 class="event-title">Online Admission Portal Launch</h2>
            <p class="event-date">🗓 February 25, 2025</p>
            <p class="event-description">
                Our online admission portal goes live on February 25, 2025. Admissions will commence on March 10, 2025 – don’t miss your chance to apply!
            </p>
            <a href="#" class="cta-button">Apply Now</a>
        </div>
    </article>

    <!-- Article Card: AI Article 1 -->
    <article class="event-card" data-category="tech">
        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80" alt="The Future of AI" class="event-image">
        <div class="event-content">
            <span class="event-category">🔬 Tech Insights</span>
            <h2 class="event-title">The Future of AI: Trends & Innovations</h2>
            <p class="event-date">🗓 February 20, 2025</p>
            <p class="event-description">
                Explore the latest trends and breakthrough innovations in artificial intelligence and their impact on various industries.
            </p>
            <a href="#" class="cta-button">Read Article</a>
        </div>
    </article>

    <!-- Article Card: AI Article 2 -->
    <article class="event-card" data-category="tech">
        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80" alt="Innovations in AI" class="event-image">
        <div class="event-content">
            <span class="event-category">🔬 Tech Insights</span>
            <h2 class="event-title">Innovations in Artificial Intelligence</h2>
            <p class="event-date">🗓 February 22, 2025</p>
            <p class="event-description">
                Delve into how emerging AI technologies are transforming the business landscape and driving innovation across sectors.
            </p>
            <a href="#" class="cta-button">Read Article</a>
        </div>
    </article>

    <!-- Article Card: Front-End Development -->
    <article class="event-card" data-category="tech">
        <img src="https://images.unsplash.com/photo-1509395062183-67c5ad6faff9?auto=format&fit=crop&q=80" alt="Front-End Development" class="event-image">
        <div class="event-content">
            <span class="event-category">🔬 Tech Insights</span>
            <h2 class="event-title">Front-End Development: Building the Web of Tomorrow</h2>
            <p class="event-date">🗓 February 24, 2025</p>
            <p class="event-description">
                Discover practical tips and modern tools that empower developers in creating innovative and responsive web designs.
            </p>
            <a href="#" class="cta-button">Read Article</a>
        </div>
    </article>

    <!-- Article Card: Back-End Development -->
    <article class="event-card" data-category="tech">
        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80" alt="Back-End Development" class="event-image">
        <div class="event-content">
            <span class="event-category">🔬 Tech Insights</span>
            <h2 class="event-title">Back-End Development: The Power Behind Web Applications</h2>
            <p class="event-date">🗓 February 26, 2025</p>
            <p class="event-description">
                An in-depth look at back-end development practices and technologies that drive robust, scalable web applications.
            </p>
            <a href="#" class="cta-button">Read Article</a>
        </div>
    </article>

    <!-- Article Card: Digital Literacy -->
    <article class="event-card" data-category="tech">
        <img src="https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&q=80" alt="Digital Literacy" class="event-image">
        <div class="event-content">
            <span class="event-category">🔬 Tech Insights</span>
            <h2 class="event-title">Digital Literacy in the 21st Century</h2>
            <p class="event-date">🗓 February 28, 2025</p>
            <p class="event-description">
                Empower yourself with essential digital skills in our comprehensive guide to thriving in the modern digital landscape.
            </p>
            <a href="#" class="cta-button">Read Article</a>
        </div>
    </article>
    </main>

    <script>
        // Category filtering functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const eventCards = document.querySelectorAll('.event-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    button.classList.add('active');

                    const category = button.getAttribute('data-category');

                    eventCards.forEach(card => {
                        if (category === 'all' || card.getAttribute('data-category') === category) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
    <?php include("includes/footer.php"); ?>
</body>
</html>