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
    @include('user-data-content')
    @yield('usr-data-content')
</main>
@include('footer')
@yield('footer')
</body>
</html>