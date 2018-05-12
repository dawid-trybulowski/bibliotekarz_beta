<div class="container-fluid">
    <div class="row col-center">
        <form class="mt-4 col-12" method="POST" action="{{route('admin-view-config-update')}}">
            <h4>Widok</h4>
            <div class="form-row col-center">
                {{ csrf_field() }}
                <div class="form-group col-4 {{ $errors->has('booksPerPage') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="booksPerPage">Ilość pozycji na stronę</label>
                    <div class="col-12">
                        <input id="booksPerPage" name="booksPerPage" type="text" class="form-control input-md" required=""
                               value="{{ old('booksPerPage') ? old('booksPerPage') : $compact['config']['books_per_page']}}">
                        @if ($errors->has('booksPerPage'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('booksPerPage') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('ageLimit') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="ageLimit">Wyświetlaj pozycje odpowiednie do wieku</label>
                    <div class="col-12">
                        <input id="ageLimit" name="ageLimit" type="checkbox" class="form-control input-md"
                               {{$compact['config']['age_limit'] ? 'checked' : ''}}>
                        @if ($errors->has('ageLimit'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('ageLimit') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-12">
                    <input name="reservation" value="{{__('view.Zatwierdź')}}" class="btn btn-outline-success my-2 my-sm-0 mr-sm-2"
                           type="submit">
                </div>
            </div>
        </form>
    </div>
</div>