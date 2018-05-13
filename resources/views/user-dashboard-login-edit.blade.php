<!doctype html>
<html lang="pl">
@include('head')
@yield('head')
<body>
<header>
    @include('top-menu')
    @yield('top-menu')
</header>
<main>
    @include('user-dashboard-login-edit-content')
    @yield('user-dashboard-login-edit-content')
</main>
@include('footer')
@yield('footer')
</body>
</html>