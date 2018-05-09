<!doctype html>
<html lang="pl">
@include('admin/head')
@yield('admin/head')
<body>
<header>
    @include('admin/admin-sidebar')
    @yield('admin/admin-sidebar')
    @include('admin/top-menu')
    @yield('admin/top-menu')
</header>
<main>
    <div id="page-content-wrapper">
        <div id="app">
            @include('admin/settings-view-content')
            @yield('admin/settings-view-content')
        </div>
    </div>
</main>
@include('admin/footer')
@yield('admin/footer')
</body>
</html>