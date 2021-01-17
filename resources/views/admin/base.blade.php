<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Iz Vladeniya Akello </title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="{{asset('css/popup.css')}}">

    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
{{--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
    <script src="{{asset('js/main.js')}}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header class="header header-subpages" >
        <div class="container">
            <a href="/">Вийти</a>
        </div>

    </header>

    <section class="admin-panel">
        @yield('content')
    </section>


</body>
