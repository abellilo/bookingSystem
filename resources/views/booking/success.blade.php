<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Booking Confirmed | Abellilo</title>

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


<div class="booking-success-page">

    <div class="success-card">


        <div class="success-icon">
            ✓
        </div>


        <p class="success-label">
            ABELLILO HAIR SALON
        </p>


        <h1>
            Booking <em>Confirmed.</em>
        </h1>


        <p class="success-message">
            Your appointment has been successfully booked.
        </p>


        <div class="booking-summary">


            <div class="summary-row">

                <span>
                    Service
                </span>

                <strong>
                    {{ $booking->service }}
                </strong>

            </div>


            <div class="summary-row">

                <span>
                    Date
                </span>

                <strong>
                    {{ $booking->booking_date->format('F j, Y') }}
                </strong>

            </div>


            <div class="summary-row">

                <span>
                    Time
                </span>

                <strong>
                    {{ \Carbon\Carbon::parse($booking->booking_time)->format('g:i A') }}
                </strong>

            </div>


            <div class="summary-row">

                <span>
                    Booking Fee
                </span>

                <strong>
                    ₦{{ number_format($payment->amount, 2) }}
                </strong>

            </div>


            <div class="summary-row">

                <span>
                    Payment Status
                </span>

                <strong class="paid">
                    Paid
                </strong>

            </div>


        </div>


        <a
            href="{{ url('/') }}"
            class="success-button"
        >
            Back to Home
        </a>


    </div>

</div>


</body>

</html>