@include('admin/top')
<div class="col s9" style="color:#fff">
    <h3>Edycja gatunku {{$data['genres']->id}}</h3>
</div>
</div>
</div>
<div id="app">

    <div class="row">
        <form class="col s12" method="POST" action="{{route('admin-genres-edit')}}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$data['genres']->id}}">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <div class="input-field col s4">
                    <input id="name" type="text" name="name" class="validate"
                           value="{{ old('name') ? old('name') : $data['genres']->name}}">
                    <label for="status">Nazwa gatunku *</label>
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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