<div class="row m-0 p-0" id="{{'bookDetailsRow_' . $book['id']}}" style="display:none">
    <div class="col-3 center-align centered_new width_customize"><span class="align-middle"><img
                    class="img-fluid align-middle"
                    src="{{asset('img/'.$book->image_url)}}"></span>
    </div>
    <div class="col-5 text-justify width_customize">
        <div class="card mt-2">
            <div class="card-block">
                <p class="card-text p-2">{{$book->description}}</p>
            </div>
        </div>
        <div class="card mt-2 mb-2">
            <div class="card-block p-2">
                <div class="form-group">
                    <form method="POST" action="{{route('addCommentAndRate')}}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$book->id}}" name="bookId">
                        <div class="text-center">
                            <select class="form-control" name="rate">
                                <option value="" disabled selected>{{__('view.Oceń książkę')}}</option>
                                <option value="1">1 - Okropna</option>
                                <option value="2">2 - Słaba</option>
                                <option value="3">3 - Średnia</option>
                                <option value="4">4 - Dobra</option>
                                <option value="5">5 - Wspaniała</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <label for="commentsTextArea_{{$book->id}}">{{__('view.Komentarz')}}</label>
                            <textarea class="form-control" id="commentsTextArea_{{$book->id}}" rows="3"
                                      name="comment"></textarea>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-dark">{{__('view.Wyślij opinię')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4 width_customize">
        <div class="card mt-2">
            <div class="card-block p-2">
                <p><i class="font-weight-bold">{{ __('view.Kategoria') . __('view.:') . ' '}}</i>
                    {{$book->categories_name}}
                </p>
                <p><i class="font-weight-bold">{{ __('view.Gatunki') . __('view.:')}}</i>
                    @foreach($book->genres as $genre)
                        {{$genre['string'] . ', '}}
                    @endforeach
                </p>
                <p><i class="font-weight-bold">{{ __('view.Kategoria wiekowa') . __('view.:') . ' '}}</i>
                    {{$book->age_categories_name}}
                </p>
                <p><i class="font-weight-bold">{{ __('view.Dostępne egzemplarze') . __('view.:')}}</i>
                    {{$book->items}}</p>
                <p><i class="font-weight-bold">{{ __('view.Lokalizacja') . __('view.:')}}</i>
                    {{$book->locations_name . ' ' . $book->locations_address}}</p>
                <p><i class="font-weight-bold">{{ __('view.Słowa kluczowe') . __('view.:')}}</i>
                    @foreach(explode(',', $book->keys) as $key)
                        {{$key . ' '}}
                    @endforeach
                </p>
                <p><i class="font-weight-bold">{{ __('view.Średnia ocena') . __('view.:')}}</i>
                    {!!(float)$book['rate'] > 0 ? $book->rate . ' ' . ' <span style="color:'.$compact['config']['books_rates'][round($book['rate'])]['color'] . '">' . $compact['config']['books_rates'][round($book['rate'])]['string'] . '</span>'  : __('view.Brak ocen')!!}
                </p>
                <div class="text-center">
                    <a href="{{route('show-book-page', ['bookId' => $book['id']])}}"><button type="submit" class="btn btn-outline-dark">Pokaż
                        szczegóły</button></a>
                </div>
            </div>
        </div>
        <div class="card mt-2 mb-2">
            <div class="card-block p-2">
                @if(isset($compact['comments'][$book->id]) && count($compact['comments'][$book->id]) > 0)
                    @foreach($compact['comments'][$book->id] as $comment)
                        <h5 class="card-title">{{$comment->user->login}}</h5>
                        <h6 class="card-subtitle text-muted">{{$comment->created_at}}</h6>
                        <h6 class="card-subtitle text-muted">
                            Ocena: {!! '<span style="color:'.$compact['config']['books_rates'][round($comment['rate'])]['color'] . '">' . $comment->rate . '</span>' !!}</h6>
                        <p class="card-text">{{$comment->comment}}</p>
                    @endforeach
                @else
                    <h5 class="card-title text-center">{{ __('view.Ta pozycja nie została jeszcze skomentowana')}}</h5>
                @endif
            </div>
        </div>
    </div>
</div>