<div class="container-fluid center-on-customize">
    <div class="row col-12 mt-3 mb-3 internal-div">
        <form class="col-8 width_customize" action="{{route('admin-genres')}}" method="get">
            <select name="searchBy" class="mr-2 width_customize">
                <option value="" selected>Wyszukaj według...</option>
                <option value="id">ID</option>
                <option value="name">Nazwa</option>
            </select>
            <select name="orderBy" class="mr-2 width_customize">
                <option value="" selected>Sortuj według...</option>
                <option value="id">ID</option>
                <option value="name">Nazwa gatunku</option>
                <option value="created_at">Data dodania</option>
                <option value="updated_at">Data modyfikacji</option>
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
            <a href="{{route('admin-genre-add-show')}}">
                <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="button"
                        name="submit" value="search">
                    Dodaj <i class="fas fa-plus-circle"></i>
                </button>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div id="no-more-tables" class="mb-2">
        <table class="col-md-12 table-bordered table-striped table-condensed cf text-center">
            <thead class="cf bg-dark text-white">
            <tr>
                <th>ID gatunku</th>
                <th>Nazwa gatunku</th>
                <th>Data utworzenia</th>
                <th>Data edycji</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($compact['genres'] as $genre)
                <tr>
                    <th data-title="{{__('view.ID')}}">{{$genre['id']}}</th>
                    <td data-title="Nazwa gatunku">{{$genre['name']}}</td>
                    <td data-title="Data utworzenia">{{$genre['created_at'] ?: '-'}}</td>
                    <td data-title="Data edycji">{{$genre['updated_at'] ?: '-'}}</td>
                    <td data-title="Akcje">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                Akcje
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                   href="{{route('admin-genre-edit-show', ['genreId' => $genre['id']])}}">Edytuj</a>
                                <a class="dropdown-item"
                                   href="{{route('admin-genre-delete', ['genreId' => $genre['id']])}}">Usuń</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination center pagination-sm flex-sm-wrap">
        {{$compact['genres']->appends(request()->input())->links("pagination::bootstrap-4")}}
    </div>
</div>


