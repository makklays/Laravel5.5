<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="Makklays" />
    <meta name="keywords" content="Makklays" />
    <meta name="author" content="Makklays" />

    <meta property="og:title" content="Makklays" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://makklays.com.ua" />
    <meta property="og:image" content="http://makklays.com.ua/img/dog.jpg" />

    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon" >

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/myapp.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('js/package.js') }}" type="text/javascript" ></script>

    <!-- datatables js -->
    <!--script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!--link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/package.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            /*font-weight: 100;*/
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Главная</a>
            @else
                <a href="{{ route('all_authors') }}">Авторы</a>
                <a href="{{ route('all_books') }}">Книги</a>
                <a href="{{ route('login') }}">Логин</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    @endif

    <main class="" style="padding-top:25px; padding-bottom:25px;">
        @yield('content')
    </main>

</div>
</body>
</html>
