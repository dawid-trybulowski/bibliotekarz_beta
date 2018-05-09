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
</head>
<style>
    .smallButton {
        display: inline !important;
        border-radius: 10px !important;
        padding: 0 1rem !important;
        font-size: 90% !important;
        line-height: 0px !important;
        background-color: #fff;
        color:#000 !important;
        border:solid 1px !important;

    }

    .biggerButton {
        display: inline !important;
        border-radius: 10px !important;
        padding: 0 1rem !important;
        font-size: 110% !important;
        border:solid 1px !important;;
        background-color: #444;
        color:#fff !important;
    }

    .availabeButton {
        background-color:#55c75a !important;
    }

    .unavailableButton {
        background-color:#f95252 !important;
    }

    .refactored-row {
        display: flex;
        margin-bottom: 2px !important;
        background-color: #fff !important;
        color:#000 !important;
        border-bottom:solid 1px !important;
    }

    .details {
        background-color: #fff !important;
    }

    .cardShort {
        background-color: #fff !important;
        border-radius: 10px !important;
        padding: 10px !important;
        color:#000 !important;
        border:solid 1px !important;;
    }

    .cardLong {
        background-color: #fff !important;
        border-radius: 10px !important;
        padding: 10px !important;
        color:#000 !important;
        border:solid 1px !important;;
    }

    .cardLongRating {
        background-color: #cf0c4a !important;
        border-radius: 10px !important;
        padding: 10px !important;
    }
     body {
         display: flex;
         min-height: 100vh;
         flex-direction: column;
     }

    main {
        flex: 1 0 auto;
    }

</style>
<body>

    <div id="app">
        <header>
        @include('top-menu')
        </header>

        @yield('content')

    </div>
    <main>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @include('footer')
</body>
</html>

