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
<main >
    <div id="page-content-wrapper">
        <div id="app">
            @include('book-page-content')
            @yield('book-page-content')
        </div>
    </div>
</main>
@include('footer')
@yield('footer')
</body>
</html>