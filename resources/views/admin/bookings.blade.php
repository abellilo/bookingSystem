<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Bookings | Abellilo Admin</title>

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


        /* HEADER */

        .admin-header {
            background: #201d1b;

            color: white;

            padding: 22px 40px;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .brand {
            font-family: "Playfair Display", serif;

            font-size: 25px;
        }


        .admin-label {
            margin-top: 3px;

            font-size: 9px;

            letter-spacing: 2px;

            opacity: .6;
        }


        .header-actions {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .header-link,
        .logout-button {
            padding: 9px 14px;

            border: 1px solid rgba(255,255,255,.35);

            background: transparent;

            color: white;

            text-decoration: none;

            font-family: inherit;

            font-size: 11px;

            cursor: pointer;
        }


        /* CONTENT */

        .admin-content {
            width: min(1200px, 100%);

            margin: auto;

            padding: 60px 25px;
        }


        .page-heading {
            margin-bottom: 35px;
        }


        .page-heading p {
            margin: 0 0 8px;

            font-size: 10px;

            letter-spacing: 3px;

            color: #817872;
        }


        .page-heading h1 {
            margin: 0;

            font-family: "Playfair Display", serif;

            font-size: 48px;

            font-weight: 500;
        }


        .page-heading h1 em {
            font-weight: 400;
        }


        /* TABLE */

        .table-wrapper {
            background: white;

            overflow-x: auto;

            box-shadow:
                0 15px 50px
                rgba(32, 29, 27, .06);
        }


        table {
            width: 100%;

            min-width: 1000px;

            border-collapse: collapse;
        }


        th {
            padding: 17px 20px;

            background: #201d1b;

            color: white;

            text-align: left;

            font-size: 9px;

            text-transform: uppercase;

            letter-spacing: 1px;

            font-weight: 500;
        }


        td {
            padding: 18px 20px;

            border-bottom: 1px solid #eee7e1;

            vertical-align: middle;

            font-size: 12px;
        }


        tbody tr:hover {
            background: #fcfaf8;
        }


        .customer-name {
            font-weight: 600;

            margin-bottom: 4px;
        }


        .customer-email {
            color: #817872;

            font-size: 10px;
        }


        .service-name {
            font-weight: 600;
        }


        .date {
            font-weight: 500;
        }


        .time {
            margin-top: 4px;

            color: #817872;

            font-size: 10px;
        }


        .amount {
            white-space: nowrap;

            font-weight: 600;
        }


        /* STATUS */

        .status {
            display: inline-block;

            padding: 6px 10px;

            font-size: 9px;

            text-transform: uppercase;

            letter-spacing: .8px;

            font-weight: 600;
        }


        .status.confirmed {
            background: #eef7ef;

            color: #46734b;
        }


        .status.pending {
            background: #f8f3e8;

            color: #8b6f35;
        }


        .status.cancelled {
            background: #f8eeee;

            color: #8b3a3a;
        }


        .payment-success {
            color: #46734b;

            font-weight: 600;
        }


        .payment-pending {
            color: #8b6f35;

            font-weight: 600;
        }


        .payment-failed {
            color: #8b3a3a;

            font-weight: 600;
        }


        .reference {
            color: #817872;

            font-size: 9px;

            word-break: break-all;

            max-width: 150px;
        }


        /* ACTIONS */

        .actions {
            display: flex;

            flex-direction: column;

            gap: 7px;

            min-width: 100px;
        }


        .action-button {
            width: 100%;

            padding: 8px 10px;

            border: none;

            font-family: inherit;

            font-size: 10px;

            font-weight: 600;

            cursor: pointer;
        }


        .confirm-button {
            background: #46734b;

            color: white;
        }


        .cancel-button {
            background: #8b3a3a;

            color: white;
        }


        .disabled-button {
            background: #eee7e1;

            color: #817872;

            cursor: not-allowed;
        }


        /* EMPTY */

        .empty-state {
            padding: 70px 30px;

            text-align: center;
        }


        .empty-state h2 {
            margin: 0 0 10px;

            font-family: "Playfair Display", serif;

            font-size: 28px;

            font-weight: 500;
        }


        .empty-state p {
            margin: 0;

            color: #817872;

            font-size: 12px;
        }


        /* MOBILE */

        @media (max-width: 650px) {

            .admin-header {
                padding: 18px 20px;
            }


            .header-actions {
                gap: 5px;
            }


            .header-link,
            .logout-button {
                padding: 8px 9px;

                font-size: 9px;
            }


            .admin-content {
                padding: 40px 15px;
            }


            .page-heading h1 {
                font-size: 40px;
            }

        }

    </style>

</head>


<body>


<header class="admin-header">


    <div>

        <div class="brand">
            Abellilo
        </div>

        <div class="admin-label">
            ADMINISTRATION
        </div>

    </div>


    <div class="header-actions">


        <a
            href="{{ route('admin.dashboard') }}"
            class="header-link"
        >
            Dashboard
        </a>


        <form
            action="{{ url('/admin/logout') }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="logout-button"
            >
                Logout
            </button>

        </form>


    </div>


</header>


<main class="admin-content">


    <div class="page-heading">

        <p>
            ABELLILO HAIR SALON
        </p>

        <h1>
            Customer <em>Bookings.</em>
        </h1>

    </div>


    @if ($bookings->count() > 0)


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th>
                            Customer
                        </th>

                        <th>
                            Service
                        </th>

                        <th>
                            Appointment
                        </th>

                        <th>
                            Service Price
                        </th>

                        <th>
                            Booking Fee
                        </th>

                        <th>
                            Booking Status
                        </th>

                        <th>
                            Payment
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @foreach ($bookings as $booking)


                        <tr>


                            <td>

                                <div class="customer-name">
                                    {{ $booking->user->name }}
                                </div>

                                <div class="customer-email">
                                    {{ $booking->user->email }}
                                </div>

                            </td>


                            <td>

                                <div class="service-name">
                                    {{ $booking->service }}
                                </div>

                            </td>


                            <td>

                                <div class="date">
                                    {{ $booking->booking_date->format('M j, Y') }}
                                </div>

                                <div class="time">
                                    {{ \Carbon\Carbon::parse($booking->booking_time)->format('g:i A') }}
                                </div>

                            </td>


                            <td>

                                <span class="amount">
                                    ₦{{ number_format($booking->service_price, 2) }}
                                </span>

                            </td>


                            <td>

                                <span class="amount">
                                    ₦{{ number_format($booking->booking_fee, 2) }}
                                </span>

                            </td>


                            <td>

                                <span
                                    class="status {{ $booking->status }}"
                                >

                                    {{ ucfirst($booking->status) }}

                                </span>

                            </td>


                            <td>

                                @if ($booking->payment)

                                    <div
                                        class="
                                            payment-{{ $booking->payment->status }}
                                        "
                                    >

                                        {{ ucfirst($booking->payment->status) }}

                                    </div>


                                    <div class="reference">

                                        {{ $booking->payment->reference }}

                                    </div>

                                @else

                                    <span>
                                        —
                                    </span>

                                @endif

                            </td>


                            <td>

                                <div class="actions">


                                    @if ($booking->status === 'pending')


                                        <button
                                            type="button"
                                            class="action-button confirm-button"
                                        >
                                            Confirm
                                        </button>


                                    @else

                                        <button
                                            type="button"
                                            class="action-button disabled-button"
                                            disabled
                                        >
                                            Confirmed
                                        </button>


                                    @endif


                                    @if ($booking->status !== 'cancelled')


                                        <button
                                            type="button"
                                            class="action-button cancel-button"
                                        >
                                            Cancel
                                        </button>


                                    @else

                                        <button
                                            type="button"
                                            class="action-button disabled-button"
                                            disabled
                                        >
                                            Cancelled
                                        </button>


                                    @endif


                                </div>

                            </td>


                        </tr>


                    @endforeach


                </tbody>

            </table>

        </div>


    @else


        <div class="table-wrapper">

            <div class="empty-state">

                <h2>
                    No bookings yet.
                </h2>

                <p>
                    Customer appointments will appear here.
                </p>

            </div>

        </div>


    @endif


</main>


</body>

</html>