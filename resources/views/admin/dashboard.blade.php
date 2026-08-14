<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard | Abellilo</title>

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

    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            background: #f7f3ee;

            color: #201d1b;

            font-family: "DM Sans", sans-serif;
        }


        .admin-page {
            min-height: 100vh;
        }


        /* HEADER */

        .admin-header {
            background: #201d1b;

            color: white;

            padding: 22px 40px;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .brand {
            font-family: "Playfair Display", serif;

            font-size: 25px;
        }


        .admin-label {
            font-size: 10px;

            letter-spacing: 2px;

            opacity: .65;

            margin-top: 3px;
        }


        .logout-form button {
            background: transparent;

            border: 1px solid rgba(255,255,255,.4);

            color: white;

            padding: 9px 15px;

            cursor: pointer;
        }


        /* MAIN */

        .admin-content {
            width: min(1100px, 100%);

            margin: auto;

            padding: 60px 25px;
        }


        .page-title {
            margin-bottom: 40px;
        }


        .page-title p {
            margin: 0 0 8px;

            font-size: 10px;

            letter-spacing: 3px;

            color: #817872;
        }


        .page-title h1 {
            margin: 0;

            font-family: "Playfair Display", serif;

            font-size: 48px;

            font-weight: 500;
        }


        .page-title h1 em {
            font-weight: 400;
        }


        /* STATS */

        .stats {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 20px;
        }


        .stat-card {
            background: white;

            padding: 25px;

            box-shadow:
                0 10px 40px
                rgba(32,29,27,.05);
        }


        .stat-label {
            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 1px;

            color: #817872;
        }


        .stat-number {
            display: block;

            margin-top: 12px;

            font-family: "Playfair Display", serif;

            font-size: 34px;
        }


        /* PAYMENT */

        .payment-card {
            background: white;

            padding: 30px;

            margin-top: 20px;

            box-shadow:
                0 10px 40px
                rgba(32,29,27,.05);
        }


        .payment-card h2 {
            margin: 0 0 10px;

            font-family: "Playfair Display", serif;

            font-size: 25px;

            font-weight: 500;
        }


        .payment-amount {
            font-size: 28px;

            font-weight: 600;
        }


        /* QUICK LINKS */

        .quick-links {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 20px;

            margin-top: 20px;
        }


        .quick-link {
            background: #201d1b;

            color: white;

            padding: 25px;

            text-decoration: none;
        }


        .quick-link h3 {
            margin: 0 0 8px;

            font-family: "Playfair Display", serif;

            font-size: 23px;

            font-weight: 500;
        }


        .quick-link p {
            margin: 0;

            font-size: 12px;

            opacity: .7;
        }


        @media (max-width: 800px) {

            .stats {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 550px) {

            .admin-header {
                padding: 18px 20px;
            }


            .admin-content {
                padding: 40px 15px;
            }


            .page-title h1 {
                font-size: 40px;
            }


            .stats {
                grid-template-columns: 1fr;
            }


            .quick-links {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<div class="admin-page">


    <header class="admin-header">


        <div>

            <div class="brand">
                Abellilo
            </div>

            <div class="admin-label">
                ADMINISTRATION
            </div>

        </div>


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


    </header>


    <main class="admin-content">


        <div class="page-title">

            <p>
                ABELLILO HAIR SALON
            </p>

            <h1>
                Admin <em>Dashboard.</em>
            </h1>

        </div>


        <div class="stats">


            <div class="stat-card">

                <span class="stat-label">
                    Total Bookings
                </span>

                <span class="stat-number">
                    {{ $totalBookings }}
                </span>

            </div>


            <div class="stat-card">

                <span class="stat-label">
                    Pending
                </span>

                <span class="stat-number">
                    {{ $pendingBookings }}
                </span>

            </div>


            <div class="stat-card">

                <span class="stat-label">
                    Confirmed
                </span>

                <span class="stat-number">
                    {{ $confirmedBookings }}
                </span>

            </div>


            <div class="stat-card">

                <span class="stat-label">
                    Cancelled
                </span>

                <span class="stat-number">
                    {{ $cancelledBookings }}
                </span>

            </div>


        </div>


        <div class="payment-card">

            <h2>
                Successful Payments
            </h2>

            <div class="payment-amount">
                ₦{{ number_format($totalPayments, 2) }}
            </div>

        </div>


        <div class="quick-links">


            <a
                href="{{ route('admin.bookings') }}"
                class="quick-link"
            >

                <h3>
                    View Bookings
                </h3>

                <p>
                    Manage customer appointments.
                </p>

            </a>


            <a
                href="{{ route('admin.payments') }}"
                class="quick-link"
            >

                <h3>
                    View Payments
                </h3>

                <p>
                    Review successful transactions.
                </p>

            </a>


        </div>


    </main>


</div>


</body>

</html>