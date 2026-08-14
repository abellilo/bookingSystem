<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>My Bookings | Abellilo</title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/booking.css') }}"
    >

</head>


<body>

<div class="my-bookings-page">


    <div class="my-bookings-container">


        <div class="bookings-heading">

            <p class="booking-label">
                ABELLILO HAIR SALON
            </p>

            <h1>
                My <em>Bookings.</em>
            </h1>

            <p>
                View your appointments and payment details.
            </p>

        </div>

        @if (session('success'))

            <div class="booking-success">

                <i class="fa-solid fa-circle-check"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        @if ($errors->any())

            <div class="booking-errors">

                <div class="booking-error-title">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <span>
                        Please check your booking.
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

        @if ($bookings->count() > 0)


            <div class="bookings-list">


                @foreach ($bookings as $booking)


                    <div class="booking-card">


                        <div class="booking-card-header">

                            <div>

                                <span class="booking-small-label">
                                    SERVICE
                                </span>

                                <h2>
                                    {{ $booking->service }}
                                </h2>

                            </div>


                            <span
                                class="booking-status
                                {{ $booking->status }}"
                            >

                                {{ ucfirst($booking->status) }}

                            </span>

                        </div>


                        <div class="booking-details">


                            <div class="booking-detail">

                                <span>
                                    Date
                                </span>

                                <strong>
                                    {{ $booking->booking_date->format('F j, Y') }}
                                </strong>

                            </div>


                            <div class="booking-detail">

                                <span>
                                    Time
                                </span>

                                <strong>
                                    {{ \Carbon\Carbon::parse($booking->booking_time)->format('g:i A') }}
                                </strong>

                            </div>


                            <div class="booking-detail">

                                <span>
                                    Service Price
                                </span>

                                <strong>
                                    ₦{{ number_format($booking->service_price, 2) }}
                                </strong>

                            </div>


                            <div class="booking-detail">

                                <span>
                                    Booking Fee
                                </span>

                                <strong>
                                    ₦{{ number_format($booking->booking_fee, 2) }}
                                </strong>

                            </div>


                            <div class="booking-detail">

                                <span>
                                    Payment
                                </span>


                                @if ($booking->payment)

                                    <strong
                                        class="payment-status
                                        {{ $booking->payment->status }}"
                                    >

                                        {{ ucfirst($booking->payment->status) }}

                                    </strong>

                                @else

                                    <strong>
                                        Not Available
                                    </strong>

                                @endif

                            </div>


                        </div>


                        @if ($booking->status !== 'cancelled')


                            <div class="booking-card-footer">

                                <form
                                    action="{{ route('bookings.cancel', $booking->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to cancel this appointment? Your ₦100 booking fee will be retained.')"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        class="cancel-booking-button"
                                    >
                                        Cancel Booking
                                    </button>
                                </form>

                            </div>


                        @endif


                    </div>


                @endforeach


            </div>


        @else


            <div class="no-bookings">

                <div class="no-bookings-icon">
                    —
                </div>

                <h2>
                    No bookings yet.
                </h2>

                <p>
                    Your upcoming appointments will appear here.
                </p>

                <a
                    href="{{ url('/services') }}"
                    class="book-service-button"
                >
                    Browse Services
                </a>

            </div>


        @endif


    </div>


</div>

</body>

</html>