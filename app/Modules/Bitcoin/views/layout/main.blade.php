<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Exchange Bitcoin" />
    <meta name="keywords" content="Exchange Bitcoin" />
    <meta name="author" content="makklays" />

    <meta property="og:title" content="Exchange Bitcoin" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="bitcoin.png" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/vue.js') }}" type="text/javascript"></script>


    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" media="all" href="/bootstrap-4.3.1/css/bootstrap.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my-style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        <div class="" style="padding-top:25px; padding-bottom:25px; ">
            @yield('content')
        </div>

    </div>
</body>
</html>
