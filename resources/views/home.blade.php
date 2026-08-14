<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Abel Lilo | Hair Salon</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

</head>

<body>


<!-- =========================
     NAVBAR
========================= -->

<header class="navbar">

    <div class="nav-container">

        <a href="{{ url('/') }}" class="logo">
            Abel <span>Lilo</span>
        </a>


        <nav class="nav-links" id="navLinks">

            <a href="{{ url('/') }}" class="active">
                Home
            </a>

            <a href="{{ route('services') }}">
                Services
            </a>

            @auth

                <a href="#">
                    My Bookings
                </a>

                <form
                    action="{{ url('/logout') }}"
                    method="POST"
                    class="logout-form"
                >
                    @csrf

                    <button type="submit">
                        Logout
                    </button>

                </form>

            @else

                <a href="{{ route('login') }}">
                    Login
                </a>

                <a
                    href="{{ route('register') }}"
                    class="nav-button"
                >
                    Create Account
                </a>

            @endauth

        </nav>


        <button
            class="menu-button"
            id="menuButton"
            aria-label="Open menu"
        >

            <span></span>
            <span></span>
            <span></span>

        </button>

    </div>

</header>



<!-- =========================
     HERO
========================= -->

<section class="hero">

    <div class="hero-image"></div>

    <div class="hero-overlay"></div>


    <div class="hero-content">

        <p class="hero-small-title">
            WELCOME TO ABEL LILO
        </p>

        <h1>
            Your Hair.<br>
            Your <em>Statement.</em>
        </h1>

        <p class="hero-description">
            Discover a beauty experience designed around
            you. Professional hair care, styling and
            treatments in a relaxing environment.
        </p>


        <div class="hero-buttons">

            <a href="{{ route('services') }}" class="primary-button">
                Book a Session
                <i class="fa-solid fa-arrow-right"></i>
            </a>

            <a href="#services" class="secondary-button">
                Explore Services
            </a>

        </div>

    </div>


    <div class="hero-scroll">

        <span></span>

        <p>
            Scroll to explore
        </p>

    </div>

</section>



<!-- =========================
     INTRODUCTION
========================= -->

<section class="intro">

    <div class="intro-container">


        <div class="section-label">

            <span></span>

            <p>
                ABOUT US
            </p>

        </div>


        <div class="intro-content">

            <h2>
                Where beauty meets
                <em>confidence.</em>
            </h2>


            <div class="intro-text">

                <p>
                    At Abel Lilo, we believe your hair is
                    more than just a style. It is an expression
                    of who you are.
                </p>

                <p>
                    Our experienced stylists combine
                    creativity, care and professional
                    techniques to create looks that make
                    you feel confident every time you leave
                    our salon.
                </p>

                <a href="#services" class="text-link">
                    Discover our services
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

    </div>

</section>



<!-- =========================
     SERVICES
========================= -->

<section class="services" id="services">

    <div class="services-container">


        <div class="services-heading">

            <div class="section-label">

                <span></span>

                <p>
                    OUR SERVICES
                </p>

            </div>


            <h2>
                Designed for
                <em>you.</em>
            </h2>


            <p>
                From everyday styling to complete
                transformations, we have something
                for every occasion.
            </p>

        </div>



        <div class="service-grid">


            <!-- Service 1 -->

            <article class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=900&q=85"
                        alt="Hair styling"
                    >

                </div>


                <div class="service-info">

                    <div>

                        <h3>
                            Hair Styling
                        </h3>

                        <p>
                            Beautiful styles created
                            specifically for you.
                        </p>

                    </div>


                    <span class="service-price">
                        From ₦8,000
                    </span>

                </div>

            </article>



            <!-- Service 2 -->

            <article class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1562322140-8baeececf3df?auto=format&fit=crop&w=900&q=85"
                        alt="Hair salon styling"
                    >

                </div>


                <div class="service-info">

                    <div>

                        <h3>
                            Hair Treatment
                        </h3>

                        <p>
                            Nourish and restore your
                            hair's natural beauty.
                        </p>

                    </div>


                    <span class="service-price">
                        From ₦6,000
                    </span>

                </div>

            </article>



            <!-- Service 3 -->

            <article class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1595476108010-b4d1f102b1b1?auto=format&fit=crop&w=900&q=85"
                        alt="Hair coloring"
                    >

                </div>


                <div class="service-info">

                    <div>

                        <h3>
                            Hair Coloring
                        </h3>

                        <p>
                            Transform your look with
                            beautiful colour.
                        </p>

                    </div>


                    <span class="service-price">
                        From ₦12,000
                    </span>

                </div>

            </article>



            <!-- Service 4 -->

            <article class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1599351431202-1e0f0137899a?auto=format&fit=crop&w=900&q=85"
                        alt="Hair braiding"
                    >

                </div>


                <div class="service-info">

                    <div>

                        <h3>
                            Hair Braiding
                        </h3>

                        <p>
                            Elegant protective styles
                            for every occasion.
                        </p>

                    </div>


                    <span class="service-price">
                        From ₦10,000
                    </span>

                </div>

            </article>

        </div>


        <div class="services-button">

            <a href="{{ route('services') }}" class="primary-button dark">
                View All Services
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    </div>

</section>



<!-- =========================
     WHY CHOOSE US
========================= -->

<section class="features">

    <div class="features-container">


        <div class="features-image">

            <img
                src="https://images.unsplash.com/photo-1600948836101-f9ffda59d250?auto=format&fit=crop&w=1200&q=85"
                alt="Hair salon interior"
            >

        </div>


        <div class="features-content">

            <div class="section-label">

                <span></span>

                <p>
                    THE ABEL LILO EXPERIENCE
                </p>

            </div>


            <h2>
                More than a salon.
                <em>A moment for you.</em>
            </h2>


            <div class="feature-list">


                <div class="feature">

                    <div class="feature-icon">

                        <i class="fa-regular fa-heart"></i>

                    </div>

                    <div>

                        <h3>
                            Personalised Care
                        </h3>

                        <p>
                            Every appointment is tailored
                            to your individual hair needs
                            and preferences.
                        </p>

                    </div>

                </div>



                <div class="feature">

                    <div class="feature-icon">

                        <i class="fa-solid fa-scissors"></i>

                    </div>

                    <div>

                        <h3>
                            Experienced Stylists
                        </h3>

                        <p>
                            Our stylists bring professional
                            expertise and creativity to
                            every appointment.
                        </p>

                    </div>

                </div>



                <div class="feature">

                    <div class="feature-icon">

                        <i class="fa-regular fa-clock"></i>

                    </div>

                    <div>

                        <h3>
                            Easy Booking
                        </h3>

                        <p>
                            Choose your service, date and
                            time and secure your appointment
                            in just a few steps.
                        </p>

                    </div>

                </div>


            </div>

        </div>

    </div>

</section>



<!-- =========================
     OPENING HOURS
========================= -->

<section class="hours">

    <div class="hours-container">


        <div class="hours-content">

            <div class="section-label light">

                <span></span>

                <p>
                    VISIT US
                </p>

            </div>


            <h2>
                Your time.
                <em>Your appointment.</em>
            </h2>


            <p>
                We are here to make your salon
                experience simple and convenient.
            </p>


            <a href="{{ route('services') }}" class="primary-button">
                Book a Session
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>



        <div class="hours-box">

            <h3>
                Opening Hours
            </h3>


            <div class="hours-row">

                <span>
                    Monday - Friday
                </span>

                <strong>
                    9:00 AM - 6:00 PM
                </strong>

            </div>


            <div class="hours-row">

                <span>
                    Saturday
                </span>

                <strong>
                    9:00 AM - 5:00 PM
                </strong>

            </div>


            <div class="hours-row">

                <span>
                    Sunday
                </span>

                <strong>
                    Closed
                </strong>

            </div>

        </div>

    </div>

</section>



<!-- =========================
     FINAL CTA
========================= -->

<section class="final-cta">

    <div class="final-cta-container">

        <p>
            READY WHEN YOU ARE?
        </p>

        <h2>
            Your next look
            <em>starts here.</em>
        </h2>

        <a href="{{ route('services') }}" class="primary-button dark">
            Book Your Session
            <i class="fa-solid fa-arrow-right"></i>
        </a>

    </div>

</section>



<!-- =========================
     FOOTER
========================= -->

<footer class="footer">

    <div class="footer-container">


        <div class="footer-brand">

            <a href="{{ url('/') }}" class="logo">
                Abel <span>Lilo</span>
            </a>

            <p>
                Professional hair care and styling
                designed around you.
            </p>

        </div>


        <div class="footer-column">

            <h4>
                Explore
            </h4>

            <a href="{{ url('/') }}">
                Home
            </a>

            <a href="#">
                Services
            </a>

            <a href="#">
                My Bookings
            </a>

        </div>


        <div class="footer-column">

            <h4>
                Contact
            </h4>

            <a href="tel:+2348000000000">
                +234 800 000 0000
            </a>

            <a href="mailto:hello@abellilo.com">
                hello@abellilo.com
            </a>

            <span>
                Lagos, Nigeria
            </span>

        </div>


        <div class="footer-column">

            <h4>
                Follow Us
            </h4>

            <div class="social-links">

                <a href="#">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="#">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#">
                    <i class="fa-brands fa-tiktok"></i>
                </a>

            </div>

        </div>

    </div>


    <div class="footer-bottom">

        <p>
            © {{ date('Y') }} Abel Lilo.
            All rights reserved.
        </p>

        <p>
            Hair & Beauty Salon
        </p>

    </div>

</footer>


<script src="{{ asset('js/home.js') }}"></script>

</body>
</html>