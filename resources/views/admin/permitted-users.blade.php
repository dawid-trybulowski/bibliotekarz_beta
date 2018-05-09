<!doctype html>
<html lang="pl">
@include('admin/head')
@yield('admin/head')
<body>
<header>
    @include('admin/admin-sidebar')
    @yield('admin/admin-sidebar')
    <div id="menu">
        @include('admin/top-menu')
        @yield('admin/top-menu')
    </div>
</header>
<main>
    <div id="page-content-wrapper">
        <div id="app">
            @include('admin/permitted-users-content')
            @yield('admin/permitted-users-content')
        </div>
    </div>
</main>
@include('admin/footer')
@yield('admin/footer')
</body>
</html>