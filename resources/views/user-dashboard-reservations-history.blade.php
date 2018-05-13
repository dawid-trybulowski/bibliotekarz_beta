<!doctype html>
<html lang="pl">
@include('head')
@yield('head')
<body>
<header>
    <div id="menu">
        @include('top-menu')
        @yield('top-menu')
    </div>
</header>
<main>
    @include('user-dashboard-reservations-history-content')
    @yield('user-dashboard-reservations-history-content')
</main>
@include('footer')
@yield('footer')
</body>
</html>