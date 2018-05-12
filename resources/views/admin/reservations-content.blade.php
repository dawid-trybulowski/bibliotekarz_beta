<div class="container-fluid center-on-customize">
    <div class="row col-12 mt-3 mb-3 internal-div">
        <form class="col-12 width_customize" action="{{route('admin-reservations')}}" method="get">
            <select name="searchBy" class="mr-2 width_customize">
                <option value="" selected>Wyszukaj według...</option>
                <option value="reservations.id">ID</option>
                <option value="users.surname">Nazwiska</option>
                <option value="reservations.user_id">ID użytkownika</option>
                <option value="reservations.borrow_id">ID wypożyczenia</option>
            </select>
            <select name="orderBy" class="mr-2 width_customize">
                <option value="" selected>Sortuj według...</option>
                <option value="reservations.id">ID</option>
                <option value="reservations.reservation_date_start">Data rozpoczęcia</option>
                <option value="reservations.reservation_date_end">Data zakonczenia</option>
                <option value="reservations.status">status</option>
            </select>
            <select name="orderDirection" class="mr-2 width_customize">
                <option value="desc">Malejąco</option>
                <option value="asc">Rosnąco</option>
            </select>
            <input id="text" type="search" name="text" class="mr-2 width_customize ">
            <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit"
                    name="submit" value="search">
                Wyszukaj
            </button>
        </form>
    </div>
</div>
<div class="container-fluid">
        <div id="no-more-tables" class="mb-2">
            <table class="col-md-12 table-bordered table-striped table-condensed cf text-center">
                <thead class="cf bg-dark text-white">
                <tr>
                    <th >ID rezerwacji</th>
                    <th >Tytuł</th>
                    <th >Autor</th>
                    <th >ID egzemplarza</th>
                    <th >ID użytkownika</th>
                    <th >Imię i nazwisko użytkownika</th>
                    <th >Id wypożyczenia</th>
                    <th >data rozpoczęcia</th>
                    <th >data zakonczenia</th>
                    <th >Status</th>
                    <th >Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($compact['reservations'] as $reservation)
                    <tr>
                        <td  data-title="{{__('view.ID')}}">{{$reservation['id']}}</td>
                        <td  data-title="{{__('view.Tytuł')}}">{{$reservation['title']}}</td>
                        <td  data-title="{{__('view.Autor')}}">{{$reservation['author']}}</td>
                        <td  data-title="ID egzemplarza">{{$reservation['item_id']}}</td>
                        <td  data-title="ID użytkownika">{{$reservation['user_id']}}</td>
                        <td  data-title="Użytkownik">{{$reservation['first_name'] . ' ' . $reservation['surname']}}</td>
                        <td  data-title="ID wypożyczenia">{{$reservation['borrow_id'] ?: '-'}}</td>
                        <td  data-title="{{__('view.Rozpoczęcie')}}">{{$reservation['reservation_date_start'] ?: '-'}}</td>
                        <td  data-title="{{__('view.Zakończenie')}}">{{$reservation['reservation_date_end'] ?: '-'}}</td>
                        <td  data-title="{{__('view.Status')}}">{{$compact['config']['reservations_statuses'][$reservation['status']]['string']}}</td>
                        <td  data-title="{{__('view.Akcje')}}">
                            @if(!$reservation['borrow_id'] && $reservation['status'] == 1)
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Akcje
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                           href="{{route('admin-reservation-cancel', ['reservationId' => $reservation['id'], 'userId' => $reservation['user_id']])}}">Anuluj</a>
                                        <a class="dropdown-item"
                                           href="{{route('admin-reservation-confirm', ['reservationId' => $reservation['id']])}}">Potwierdź</a>
                                    </div>
                                </div>
                                @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    <div class="pagination center pagination-sm flex-sm-wrap">
        {{$compact['reservations']->appends(request()->input())->links("pagination::bootstrap-4")}}
    </div>
</div>

</div>

