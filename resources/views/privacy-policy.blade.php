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
    @include('privacy-policy-content')
    @yield('privacy-policy-content')
</main>
@include('footer')
@yield('footer')
</body>
</html>