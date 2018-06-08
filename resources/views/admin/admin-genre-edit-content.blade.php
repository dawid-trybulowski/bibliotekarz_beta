<div class="container-fluid">
    <div class="row">
        <form class="col-12 mt-4" method="POST" action="{{route('admin-genre-edit')}}" enctype="multipart/form-data">
            <div class="form-row">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$compact['genre']['id']}}">
                <div class="form-group col-6 {{ $errors->has('genre') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="name">Nazwa *</label>
                    <div class="col-12">
                        <input id="name" name="name" type="text" class="form-control input-md"
                               value="{{ old('name') ? old('name') : $compact['genre']['name']}}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
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