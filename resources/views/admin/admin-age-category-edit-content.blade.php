<div class="container-fluid">
    <div class="row">
        <form class="col-12 mt-4" method="POST" action="{{route('admin-age-category-edit')}}" enctype="multipart/form-data">
            <div class="form-row">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$compact['ageCategory']['id']}}">
                <div class="form-group col-6 {{ $errors->has('name') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="name">Nazwa *</label>
                    <div class="col-12">
                        <input id="name" name="name" type="text" class="form-control input-md"
                               value="{{ old('name') ? old('name') : $compact['ageCategory']['name']}}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-3 {{ $errors->has('minAge') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="minAge">Minimalny wiek * (0 - brak limitu)</label>
                    <div class="col-12">
                        <input id="minAge" name="minAge" type="text" class="form-control input-md"
                               value="{{ old('minAge') ? old('minAge') : $compact['ageCategory']['min_age']}}">
                        @if ($errors->has('minAge'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('minAge') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-3 {{ $errors->has('maxAge') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="maxAge">MAksymalny wiek * (0 - brak limitu)</label>
                    <div class="col-12">
                        <input id="maxAge" name="maxAge" type="text" class="form-control input-md"
                               value="{{ old('maxAge') ? old('maxAge') : $compact['ageCategory']['max_age']}}">
                        @if ($errors->has('maxAge'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('maxAge') }}</strong>
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