<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/web-ico-png.png')}}" type="image/x-icon">
    @yield("page_css")
</head>
<body>


<nav class="navbar navbar-expand-md navbar-dark fixed-top app-nav bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'Webdev Inc,') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>

        </div>
    </div>
</nav>

<main role="main" class="container" id="app">
    @yield('content')
</main>

<footer>
    <div class="container-fluid text-white text-center">
        <div class="py-5 px-2">
            <p>&copy; 1996 - {{date('Y')}}, {{config('app.name', 'Webdev Inc')}}. All rights reserved.</p>
        </div>
    </div>
</footer>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
