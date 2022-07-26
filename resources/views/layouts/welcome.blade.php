<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Skill Craft</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://kit.fontawesome.com/e32cc22aee.js" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="skill-craft" id="logo_2" src="public/logo_2.png" srcset="/logo_2.png 1x">
                </a>
                <div class="menu">
                    <a class="navbar-brand" href=" {{ url('/') }} ">Home</a>
                    <a class="navbar-brand" href="{{ url('/verify') }}">Verify</a>
                    <a class="navbar-brand" href="{{ url('/request') }}">Request</a>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content2')
        </main>
    </body>
    <footer style="position:relative;margin-top:30px;bottom:0;font-size:18px;font-weight:400;margin-left:500px;">
            <div style="align-items:center;" class="d-flex">
                <i class="fa-regular fa-copyright"></i>
                <span style="padding-left:5px;"><strong>The Skill Craft</strong>.All Rights Reserved.</span>
                <span style="padding-left:2px;">Made by </span>
                <a style="padding-left:2px;color:black;text-decoration:none;" href="https://github.com/polneniprashanth"><strong>Polneni Prashanth</strong>.</a>
            </div>
    </footer>
</html>
