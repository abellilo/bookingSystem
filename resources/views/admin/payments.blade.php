<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Payments | Abellilo Admin</title>

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


        /* SUMMARY */

        .summary {
            display: flex;

            gap: 18px;

            margin-bottom: 25px;
        }


        .summary-card {
            background: white;

            padding: 22px 25px;

            min-width: 220px;

            box-shadow:
                0 10px 40px
                rgba(32, 29, 27, .05);
        }


        .summary-label {
            display: block;

            color: #817872;

            font-size: 9px;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .summary-value {
            display: block;

            margin-top: 8px;

            font-family: "Playfair Display", serif;

            font-size: 28px;
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

            min-width: 900px;

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


        .service {
            font-weight: 600;
        }


        .amount {
            font-weight: 600;

            white-space: nowrap;
        }


        .reference {
            max-width: 180px;

            color: #817872;

            font-size: 9px;

            word-break: break-all;
        }


        .date {
            white-space: nowrap;
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


        .status.success {
            background: #eef7ef;

            color: #46734b;
        }


        .status.pending {
            background: #f8f3e8;

            color: #8b6f35;
        }


        .status.failed {
            background: #f8eeee;

            color: #8b3a3a;
        }


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


            .summary {
                flex-direction: column;
            }


            .summary-card {
                width: 100%;
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


        <a
            href="{{ route('admin.bookings') }}"
            class="header-link"
        >
            Bookings
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
            Payment <em>Transactions.</em>
        </h1>

    </div>


    @php

        $successfulPayments = $payments
            ->where('status', 'success');

        $totalSuccessful = $successfulPayments
            ->sum('amount');

    @endphp


    <div class="summary">


        <div class="summary-card">

            <span class="summary-label">
                Transactions
            </span>

            <span class="summary-value">
                {{ $payments->count() }}
            </span>

        </div>


        <div class="summary-card">

            <span class="summary-label">
                Successful Revenue
            </span>

            <span class="summary-value">
                ₦{{ number_format($totalSuccessful, 2) }}
            </span>

        </div>


    </div>


    @if ($payments->count() > 0)


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
                            Amount
                        </th>

                        <th>
                            Reference
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Paid At
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @foreach ($payments as $payment)


                        <tr>


                            <td>

                                <div class="customer-name">
                                    {{ $payment->user->name }}
                                </div>

                                <div class="customer-email">
                                    {{ $payment->user->email }}
                                </div>

                            </td>


                            <td>

                                <div class="service">
                                    {{ $payment->booking->service }}
                                </div>

                            </td>


                            <td>

                                <span class="amount">
                                    ₦{{ number_format($payment->amount, 2) }}
                                </span>

                            </td>


                            <td>

                                <div class="reference">
                                    {{ $payment->reference }}
                                </div>

                            </td>


                            <td>

                                <span
                                    class="status {{ $payment->status }}"
                                >
                                    {{ ucfirst($payment->status) }}
                                </span>

                            </td>


                            <td>

                                @if ($payment->paid_at)

                                    <div class="date">

                                        {{ \Carbon\Carbon::parse($payment->paid_at)->format('M j, Y') }}

                                        <br>

                                        {{ \Carbon\Carbon::parse($payment->paid_at)->format('g:i A') }}

                                    </div>

                                @else

                                    —

                                @endif

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
                    No transactions yet.
                </h2>

                <p>
                    Successful and pending payments will appear here.
                </p>

            </div>

        </div>


    @endif


</main>


</body>

</html>