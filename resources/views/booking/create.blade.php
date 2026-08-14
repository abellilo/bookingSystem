<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Book a Session | Abellilo</title>

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
        href="{{ asset('css/booking.css') }}"
    >

</head>

<body>


<header class="navbar">

    <div class="nav-container">

        <a href="{{ url('/') }}" class="logo">
            Abellilo
        </a>

        <a
            href="{{ route('services') }}"
            class="back-link"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Back to Services
        </a>

    </div>

</header>



<main class="booking-page">

    <div class="booking-container">


        <div class="booking-heading">

            <div class="section-label">

                <span></span>

                <p>
                    BOOK YOUR SESSION
                </p>

            </div>

            <h1>
                Let's make time
                <em>for you.</em>
            </h1>

            <p>
                Choose your preferred date and time
                for your appointment at Abellilo.
            </p>

        </div>



        <div class="booking-layout">


            <!-- BOOKING FORM -->

            <div class="booking-form-card">

                @if ($errors->any())

                    <div class="booking-errors">

                        <div class="booking-error-title">

                            <i class="fa-solid fa-circle-exclamation"></i>

                            <span>
                                Please check your booking details.
                            </span>

                        </div>

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                @if (session('success'))

                    <div class="booking-success">

                        <i class="fa-solid fa-circle-check"></i>

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>

                @endif


                <form action="{{ route('booking.store') }}" method="POST">

                    @csrf

                    <input
                        type="hidden"
                        name="service"
                        value="{{ $service }}"
                    >

                    <!-- SERVICE -->

                    <div class="form-section">

                        <label>
                            Selected Service
                        </label>


                        <div class="selected-service">

                            <div>

                                <span>
                                    SERVICE
                                </span>

                                <h2>
                                    {{ $service }}
                                </h2>

                            </div>


                            <strong>
                                ₦{{ number_format($price) }}
                            </strong>

                        </div>

                    </div>



                    <!-- DATE -->

                    <div class="form-section">

                        <label for="booking_date">
                            Choose Date
                        </label>

                        <input
                            type="date"
                            name="booking_date"
                            id="booking_date"
                            min="{{ date('Y-m-d') }}"
                            required
                        >

                    </div>



                    <!-- TIME -->

                    <div class="form-section">

                        <label>
                            Choose Time
                        </label>


                        <div class="time-grid">

                            <label class="time-option">

                                <input
                                    type="radio"
                                    name="booking_time"
                                    value="09:00"
                                    required
                                >

                                <span>
                                    9:00 AM
                                </span>

                            </label>


                            <label class="time-option">

                                <input
                                    type="radio"
                                    name="booking_time"
                                    value="10:00"
                                >

                                <span>
                                    10:00 AM
                                </span>

                            </label>


                            <label class="time-option">

                                <input
                                    type="radio"
                                    name="booking_time"
                                    value="11:00"
                                >

                                <span>
                                    11:00 AM
                                </span>

                            </label>


                            <label class="time-option">

                                <input
                                    type="radio"
                                    name="booking_time"
                                    value="12:00"
                                >

                                <span>
                                    12:00 PM
                                </span>

                            </label>


                            <label class="time-option">

                                <input
                                    type="radio"
                                    name="booking_time"
                                    value="13:00"
                                >

                                <span>
                                    1:00 PM
                                </span>

                            </label>


                            <label class="time-option">

                                <input
                                    type="radio"
                                    name="booking_time"
                                    value="14:00"
                                >

                                <span>
                                    2:00 PM
                                </span>

                            </label>


                            <label class="time-option">

                                <input
                                    type="radio"
                                    name="booking_time"
                                    value="15:00"
                                >

                                <span>
                                    3:00 PM
                                </span>

                            </label>


                            <label class="time-option">

                                <input
                                    type="radio"
                                    name="booking_time"
                                    value="16:00"
                                >

                                <span>
                                    4:00 PM
                                </span>

                            </label>


                            <label class="time-option">

                                <input
                                    type="radio"
                                    name="booking_time"
                                    value="17:00"
                                >

                                <span>
                                    5:00 PM
                                </span>

                            </label>


                        </div>

                    </div>



                    <!-- CUSTOMER DETAILS -->

                    <div class="form-section">

                        <label>
                            Your Details
                        </label>


                        <div class="details-grid">

                            <div>

                                <label for="name">
                                    Full Name
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ auth()->user()->name }}"
                                    required
                                >

                            </div>


                            <div>

                                <label for="email">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ auth()->user()->email }}"
                                    required
                                >

                            </div>

                        </div>

                    </div>



                    <!-- BOOKING FEE -->

                    <div class="payment-summary">

                        <div>

                            <span>
                                Service Price
                            </span>

                            <strong>
                                ₦{{ number_format($price) }}
                            </strong>

                        </div>


                        <div>

                            <span>
                                Booking Fee
                            </span>

                            <strong>
                                ₦100
                            </strong>

                        </div>


                        <div class="payment-total">

                            <span>
                                Pay Now
                            </span>

                            <strong>
                                ₦100
                            </strong>

                        </div>

                    </div>



                    <button
                        type="submit"
                        class="submit-button"
                    >

                        Continue to Payment

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>


                    <p class="payment-note">

                        A ₦100 booking fee is required
                        to secure your appointment.

                    </p>


                </form>

            </div>



            <!-- SIDE INFORMATION -->

            <aside class="booking-info">

                <div class="info-image">

                    <img
                        src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=900&q=85"
                        alt="Abellilo salon"
                    >

                </div>


                <div class="info-content">

                    <h2>
                        Your appointment
                    </h2>

                    <p>
                        We look forward to welcoming you
                        to Abellilo and giving you an
                        experience worth remembering.
                    </p>


                    <div class="info-row">

                        <i class="fa-regular fa-clock"></i>

                        <div>

                            <strong>
                                Opening Hours
                            </strong>

                            <span>
                                Monday - Friday:
                                9 AM - 6 PM
                            </span>

                            <span>
                                Saturday:
                                9 AM - 5 PM
                            </span>

                        </div>

                    </div>


                    <div class="info-row">

                        <i class="fa-solid fa-naira-sign"></i>

                        <div>

                            <strong>
                                Booking Fee
                            </strong>

                            <span>
                                ₦100
                            </span>

                        </div>

                    </div>

                </div>

            </aside>


        </div>

    </div>

</main>


<footer class="footer">

    <p>
        © {{ date('Y') }} Abellilo.
        All rights reserved.
    </p>

</footer>


</body>

</html>