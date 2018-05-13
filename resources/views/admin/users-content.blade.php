<div class="container-fluid center-on-customize">
    <div class="row col-12 mt-3 mb-3 internal-div">
        <form class="col-12 width_customize" action="{{route('admin-users')}}" method="get">
            <select name="searchBy" class="mr-2 width_customize">
                <option value="" selected>Wyszukaj według...</option>
                <option value="id">ID</option>
                <option value="surname">Nazwisko</option>
                <option value="city">Miasto</option>
                <option value="card_number">Numer kart bibliotecznej</option>
            </select>
            <select name="orderBy" class="mr-2 width_customize">
                <option value="" selected>Sortuj według...</option>
                <option value="id">ID</option>
                <option value="birth_date">Data urodzenia</option>
                <option value="updated_at">Imię</option>
            </select>
            <select name="orderDirection" class="mr-2 width_customize">
                <option value="desc">Malejąco</option>
                <option value="asc">Rosnąco</option>
            </select>
            <input id="text" type="search" name="text" class="mr-2 width_customize">
            <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit"
                    name="submit" value="search">
                Wyszukaj
            </button>
        </form>
    </div>
</div>
<div class="container-fluid">
    <div id="no-more-tables">
        <table class="col-md-12 table-bordered table-striped table-condensed cf text-center">
            <thead class="cf bg-dark text-white">
            <tr>
                <th>ID użytkownika</th>
                <th>Imię</th>
                <th>Drugie imię</th>
                <th>Nazwisko</th>
                <th>Miasto</th>
                <th>Data urodzenia</th>
                <th>Numer karty bibliotecznej</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($compact['users'] as $user)
                <tr>
                    <td data-title="{{__('view.ID')}}">{{$user['id']}}</td>
                    <td data-title="Imię">{{$user['first_name']}}</td>
                    <td data-title="Drugie imię">{{$user['second_name'] ?: '-'}}</td>
                    <td data-title="Nazwisko">{{$user['surname']}}</td>
                    <td data-title="Miasto">{{$user['city']}}</td>
                    <td data-title="Data urodzenia">{{$user['birth_date']}}</td>
                    <td data-title="Nr karty">{{$user['card_number']}}</td>
                    <td data-title="Status">{{$compact['config']['users_statuses'][$user['status']]['string']}}</td>
                    <td data-title="Akcje">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                Akcje
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                   href="{{route('admin-user-edit-show', ['userId' => $user['id']])}}">Edytuj</a>
                                @if($user['status'] < 2)
                                    <a class="dropdown-item"
                                       href="{{route('user-close-account', ['userId' => $user['id']])}}">Zamknij
                                        konto</a></div>
                            @else
                                <a class="dropdown-item"
                                   href="{{route('user-open-account', ['userId' => $user['id']])}}">Otwórz konto</a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="center-align ">
        {{$compact['users']->links("pagination::bootstrap-4")}}
    </div>
</div>


