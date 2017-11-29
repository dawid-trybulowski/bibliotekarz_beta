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
</div>
<div class="row refactored-row" style="display:inherit">
<div class="col s6 ">
    <div class="row refactored-row">
        <div class="col s12">
            <div class="col s11 ">
                <h5>Dane konta {{Auth::user()->email}}</h5>
            </div>
            <div class="col s1 centered">
                <i class="fa fa-angle-double-down" aria-hidden="true" style="font-size: 300%"></i>
            </div>
        </div>
    </div>
    <div class="row refactored-row details" style="display:flex; margin-bottom: 2px;" id="account_data">
        <div class="col s12">
            <div class="col s6 card-panel teal cardLong centered labelCard">
                Id
            </div>
            <div class="col s6 card-panel teal cardLong centered">
                {{Auth::user()->id}}
            </div>
            <div class="col s6 card-panel teal cardLong centered labelCard">
                Email
            </div>
            <div class="col s6 card-panel teal cardLong centered">
                {{Auth::user()->email}}
            </div>
            <div class="form-group" style="text-align:center">
                <div class="input-field col s12">
                    <div>
                        <a class="waves-effect waves-light btn biggerButton waves-input-wrapper"
                           href="{{ route('password.request') }}">
                            Zmien adres e-mail
                        </a>
                    </div>
                    <div>
                        <a class="waves-effect waves-light btn biggerButton waves-input-wrapper"
                           href="{{ route('password.request') }}">
                            Zmien hasło
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row refactored-row">
        <div class="col s12">
            <div class="col s11">
                <h5>Dane osobowe i adres</h5>
            </div>
            <div class="col s1 centered">
                <i class="fa fa-angle-double-down" aria-hidden="true" style="font-size: 300%"></i>
            </div>
        </div>
    </div>
    <div class="row refactored-row details" style="display:flex; margin-bottom: 2px;" id="personal_data">
        <div class="col s12">
            <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                Imię
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                {{Auth::user()->first_name}}
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                Drugie imię
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                {{Auth::user()->second_name}}
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                Nazwisko
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                {{Auth::user()->surname}}
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                Miasto
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                {{Auth::user()->city}}
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                Ulica
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                {{Auth::user()->street}}
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                Numer domu
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                {{Auth::user()->house_number}}
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                Numer mieszkanie
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                {{Auth::user()->apartment_number}}
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                Kod pocztowy
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                {{Auth::user()->post_code}}
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                Data urodzenia
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                {{Auth::user()->birth_date}}
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                Konto zweryfikowane?
            </div>
            <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                {{Auth::user()->verified ? 'tak' : 'nie'}}
            </div>
            <div class="form-group" style="text-align:center">
                <div class="input-field col s12">
                    <div>
                        <a class="waves-effect waves-light btn biggerButton waves-input-wrapper"
                           href="{{ route('password.request') }}">
                            Edytuj dane osobowe
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="col s12 ">
        <div class="row refactored-row">
            <div class="col s12">
                <div class="col s11">
                    <h5>Historia rezerwacjia</h5>
                </div>
                <div class="col s1 centered">
                    <i class="fa fa-angle-double-down" aria-hidden="true" style="font-size: 300%"></i>
                </div>
            </div>
        </div>
        <div class="row refactored-row details" style="display:flex; margin-bottom: 2px;">
            <div class="col s12">
                <div class="col s1 card-panel teal userDashboardCard centered labelCard">
                    Nr
                </div>
                <div class="col s3 card-panel teal userDashboardCard centered dataCard">
                    Tytuł
                </div>
                <div class="col s2 card-panel teal userDashboardCard centered labelCard">
                    Autor
                </div>
                <div class="col s2 card-panel teal userDashboardCard centered dataCard">
                    Data rezerwacji
                </div>
                <div class="col s2 card-panel teal userDashboardCard centered labelCard">
                    Koniec rezerwacji
                </div>
                <div class="col s2 card-panel teal userDashboardCard centered dataCard">
                    status
                </div>
            </div>
        </div>
    </div>
</div>
    @include('top-menu')
    @include('top-menu-logged')
    <script src="js/app.js"></script>
</body>
</html>