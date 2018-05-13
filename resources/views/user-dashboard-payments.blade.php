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
    <div id="app">
        @include('user-dashboard-payments-content')
        @yield('user-dashboard-payments-content')
    </div>
</main>
@include('footer')
@yield('footer')
@include('payments-data-modal')
</body>
</html>