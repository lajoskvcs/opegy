<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Operációs rendszerek 1</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-67517211-2', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>
<nav class="nav">
    <div class="nav-left nav-menu">
        <a href="{{ route('excersise:index') }}" class="nav-item is-tab {{ (Route::currentRouteName() != 'group:groups' && Route::currentRouteName() != 'group:group')? 'is-active' : null}}">Feladatok</a>
        <a href="{{ route('group:groups') }}" class="nav-item is-tab {{ (Route::currentRouteName() == 'group:groups' || Route::currentRouteName() == 'group:group')? 'is-active' : null}}">Feladat csoportok</a>
    </div>
    <div class="nav-right nav-menu">
        @if(Auth::user()->level == 2)
        <a href="/admin/" class="nav-item is-tab">Adminisztráció</a>
        @endif
        <span class="nav-item is-tab">
            <i class="fa fa-user" style="margin-right: 8px;"></i>
            {{ Auth::user()->name}} - {{Auth::user()->neptun}}
        </span>

        <a href="/logout" type="submit" class="nav-item is-tab">Kijelentkezés</a>

    </div>
</nav>

<section class="section">
    <div class="container">
        @yield('content')
    </div>
</section>
</body>
</html>
