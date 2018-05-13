@if(Auth::check())
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
        <a class="navbar-brand" href="{{route('index')}}">Biblioteka w Gryfinie</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->login}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('dashboard')}}">Panel użytkownika</a>
                        <a class="dropdown-item cursorPointer" @click="showActiveReservationsModal()">Aktywne
                            rezerwacje</a>
                        <a class="dropdown-item cursorPointer" @click="showActiveBorrowsModal()">Aktywne
                            wypożyczenia</a>
                        <a class="dropdown-item cursorPointer" @click="showWaitingListModal()">Zamówione pozycje</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Wyloguj</a>
                    </div>
                </li>
                @if(isset($compact['route']) && $compact['route'] == 'index')
                    <li class="nav-item" id="search">
                        <a class="nav-link cursorPointer">Szukaj</a>
                    </li>
                @endif
                @if(Auth::User()->permissions > 1)
                    <li class="nav-item" id="adminPanel">
                        <a class="nav-link cursorPointer" href="{{route('admin-index')}}">Panel administracyjny</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@else
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('index')}}">Biblioteka w Gryfinie</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Rejestracja <span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                </li>
                @if(isset($compact['route']) && $compact['route'] == 'index')
                    <li class="nav-item" id="search">
                        <a class="nav-link cursorPointer">Szukaj</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif