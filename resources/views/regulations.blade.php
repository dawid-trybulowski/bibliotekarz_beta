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
    @include('regulations-content')
    @yield('regulations-content')
</main>
@include('footer')
@yield('footer')
</body>
</html>