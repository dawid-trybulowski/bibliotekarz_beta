<div class="container-fluid center-on-customize">
    <div class="row col-12 mt-3 mb-3 internal-div">
        <form class="col-8 width_customize" action="{{route('admin-items')}}" method="get">
            <select name="searchBy" class="mr-2 width_customize">
                <option value="" selected>Wyszukaj według...</option>
                <option value="items.id">ID</option>
                <option value="title">Tytuł</option>
                <option value="author">Autor</option>
            </select>
            <select name="orderBy" class="mr-2 width_customize">
                <option value="" selected>Sortuj według...</option>
                <option value="id">ID</option>
                <option value="created_at">Data dodania</option>
                <option value="updated_at">Data modyfikacji</option>
                <option value="author">Autor</option>
                <option value="title">Tytuł</option>
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
        <div class="col-4 text-right width_customize center-on-customize" style="font-size: 150%">
            <a href="{{route('admin-item-add-show')}}">
                <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="button"
                        name="submit" value="search">
                    Dodaj <i class="fas fa-plus-circle"></i>
                </button>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div id="no-more-tables">
        <table class="col-md-12 table-bordered table-striped table-condensed cf text-center">
            <thead class="cf bg-dark text-white">
            <tr>
                <th>ID egzemplarza</th>
                <th>Id pozycji</th>
                <th>Tytuł pozycji</th>
                <th>Autor pozycji</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($compact['items'] as $item)
                <tr>
                    <td data-title="{{__('view.ID')}}">{{$item['id']}}</td>
                    <td data-title="ID książki">{{$item['book_id']}}</td>
                    <td data-title="{{__('view.Tytuł')}}">{{$item['title']}}</td>
                    <td data-title="{{__('view.Autor')}}">{{$item['author']}}</td>
                    <td data-title="{{__('view.Status')}}">{{$compact['config']['items_statuses'][$item['status']]['string']}}</td>
                    <td data-title="{{__('view.Akcje')}}">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                Akcje
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                   href="{{route('admin-item-edit', ['itemId' => $item['id']])}}">Edytuj</a>
                                <a class="dropdown-item"
                                   href="{{route('admin-item-delete', ['itemId' => $item['id']])}}">
                                    Usun</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="center-align ">
        {{$compact['items']->appends(request()->input())->links("pagination::bootstrap-4")}}
    </div>
</div>


