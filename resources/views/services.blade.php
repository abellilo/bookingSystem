<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Services | Abellilo</title>

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

    <link
        rel="stylesheet"
        href="{{ asset('css/services.css') }}"
    >

</head>

<body>


<!-- NAVBAR -->

<header class="navbar">

    <div class="nav-container">

        <a href="{{ url('/') }}" class="logo">
            Abellilo
        </a>


        <nav class="nav-links" id="navLinks">

            <a href="{{ url('/') }}">
                Home
            </a>

            <a href="{{ route('services') }}" class="active">
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



<!-- PAGE HERO -->

<section class="page-hero">

    <div class="page-hero-image"></div>

    <div class="page-hero-overlay"></div>

    <div class="page-hero-content">

        <p>
            ABELLILO HAIR SALON
        </p>

        <h1>
            Our <em>Services</em>
        </h1>

        <span>
            Beauty, care and confidence —
            designed around you.
        </span>

    </div>

</section>



<!-- SERVICES -->

<section class="services">

    <div class="services-container">


        <div class="services-heading">

            <div class="section-label">

                <span></span>

                <p>
                    WHAT WE OFFER
                </p>

            </div>

            <h2>
                Find your perfect
                <em>look.</em>
            </h2>

            <p>
                Choose from our range of professional
                hair services and book an appointment
                at a time that works for you.
            </p>

        </div>



        <div class="service-grid">


            <!-- HAIR STYLING -->

            <article class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=1000&q=85"
                        alt="Hair styling"
                    >

                </div>


                <div class="service-content">

                    <div class="service-top">

                        <div>

                            <span class="service-number">
                                01
                            </span>

                            <h3>
                                Hair Styling
                            </h3>

                        </div>

                        <span class="price">
                            ₦8,000
                        </span>

                    </div>


                    <p>
                        Professional styling created
                        to complement your personal
                        look and occasion.
                    </p>


                    <a href="{{ route('booking.create', ['service' => 'Hair Styling']) }}" class="book-link">

                        Book this service

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </article>



            <!-- HAIR BRAIDING -->

            <article class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=1000&q=85"
                        alt="Hair braiding"
                    >

                </div>


                <div class="service-content">

                    <div class="service-top">

                        <div>

                            <span class="service-number">
                                02
                            </span>

                            <h3>
                                Hair Braiding
                            </h3>

                        </div>

                        <span class="price">
                            ₦10,000
                        </span>

                    </div>


                    <p>
                        Beautiful protective styles
                        carefully created for comfort
                        and lasting elegance.
                    </p>


                    <a href="{{ route('booking.create', ['service' => 'Hair Braiding']) }}" class="book-link">

                        Book this service

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </article>



            <!-- HAIR WASH -->

            <article class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1562322140-8baeececf3df?auto=format&fit=crop&w=1000&q=85"
                        alt="Hair washing"
                    >

                </div>


                <div class="service-content">

                    <div class="service-top">

                        <div>

                            <span class="service-number">
                                03
                            </span>

                            <h3>
                                Hair Wash
                            </h3>

                        </div>

                        <span class="price">
                            ₦3,000
                        </span>

                    </div>


                    <p>
                        A refreshing wash and care
                        treatment to leave your hair
                        clean and revitalised.
                    </p>


                    <a href="{{ route('booking.create', ['service' => 'Hair Wash']) }}" class="book-link">

                        Book this service

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </article>



            <!-- HAIR TREATMENT -->

            <article class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1600948836101-f9ffda59d250?auto=format&fit=crop&w=1000&q=85"
                        alt="Hair treatment"
                    >

                </div>


                <div class="service-content">

                    <div class="service-top">

                        <div>

                            <span class="service-number">
                                04
                            </span>

                            <h3>
                                Hair Treatment
                            </h3>

                        </div>

                        <span class="price">
                            ₦6,000
                        </span>

                    </div>


                    <p>
                        Nourishing treatments designed
                        to restore moisture, strength and
                        natural shine.
                    </p>


                    <a href="{{ route('booking.create', ['service' => 'Hair Treatment']) }}" class="book-link">

                        Book this service

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </article>



            <!-- HAIR COLORING -->

            <article class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1595476108010-b4d1f102b1b1?auto=format&fit=crop&w=1000&q=85"
                        alt="Hair coloring"
                    >

                </div>


                <div class="service-content">

                    <div class="service-top">

                        <div>

                            <span class="service-number">
                                05
                            </span>

                            <h3>
                                Hair Coloring
                            </h3>

                        </div>

                        <span class="price">
                            ₦12,000
                        </span>

                    </div>


                    <p>
                        Give your look a new expression
                        with professional colour and
                        careful application.
                    </p>


                    <a href="{{ route('booking.create', ['service' => 'Hair Coloring']) }}" class="book-link">

                        Book this service

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </article>



            <!-- HAIR EXTENSIONS -->

            <article class="service-card">

                <div class="service-image">

                    <img
                        src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1000&q=85"
                        alt="Hair extensions"
                    >

                </div>


                <div class="service-content">

                    <div class="service-top">

                        <div>

                            <span class="service-number">
                                06
                            </span>

                            <h3>
                                Hair Extensions
                            </h3>

                        </div>

                        <span class="price">
                            ₦15,000
                        </span>

                    </div>


                    <p>
                        Add length, volume and a
                        completely new dimension to
                        your hairstyle.
                    </p>


                    <a href="{{ route('booking.create', ['service' => 'Hair Extensions']) }}" class="book-link">

                        Book this service

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </article>

        </div>

    </div>

</section>



<!-- BOOKING CTA -->

<section class="booking-cta">

    <div class="booking-cta-content">

        <p>
            READY FOR YOUR NEXT LOOK?
        </p>

        <h2>
            Let's make your
            <em>appointment.</em>
        </h2>

        <a href="#" class="cta-button">

            Book a Session

            <i class="fa-solid fa-arrow-right"></i>

        </a>

    </div>

</section>



<!-- FOOTER -->

<footer class="footer">

    <div class="footer-container">


        <div class="footer-brand">

            <a href="{{ url('/') }}" class="logo">
                Abellilo
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

            <a href="{{ route('services') }}">
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

            <span>
                +234 800 000 0000
            </span>

            <span>
                hello@abellilo.com
            </span>

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
            © {{ date('Y') }} Abellilo.
            All rights reserved.
        </p>

        <p>
            Hair & Beauty Salon
        </p>

    </div>

</footer>


<script src="{{ asset('js/services.js') }}"></script>

</body>

</html>