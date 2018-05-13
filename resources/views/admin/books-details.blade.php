@include('admin/top')
<div class="col s9" style="color:#fff">
    <h3>Pozycje</h3>
</div>
</div>
</div>
<div class="row" style="margin:0">
    <form action="{{route('search')}}" method="post">

        <div class="col s6">
            {{ csrf_field() }}
            <div class="input-field col s12">
                <input id="search" type="search" name="search"
                       style="margin: -1px; line-height: normal !important; height: 60px !important; display:inline !important;">
                <label style="margin-top: -10px !important;" class="label-icon" for="search"><i
                            class="material-icons">search</i></label>
            </div>
        </div>
        <div class="input-field col s3"
             style="margin-top: 29px; line-height: normal !important; height: 60px !important;">
            <select name="sort">
                <option value="" selected>Wyszukaj według...</option>
                <option value="id">ID</option>
                <option value="title">Tytuł</option>
                <option value="author">Autor</option>
            </select>
        </div>
        <div class="input-field col s2 centered_new" style="margin: 1%; line-height: normal !important; height: 60px !important;">
            <button class="waves-effect waves-light btn biggerButton waves-input-wrapper" type="submit" name="submit">Wyszukaj</button>
        </div>
    </form>
</div>
</div>
<div style="text-align:right">
    <a class="btn-floating btn-large waves-effect waves-light red" style="margin-right:15px"><i class="material-icons">add</i></a>
</div>
<div id="app">

    <table class="bordered striped responsive-table centered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tytuł</th>
            <th>Autor</th>
            <th>Kategoria</th>
            <th>Gatunek</th>
            <th>Data dodania</th>
            <th>Data modyfikacji</th>
            <th>Data modyfikacji</th>
        </tr>
        </thead>
        <tbody>
        @foreach($refactoredBooks as $book)
            <tr>
                <td>{{$book->getId()}}</td>
                <td>{{$book->getTitle()}}</td>
                <td>{{$book->getAuthor()}}</td>
                <td>{{$book->getCategoryName()}}</td>
                <td>@foreach($book->getGenres() as $genre)
                        {{$genre['genreName'][0] . ' '}}
                    @endforeach
                </td>
                <td>{{$book->getCreatedAt()}}</td>
                <td>{{$book->getUpdatedAt()}}</td>
                <td>{{$book->getstatus()}}</td>
                <td class="centered_new">
                    <a class='dropdown-button' href='' data-activates='dropdown_book_{{$book->getId()}}'><i
                                class="material-icons">menu</i></a>
                    <ul id='dropdown_book_{{$book->getId()}}' class='dropdown-content'>
                        <li><a href="">Edytuj</a></li>
                        <li><a href="{{route('admin-books-delete', ['bookId' => $book->getId()])}}">Usuń</a></li>
                    </ul>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="centered_new">{{$refactoredBooks->render()}}</div>
</div>
<main>

@include('admin/footer')