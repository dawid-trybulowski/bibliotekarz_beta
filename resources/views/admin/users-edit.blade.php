@include('admin/top')
<div class="col s9" style="color:#fff">
    <h3>Edycja użytkownika {{$data['users']->id}}</h3>
</div>
</div>
</div>
<div id="app">

    <div class="row">
        <form class="col s12" method="POST" action="{{route('admin-users-edit')}}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$data['users']->id}}">

            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">


                <div class="input-field col s6">
                    <input id="firstName" type="text" name="firstName" class="validate"
                           value="{{ old('firstName') ? old('firstName') : $data['users']->first_name}}">
                    <label for="name">Imię *</label>
                    @if ($errors->has('firstName'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                <div class="input-field col s6">
                    <input id="email" type="email" name="email" class="validate"
                           value="{{ old('email') ? old('email') : $data['users']->email}}">
                    <label for="name">Email *</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('secondName') ? ' has-error' : '' }}">
                <div class="input-field col s6">
                    <input id="secondName" type="text" name="secondName" class="validate"
                           value="{{ old('secondName') ? old('secondName') : $data['users']->second_name }}">
                    <label for="name">Drugie imię</label>
                    @if ($errors->has('secondName'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('secondName') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                <div class="input-field col s6">
                    <input id="surname" type="text" name="surname" class="validate"
                           value="{{ old('surname') ? old('surname') : $data['users']->surname}}">
                    <label for="surname">Nazwisko *</label>
                    @if ($errors->has('surname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('cardId') ? ' has-error' : '' }}">


                <div class="input-field col s6">
                    <input id="cardId" type="text" name="cardId" class="validate"
                           value="{{ old('cardId') ? old('cardId') : $data['users']->card_number}}">
                    <label for="card_id">Numer karty bibliotecznej</label>
                    @if ($errors->has('cardId'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('cardId') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}">

                <div class="input-field col s6">
                    <input id="birth_date" type="text" name="birthDate" class="validate"
                           value="{{ old('birthDate') ? old('birthDate') : $data['users']->birth_date }}">
                    <label for="birth_date">Data urodzenia *</label>
                    @if ($errors->has('birthDate'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <div class="input-field col s6">
                    <input id="city" type="text" name="city" class="validate" value="{{ old('city') ? old('city') : $data['users']->city}}">
                    <label for="city">Miejscowość *</label>
                    @if ($errors->has('city'))
                        <span>
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">


                <div class="input-field col s6">
                    <input id="street" type="text" name="street" class="validate"
                           value="{{ old('street') ? old('street') : $data['users']->street }}">
                    <label for="street">Ulica</label>
                    @if ($errors->has('street'))
                        <span>
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('houseNumber') ? ' has-error' : '' }}">


                <div class="input-field col s4">
                    <input id="houseNumber" type="text" name="houseNumber" class="validate"
                           value="{{ old('houseNumber') ? old('houseNumber') : $data['users']->house_number}}">
                    <label for="houseNumber">Numer domu *</label>
                    @if ($errors->has('houseNumber'))
                        <span>
                                        <strong>{{ $errors->first('houseNumber') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('apartmentNumber') ? ' has-error' : '' }}">

                <div class="input-field col s4">
                    <input id="apartmentNumber" type="text" name="apartmentNumber"
                           class="validate" value="{{ old('apartmentNumber') ? old('apartmentNumber') : $data['users']->apartment_number }}">
                    <label for="apartmentNumber">Numer mieszkania</label>
                    @if ($errors->has('apartmentNumber'))
                        <span>
                                        <strong>{{ $errors->first('apartmentNumber') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('postCode') ? ' has-error' : '' }}">


                <div class="input-field col s4">
                    <input id="postCode" type="text" name="postCode" class="validate"
                           value="{{ old('postCode') ? old('postCode') : $data['users']->post_code}}">
                    <label for="postCode">Kod pocztowy^</label>
                    @if ($errors->has('postCode'))
                        <span>
                                        <strong>{{ $errors->first('postCode') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <div class="input-field col s4">
                    <select name="status">
                        @foreach($data['statuses'] as $status => $value)
                            @if($status == $data['users']->verified)
                                <option value="{{$status}}"
                                        selected>{{$value}}</option>
                            @else
                                <option value="{{$status}}">{{$value}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>Status konta</label>
                    @if ($errors->has('status'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group" style="text-align:center">
                <div class="input-field col s12">
                    <i class="waves-effect waves-light btn biggerButton waves-input-wrapper" style="">
                        <input name="reservation" value="Zatwierdź" class="waves-button-input" type="submit">
                    </i>
                </div>
            </div>

        </form>
    </div>
</div>
<main>

@include('admin/footer')