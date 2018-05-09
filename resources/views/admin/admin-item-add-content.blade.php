<div class="container-fluid">
    <div class="row">
        <form class="col-12 mt-4" method="POST" action="{{route('admin-item-add')}}" enctype="multipart/form-data">
            <div class="form-row">
                {{ csrf_field() }}
                <div class="form-group col-6 {{ $errors->has('bookId') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="bookId">Pozycja</label>
                    <div class="col-12">
                        <select id="bookId" name="bookId" class="form-control">
                            @foreach($compact['books'] as $book)
                                    <option value="{{$book['id']}}">{{$book['id'] . '. ' . $book['title'] . ' - ' . $book['author'] . ' - ' . $book['isbn']}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('bookId'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('bookId') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('locationCode') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="author">Kod lokalizacji</label>
                    <div class="col-12">
                        <input id="locationCode" name="locationCode" type="text" class="form-control input-md"
                               value="{{ old('locationCode') ? old('locationCode') : ''}}">
                        @if ($errors->has('locationCode'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('locationCode') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 {{ $errors->has('comment') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="comment">Komentarz do egzemplarza</label>
                    <div class="col-12">
                        <input id="comment" name="comment" type="text" class="form-control input-md"
                               value="{{ old('comment') ? old('comment') : ''}}">
                        @if ($errors->has('comment'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 {{ $errors->has('active') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="active">Dostępny do wypożyczenia</label>
                    <input id="active" name="active" type="checkbox" class="form-control form-check-input">
                    @if ($errors->has('active'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-12">
                    <input name="reservation" value="{{__('view.Zatwierdź')}}"
                           class="btn btn-outline-success my-2 my-sm-0 mr-sm-2"
                           type="submit">
                </div>
            </div>
        </form>
    </div>
</div>