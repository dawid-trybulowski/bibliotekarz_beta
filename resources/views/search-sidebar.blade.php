<div id="sidebar-wrapper">
    <div class="container-fluid pl-0 pr-0 text-light">
        <h2 class="ml-3 mt-2">Wyszukiwanie</h2>
        <form class="col-12 mt-4 pl-0 pr-0" action="{{route('index')}}">
            <input type="hidden" value="search" name="action">
            <div class="form-row col-12">
                <div class="form-group col-6">
                    <select class="form-control" id="sortSelect" name="search_1_searchBy">
                        @foreach($compact['searchMap'] as $key => $value)
                            @if(old('search_1_searchBy') == $key)
                                <option value="{{$key}}" selected>{{$value}}</option>
                            @else
                                <option value="{{$key}}">{{$value}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <input class="form-control input-md" aria-label="Search" id="search_1_text" name="search_1_text" value="{{old('search_1_text') ? old('search_1_text') : ''}}">
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-6">
                    <select class="form-control" id="sortSelect" name="search_2_searchBy">
                        @foreach($compact['searchMap'] as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <input class="form-control input-md" aria-label="Search" name="search_2_text" value="">
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-6">
                    <select class="form-control" id="sortSelect" name="search_3_searchBy">
                        @foreach($compact['searchMap'] as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <input class="form-control input-md" aria-label="Search" name="search_3_text">
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-12">
                    <select class="form-control mr-sm-1" id="caegorySelect" name="category">
                        <option value="" selected>Wszystkie kategorie</option>
                        @foreach($compact['categories'] as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-12">
                    <select class="form-control mr-sm-1" id="genresSelect" name="genre">
                        <option value="" selected>Wszystkie gatunki</option>
                        @foreach($compact['genres'] as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-12">
                    <select class="form-control mr-sm-1" id="sortSelect" name="orderBy">
                        @foreach($compact['orderByMap'] as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-7 text-center">
                    <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2 btn-block" type="submit">Szukaj</button>
                </div>
                <div class="form-group col-5 text-right">
                    <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="button" id="searchHide">Zwiń
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>