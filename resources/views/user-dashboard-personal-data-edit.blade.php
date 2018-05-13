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
    @include('user-dashboard-personal-data-edit-content')
    @yield('user-dashboard-personal-data-edit-content')
</main>
@include('footer')
@yield('footer')
</body>
</html>