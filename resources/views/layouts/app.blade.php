<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FREEK:{{ $title }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/css/main.css', 'resources/js/app.js', 'resources/js/custom.js'])
    @else
        <style>
            body {background: red; font-family: Arial, sans-serif; width: 100%;}
        </style>
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

</head>
<style>
    .content .post-full {
        background: dodgerblue;
        padding: 20px 10px;
    }

    .content .post-full .description {
        background: white;
        border: 1px solid rgba(111, 111, 111, 0.4);
        box-shadow: 0 2px 10px rgba(200, 160, 200, 0.5);
        padding: 2px 4px;
    }

    .form {
        margin: 0 auto;
        padding: 20px 30px;
    }

    .form input {
        border: 3px solid #6264b1;
        border-radius: 10px;
        margin: 10px 3px;
        padding: 3px 5px;
    }

    .my_page {
        display: flex;
        flex-direction: column;
    }

    .my_page .avatar {
        border-radius: 50%;
        display: block;
        height: 1%;
        width: 7%;
    }

</style>
<body>

<div id="page">
    <header id="header">
        <div class="container_my">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="full_header">
                    <a class="navbar-brand" href="{{ route('main.index') }}">FREEK</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">Main</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('main.reals') }}">Reals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Home</a>
                        </li>
                    </ul>
                    <div class="auth_user">
                        <!-- Guest Links: Only show when user is NOT logged in -->
                        @guest
                            <a class="nav-link" href="{{ route('auth.login') }}">Log In</a>
                            <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                        @endguest

                        <!-- Authenticated Links: Only show when user IS logged in -->
                        @auth
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="display: inline; border: none; background: none;">Log Out</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="content">
        @yield("content")
    </div>
    <footer id="footer">
        Copyright &copy;2024
    </footer>
</div>

</body>
</html>
