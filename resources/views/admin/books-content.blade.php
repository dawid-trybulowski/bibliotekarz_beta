<div class="container-fluid center-on-customize">
    <div class="row col-12 mt-3 mb-3 internal-div">
        <form class="col-8 width_customize" action="{{route('admin-books')}}" method="get">
            <input type="hidden" value="adminSearch" name="action">
            <select name="searchBy" class="mr-2 width_customize">
                <option value="" selected>Wyszukaj według...</option>
                <option value="books.id">ID</option>
                <option value="books.title">Tytuł</option>
                <option value="books.author">Autor</option>
                <option value="books.isbn">ISBN</option>
            </select>
            <select name="orderBy" class="mr-2 width_customize">
                <option value="" selected>Sortuj według...</option>
                <option value="books.id">ID</option>
                <option value="books.created_at">Data dodania</option>
                <option value="books.updated_at">Data modyfikacji</option>
                <option value="books.author">Autor</option>
                <option value="books.title">Tytuł</option>
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
        <div class="col-4 text-right center-on-customize width_customize" style="font-size: 150%">
            <a href="{{route('admin-book-add-show')}}">
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
                <th>ID pozycji</th>
                <th>Tytuł</th>
                <th>Autor</th>
                <th>Kategoria</th>
                <th>Data dodania</th>
                <th>Data modyfikacji</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($compact['books'] as $book)
                <tr>
                    <td data-title="{{__('view.ID')}}">{{$book['id']}}</td>
                    <td data-title="{{__('view.Tytuł')}}">{{$book['title']}}</td>
                    <td data-title="{{__('view.Autor')}}" class="break-word-all">{{$book['author']}}</td>
                    <td data-title="Kategoria" class="break-word-all">{{$book['categories_name']}}</td>
                    <td data-title="Dodane">{{$book['created_at'] ?: '-'}}</td>
                    <td data-title="Modyfikacja">{{$book['updated_at'] ?: '-'}}</td>
                    <td data-title="{{__('view.Status')}}">{{$compact['config']['books_statuses'][$book->status]['string']}}</td>
                    <td data-title="{{__('view.Akcje')}}">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                Akcje
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                   href="{{route('admin-book-edit-show', ['bookId' => $book['id']])}}">Edytuj</a>
                                <a class="dropdown-item cursorPointer" @click="showBorrowForUserModal({{$book['id']}})">Wypożycz użytkownikowi</a>
                                <a class="dropdown-item"
                                   href="{{route('admin-books-delete', ['bookId' => $book['id']])}}">Usuń</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination center pagination-sm flex-sm-wrap mt-2">
        {{$compact['books']->appends(request()->input())->links("pagination::bootstrap-4")}}
    </div>
</div>


