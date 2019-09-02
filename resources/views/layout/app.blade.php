<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Makklays" />
    <meta name="keywords" content="Makklays" />
    <meta name="author" content="Makklays" />

    <meta property="og:title" content="News" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://sitename" />
    <meta property="og:image" content="http://sitename/all_news.png" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" >

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/myapp.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('js/package.js') }}" type="text/javascript" ></script>

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
