<div class="container-fluid center-on-customize">
    <div class="row mt-3 mb-3 internal-div">
        <form class="col-12" action="{{route('admin-borrows')}}" method="get">
            <div class="col-12 width_customize">
                <select name="searchBy" class="mr-2 width_customize">
                    <option value="" selected>Wyszukaj według...</option>
                    <option value="borrows.id">ID</option>
                    <option value="users.surname">Nazwiska</option>
                    <option value="borrows.user_id">ID użytkownika</option>
                    <option value="borrows.item_id">ID egzemplarza</option>
                </select>
                <select name="orderBy" class="mr-2 width_customize">
                    <option value="" selected>Sortuj według...</option>
                    <option value="borrows.id">ID</option>
                    <option value="borrows.borrow_date_start">Data rozpoczęcia</option>
                    <option value="borrows.borrow_date_end">Data zakonczenia</option>
                    <option value="borrows.status">status</option>
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
            </div>
        </form>
    </div>
</div>
<div class="container-fluid">
    <div id="no-more-tables" class="mb-2">
        <table class="col-md-12 table-bordered table-striped table-condensed cf text-center">
            <thead class="cf bg-dark text-white">
            <tr>
                <th>ID wypożyczenia</th>
                <th>Tytuł</th>
                <th>Autor</th>
                <th>ID egzemplarza</th>
                <th>ID użytkownika</th>
                <th>Imię i nazwisko użytkownika</th>
                <th>data rozpoczęcia</th>
                <th>data zakonczenia</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($compact['borrows'] as $borrow)
                <tr>
                    <th data-title="{{__('view.ID')}}">{{$borrow['id']}}</th>
                    <td data-title="{{__('view.Tytuł')}}">{{$borrow['title']}}</td>
                    <td data-title="{{__('view.Autor')}}">{{$borrow['author']}}</td>
                    <td data-title="ID egzemplarza">{{$borrow['item_id']}}</td>
                    <td data-title="ID użytkownika">{{$borrow['user_id']}}</td>
                    <td data-title="Użytkownik">{{$borrow['first_name'] . ' ' . $borrow['second_name'] . ' ' . $borrow['surname']}}</td>
                    <td data-title="{{__('view.Rozpoczęcie')}}">{{$borrow['borrow_date_start']}}</td>
                    <td data-title="{{__('view.Zakończenie')}}">{{$borrow['borrow_date_end']}}</td>
                    <td data-title="{{__('view.Status')}}">{{$compact['config']['borrows_statuses'][$borrow['status']]['string']}}</td>
                    <td data-title="{{__('view.Akcje')}}">
                        @if($borrow['status'] == 2 || $borrow['status'] == 1)
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Akcje
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item"
                                       href="{{route('admin-borrow-end', ['userId' => $borrow->user_id, 'borrowId' => $borrow->id])}}">Zakończ</a>
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
        {{$compact['borrows']->appends(request()->input())->links("pagination::bootstrap-4")}}
    </div>
</div>

</div>

