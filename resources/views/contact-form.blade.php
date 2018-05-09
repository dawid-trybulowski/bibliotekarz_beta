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
    @include('contact-form-content')
    @yield('contact-form-content')
</main>
@include('footer')
@yield('footer')
</body>
</html>