<!doctype html>
<html lang="pl">
@include('head')
@yield('head')
<body>
<header>
    @include('search-sidebar')
    @yield('search-sidebar')
    <div id="menu">
        @include('top-menu')
        @yield('top-menu')
    </div>
</header>
<main >
    <div id="page-content-wrapper">
        <div id="app">
            @include('books')
            @yield('books')
        </div>
    </div>
</main>
@include('footer')
@yield('footer')
</body>
</html>