<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize/css/materialize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/SimpleStarRating.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize/js/materialize.js"></script>
    <script>
    </script>
    <title>Bibliotekarz</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>


    </style>
</head>
<body>
<div id="app">
    @if(Auth::check())
        <topmenulogged></topmenulogged>
    @else
        <topmenu></topmenu>
    @endif
    <books :books='{{json_encode($refactoredBooks)}}'></books>
    @if (Session::has('message'))
        <script>Materialize.toast('{{Session::get('message')}}', 4000)</script>
    @endif
    @isset ($message)
        <script>Materialize.toast('{{$message}}', 4000)</script>
    @endisset
</div>
@include('books')
@include('top-menu')
@include('top-menu-logged')
<script src="js/app.js"></script>
</body>
</html>
