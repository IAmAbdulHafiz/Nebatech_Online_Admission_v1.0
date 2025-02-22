<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Read through our insightful blog posts on various topics related to technology, business, and more.">
    <meta name="keywords" content="Blog, Technology Blog, Business Blog, Blog Posts, Blog Topics, Blog Articles, Blog Insights, Blog Read, Blog Information, Blog Technology, Blog Business, Blog Posts, Blog Topics, Blog Articles, Blog Insights, Blog Read, Blog Information, Blog Technology, Blog Business">
    <meta name="author" content="Nebatech Software Solution Ltd">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Updates & Events - Nebatech Software Solution Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                        url('https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 4rem 2rem;
            text-align: center;
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
            height: 50px;
            padding: 10rem 0;
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
            border-radius: 15px;
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
            border-radius: 15px;
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
            border-radius: 15px;
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
    <!--<header class="hero">
        <h1>Nebatech Updates & Events</h1>
        <p>Stay updated with the latest news, events, and innovations from Nebatech Software Solution Ltd.</p>
    </header>-->

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
        <!-- Event Card 1 -->
        <article class="event-card" data-category="tech">
            <img src="https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?auto=format&fit=crop&q=80" alt="Tech Conference 2024" class="event-image">
            <div class="event-content">
                <span class="event-category">🔬 Tech Insights</span>
                <h2 class="event-title">AI Innovation Summit 2024</h2>
                <p class="event-date">🗓 March 15, 2024 | 📍 Virtual Event</p>
                <p class="event-description">Join us for an exciting discussion on the latest AI trends and their impact on software development.</p>
                <a href="#" class="cta-button">Register Now</a>
            </div>
        </article>

        <!-- Event Card 2 -->
        <article class="event-card" data-category="company">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80" alt="Company Milestone" class="event-image">
            <div class="event-content">
                <span class="event-category">🏢 Company News</span>
                <h2 class="event-title">Nebatech Expands to Southeast Asia</h2>
                <p class="event-date">🗓 February 28, 2024</p>
                <p class="event-description">We're excited to announce our expansion into the Southeast Asian market with a new office in Singapore.</p>
                <a href="#" class="cta-button">Read More</a>
            </div>
        </article>

        <!-- Event Card 3 -->
        <article class="event-card" data-category="events">
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&q=80" alt="Workshop Event" class="event-image">
            <div class="event-content">
                <span class="event-category">🎓 Events & Workshops</span>
                <h2 class="event-title">Web Development Masterclass</h2>
                <p class="event-date">🗓 April 5, 2024 | 📍 Hybrid Event</p>
                <p class="event-description">Learn advanced web development techniques from industry experts in this hands-on workshop.</p>
                <a href="#" class="cta-button">Register Now</a>
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
    <?php include("includes/public_footer.php"); ?>
</body>
</html>