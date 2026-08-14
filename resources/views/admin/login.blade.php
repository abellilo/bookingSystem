<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login | Abellilo</title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

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

            min-height: 100vh;

            background: #f7f3ee;

            color: #201d1b;

            font-family: "DM Sans", sans-serif;
        }


        .admin-login-page {
            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 30px 20px;
        }


        .admin-login-card {
            width: min(450px, 100%);

            background: #ffffff;

            padding: 55px 50px;

            box-shadow:
                0 20px 70px
                rgba(32, 29, 27, 0.08);
        }


        /* BRAND */

        .admin-brand {
            text-align: center;

            margin-bottom: 40px;
        }


        .admin-brand-name {
            font-family: "Playfair Display", serif;

            font-size: 34px;

            line-height: 1;
        }


        .admin-brand-label {
            margin-top: 10px;

            font-size: 9px;

            letter-spacing: 3px;

            color: #817872;

            font-weight: 600;
        }


        /* HEADING */

        .admin-login-heading {
            margin-bottom: 30px;
        }


        .admin-login-heading p {
            margin: 0 0 8px;

            font-size: 10px;

            letter-spacing: 2px;

            text-transform: uppercase;

            color: #817872;
        }


        .admin-login-heading h1 {
            margin: 0;

            font-family: "Playfair Display", serif;

            font-size: 35px;

            font-weight: 500;
        }


        .admin-login-heading h1 em {
            font-weight: 400;
        }


        /* ERRORS */

        .login-errors {
            background: #faf0f0;

            border: 1px solid #ead3d3;

            color: #8b3a3a;

            padding: 13px 15px;

            margin-bottom: 25px;

            font-size: 12px;
        }


        .login-errors ul {
            margin: 0;

            padding-left: 18px;
        }


        .login-errors li + li {
            margin-top: 5px;
        }


        /* FORM */

        .form-group {
            margin-bottom: 22px;
        }


        .form-group label {
            display: block;

            margin-bottom: 8px;

            font-size: 10px;

            letter-spacing: 1.2px;

            text-transform: uppercase;

            font-weight: 600;
        }


        .form-group input {
            width: 100%;

            height: 52px;

            border: 1px solid #ddd4cc;

            background: #fcfaf8;

            padding: 0 15px;

            color: #201d1b;

            font-family: inherit;

            font-size: 13px;

            outline: none;

            transition: border-color 0.2s ease,
                        background 0.2s ease;
        }


        .form-group input:focus {
            border-color: #201d1b;

            background: #ffffff;
        }


        /* BUTTON */

        .admin-login-button {
            width: 100%;

            height: 52px;

            margin-top: 5px;

            border: none;

            background: #201d1b;

            color: #ffffff;

            font-family: inherit;

            font-size: 11px;

            font-weight: 600;

            letter-spacing: 1px;

            text-transform: uppercase;

            cursor: pointer;

            transition: background 0.2s ease;
        }


        .admin-login-button:hover {
            background: #3a3531;
        }


        /* FOOTER */

        .admin-login-footer {
            margin-top: 30px;

            padding-top: 25px;

            border-top: 1px solid #e5ddd6;

            text-align: center;
        }


        .admin-login-footer a {
            color: #817872;

            text-decoration: none;

            font-size: 11px;
        }


        .admin-login-footer a:hover {
            color: #201d1b;
        }


        /* MOBILE */

        @media (max-width: 500px) {

            .admin-login-page {
                padding: 20px 15px;
            }


            .admin-login-card {
                padding: 40px 25px;
            }


            .admin-brand-name {
                font-size: 30px;
            }


            .admin-login-heading h1 {
                font-size: 31px;
            }

        }

    </style>

</head>


<body>


<div class="admin-login-page">


    <div class="admin-login-card">


        <div class="admin-brand">

            <div class="admin-brand-name">
                Abellilo
            </div>

            <div class="admin-brand-label">
                HAIR SALON
            </div>

        </div>


        <div class="admin-login-heading">

            <p>
                Administration
            </p>

            <h1>
                Admin <em>Login.</em>
            </h1>

        </div>


        @if ($errors->any())

            <div class="login-errors">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ url('/admin/login') }}"
            method="POST"
        >

            @csrf


            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="admin@example.com"
                    required
                    autofocus
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >

            </div>


            <button
                type="submit"
                class="admin-login-button"
            >
                Login to Dashboard
            </button>


        </form>


        <div class="admin-login-footer">

            <a href="{{ url('/') }}">
                ← Back to Abellilo
            </a>

        </div>


    </div>


</div>


</body>

</html>