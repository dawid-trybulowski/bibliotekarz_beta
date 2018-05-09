<div id="sidebar-wrapper" class="sidebar-wrapper">
    <div class="container-fluid pl-0 pr-0 text-light">
        <ul class="sidebar-nav">
            <li class="sidebar-brand bg-secondary">
                <span class="text-white">
                    Zarządzanie wypożyczeniami
                </span>
            </li>
            <li>
                <a href="{{route('admin-reservations')}}">Rezerwacje</a>
            </li>
            <li>
                <a href="{{route('admin-borrows')}}">Wypożyczenia</a>
            </li>
            <li class="sidebar-brand bg-secondary">
                <span class="text-white">
                    Zarządzanie zasobami
                </span>
            </li>
            <li>
                <a href="{{route('admin-books')}}">Pozycje</a>
            </li>
            <li>
                <a href="{{route('admin-items')}}">Egzemplarze</a>
            </li>
            <li>
                <a href="{{route('admin-genres')}}">Gatunki</a>
            </li>
            <li>
                <a href="{{route('admin-categories')}}">Kategorie</a>
            </li>
            <li>
                <a href="{{route('admin-age-categories')}}">Kategorie wiekowe</a>
            </li>
            <li class="sidebar-brand bg-secondary">
                <span class="text-white">
                    Zarządzanie użytkownikami
                </span>
            </li>
            <li>
                <a href="{{route('admin-users')}}">Użytkownicy</a>
            </li>
            <li>
                <a href="{{route('admin-payments')}}">Płatności użytkowników</a>
            </li>
            <li>
                <a href="{{route('admin-permitted-users')}}">Pracownicy i administratorzy</a>
            </li>
            <!--admin access -->
            @if(Auth::User()->permissions >= 3)
                <li class="sidebar-brand bg-secondary">
                <span class="text-white">
                    Ustawienia
                </span>
                </li>
                <li>
                    <a href="{{route('settings-general')}}">Ogólne</a>
                </li>
                <li>
                    <a href="{{route('settings-view')}}">Wyświetlanie</a>
                </li>
                <li>
                    <a href="{{route('settings-payments')}}">Płatności</a>
                </li>
            {{--<li>--}}
            {{--<a href="{{route('settings-email')}}">Szablony e-mail</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="{{route('settings-database')}}">Baza danych</a>--}}
            {{--</li>--}}
        @endif
        <!--admin access -->
            <div class="form-group text-center max-width">
                <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="button" id="searchHide">Zwiń</button>
            </div>
        </ul>
    </div>
</div>