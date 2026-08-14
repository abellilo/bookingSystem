<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>
</head>

<body>

    <h1>Admin Dashboard</h1>

    <p>
        Welcome, {{ Auth::user()->name }}
    </p>

    <hr>

    <h2>Bookings</h2>

    <a href="#">
        View Bookings
    </a>

    <h2>Payments</h2>

    <a href="#">
        View Payments
    </a>

    <br><br>

    <form action="{{ url('/admin/logout') }}" method="POST">
        @csrf

        <button type="submit">
            Logout
        </button>
    </form>

</body>
</html>