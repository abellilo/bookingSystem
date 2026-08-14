<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Create Account | Abellilo</title>


    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <!-- Font Awesome -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- Auth CSS -->

    <link
        rel="stylesheet"
        href="{{ asset('css/auth.css') }}"
    >

</head>


<body>


<!-- HEADER -->

<header class="auth-header">

    <a
        href="{{ url('/') }}"
        class="auth-logo"
    >
        Abellilo
    </a>


    <a
        href="{{ url('/') }}"
        class="back-home"
    >

        <i class="fa-solid fa-arrow-left"></i>

        Back to Home

    </a>

</header>



<!-- MAIN -->

<main class="auth-page">


    <div class="auth-container">


        <!-- IMAGE -->

        <div class="auth-image">

            <img
                src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=1200&q=90"
                alt="Abellilo Hair Salon"
            >


            <div class="image-overlay"></div>


            <div class="image-content">

                <p>
                    ABELLILO HAIR SALON
                </p>

                <h2>
                    Your style.
                    <em>Your confidence.</em>
                </h2>

            </div>

        </div>



        <!-- FORM -->

        <div class="auth-form-container">


            <div class="auth-heading">

                <div class="section-label">

                    <span></span>

                    <p>
                        JOIN ABELLILO
                    </p>

                </div>


                <h1>
                    Create your
                    <em>account.</em>
                </h1>


                <p>
                    Create an account to book sessions,
                    manage your appointments and keep
                    your Abellilo experience simple.
                </p>

            </div>



            <!-- ERRORS -->

            @if ($errors->any())

                <div class="error-box">

                    <div class="error-title">

                        <i class="fa-solid fa-circle-exclamation"></i>

                        <span>
                            Please check the following:
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



            <!-- REGISTER FORM -->

            <form
                action="{{ url('/register') }}"
                method="POST"
                class="auth-form"
            >

                @csrf


                <!-- NAME -->

                <div class="form-group">

                    <label for="name">
                        Full Name
                    </label>


                    <div class="input-wrapper">

                        <i class="fa-regular fa-user"></i>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enter your full name"
                            required
                        >

                    </div>

                </div>



                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>


                    <div class="input-wrapper">

                        <i class="fa-regular fa-envelope"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                        >

                    </div>

                </div>



                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>


                    <div class="input-wrapper">

                        <i class="fa-solid fa-lock"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Create a password"
                            required
                        >

                    </div>

                </div>



                <!-- CONFIRM PASSWORD -->

                <div class="form-group">

                    <label for="password_confirmation">
                        Confirm Password
                    </label>


                    <div class="input-wrapper">

                        <i class="fa-solid fa-shield-halved"></i>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Confirm your password"
                            required
                        >

                    </div>

                </div>



                <!-- BUTTON -->

                <button
                    type="submit"
                    class="auth-button"
                >

                    Create Account

                    <i class="fa-solid fa-arrow-right"></i>

                </button>


            </form>



            <!-- LOGIN -->

            <div class="auth-switch">

                <span>
                    Already have an account?
                </span>


                <a href="{{ route('login') }}">
                    Login instead
                </a>

            </div>


        </div>

    </div>

</main>



<footer class="auth-footer">

    <p>
        © {{ date('Y') }} Abellilo.
        All rights reserved.
    </p>

</footer>


</body>

</html>