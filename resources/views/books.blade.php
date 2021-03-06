<main>
        <div class="mb-2">
            @foreach ($compact['books'] as $book)
                <div class="container-fluid p-0">
                    <div class="list-group-item" id="bookItem_{{$book->id}}">
                        <div class="row" id= {{'bookRow_' . $book->id}}>
                            <div class="col-4 centered-vertically width_customize add-margin-top">{{$book->title}}</div>
                            <div class="col-3 align-baseline centered-vertically width_customize add-margin-top"><a href="{{route('index', ['action' => 'search', 'search_1_searchBy' => 'author', 'search_1_text' => $book->author, 'search_2_searchBy' => 'author', 'search_2_text' => '', 'search_3_searchBy' => 'author', 'search_3_text' => '', 'category' => '', 'genre'=> '', 'orderBy' => 'DESC|created_at'])}}">{{$book->author}}</a></div>
                            <div class="col-2 text-center centered_new width_customize add-margin-top" style="color:{{$compact['config']['books_statuses'][$book->status]['color']}}"><h5>{{$compact['config']['books_statuses'][$book->status]['string']}}</h5></div>
                            <div class="dropdown col-2 text-center width_customize add-margin-top">
                                @if($book->status)
                                <a href="{{route('reserve', ['bookId' => $book->id])}}"><button class="btn btn-success btn-lg btn-block add-margin-top small-font" type="button" >
                                    Zarezerwuj
                                </button></a>
                                @else
                                    <a href="{{route('addToWaitingList', ['bookId' => $book->id])}}"><button class="btn btn-warning btn-lg btn-block add-margin-top small-font" type="button" >
                                        Zamów
                                    </button></a>
                                    @endif
                            </div>
                            <div class="col-1 text-center centered_new width_customize add-margin-top" style="font-size: 150%"
                                 @click="showDetailsFunction({{$book->id}})"><i id="arrow_{{$book->id}}" class="fa fa-angle-double-down cursorPointer add-margin-top"></i></div>
                        </div>
                    </div>
                    @include('book-details')
                    @yield('book-details')
                </div>
            @endforeach
        </div>
        <div class="pagination center pagination-sm flex-sm-wrap">
            {{$compact['books']->appends(request()->input())->links("pagination::bootstrap-4")}}
        </div>
</main>
