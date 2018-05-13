@include('admin/top')
<div class="col s9" style="color:#fff">
    <h3>Dodaj kategorię wiekową {{$data['ageCategories']->age_cat_id}}</h3>
</div>
</div>
</div>
<div id="app">

    <div class="row">
        <form class="col s12" method="POST" action="{{route('admin-age-categories-edit')}}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$data['ageCategories']->age_cat_id}}">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="input-field col s6">
                    <input id="name" type="text" name="name" class="validate"
                           value="{{ old('name') ? old('name') : $data['ageCategories']->age_cat_name}}">
                    <label for="status">Nazwa kategorii *</label>
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('min') ? ' has-error' : '' }}">

                <div class="input-field col s6">
                    <input placeholder = "Bez limitu - pozostaw puste" id="min" type="text" name="min" class="validate"
                           value="{{ old('min') ? old('min') : $data['ageCategories']->age_cat_min_age}}">
                    <label for="status">Minimalny wiek *</label>
                    @if ($errors->has('min'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('min') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('max') ? ' has-error' : '' }}">

                <div class="input-field col s6">
                    <input placeholder = "Bez limitu - pozostaw puste" id="max" type="text" name="max" class="validate"
                           value="{{ old('max') ? old('max') : $data['ageCategories']->age_cat_max_age}}">
                    <label for="status">Minimalny wiek *</label>
                    @if ($errors->has('max'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('max') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group" style="text-align:center">
                <div class="input-field col s12">
                    <i class="waves-effect waves-light btn biggerButton waves-input-wrapper" style="">
                        <input name="submit" value="Zatwierdź" class="waves-button-input" type="submit">
                    </i>
                </div>
            </div>
        </form>
    </div>
</div>
<main>

@include('admin/footer')