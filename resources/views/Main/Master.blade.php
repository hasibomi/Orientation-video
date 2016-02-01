<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('meta')

    @yield('title')

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    @yield('css')
</head>
<body>
    @include('Main.Partials.Menu')

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/jquery-2.2.0.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>

    @yield('js')
</body>
</html>