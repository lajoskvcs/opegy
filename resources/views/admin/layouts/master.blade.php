<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Operációs rendszerek 1</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

</head>
<body>
<nav class="nav">
    <div class="nav-left nav-menu">
        <a href="/" class="nav-item is-tab">Vissza az oldalra</a>
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
        <div class="columns">
            <div class="column is-2">
                <aside class="menu">
                    <p class="menu-label">
                        Megoldások
                    </p>
                    <ul class="menu-list">
                        <li><a href="{{ route('admin:index') }}" class="{{ (Route::currentRouteName() == 'admin:index')? 'is-active':null }}">Várakozó megoldások</a></li>
                        <li><a href="{{ route('admin:bad') }}" class="{{ (Route::currentRouteName() == 'admin:bad')? 'is-active':null }}">Hibás megoldások</a></li>
                        <li><a href="{{ route('admin:solved') }}" class="{{ (Route::currentRouteName() == 'admin:solved')? 'is-active':null }}">Elfogadott megoldások</a></li>
                    </ul>
                    <p class="menu-label">Feladatok</p>
                    <ul class="menu-list">
                        <li><a href="{{ route('admin:excersise:list') }}">Feladatok áttekintése</a></li>
                        <li><a href="{{ route('admin:excersise:add') }}">Feladat hozzáadása</a></li>
                    </ul>
                    <p class="menu-label">Csoportok</p>
                    <ul class="menu-list">
                        <li><a href="{{ route('admin:group:list') }}">Csoportok kezelése</a></li>
                    </ul>
                    <p class="menu-label">Felhasználók</p>
                    <ul class="menu-list">
                        <li><a href="{{ route('admin:user:list') }}">Felhasználók kezelése</a></li>
                    </ul>

                </aside>
            </div>
            <div class="column">
        @yield('content')
            </div>
        </div>
    </div>
</section>
</body>
</html>
