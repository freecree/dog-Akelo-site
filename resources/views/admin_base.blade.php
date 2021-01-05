<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Iz Vladeniya Akello </title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
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
