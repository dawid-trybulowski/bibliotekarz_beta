@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 ">
                <div class="col s12 card-panel teal cardLong ">
                    <h5>Rejestracja</h5>
                    <form class="col s12" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            <label for="name">Imię *</label>

                            <div class="input-field col s12">
                                <input id="firstName" type="text" name="firstName" class="validate"
                                       value="{{ old('firstName') }}">

                                @if ($errors->has('firstName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('secondName') ? ' has-error' : '' }}">
                            <label for="name">Drugie imię</label>

                            <div class="input-field col s12">
                                <input id="secondName" type="text" name="secondName" class="validate"
                                       value="{{ old('secondName') }}">

                                @if ($errors->has('secondName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secondName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname">Nazwisko *</label>

                            <div class="input-field col s12">
                                <input id="surname" type="text" name="surname" class="validate"
                                       value="{{ old('surname') }}">

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cardId') ? ' has-error' : '' }}">
                            <label for="card_id">Numer karty bibliotecznej</label>

                            <div class="input-field col s12">
                                <input id="cardId" type="text" name="cardId" class="validate"
                                       value="{{ old('cardId') }}">

                                @if ($errors->has('cardId'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cardId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}">
                            <label for="birth_date">Data urodzenia *</label>

                            <div class="input-field col s12">
                                <input id="birth_date" type="text" name="birthDate" class="validate"
                                       value="{{ old('birthDate') }}">

                                @if ($errors->has('birthDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-mail *</label>

                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" class="validate" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city">Miejscowość *</label>

                            <div class="input-field col s12">
                                <input id="city" type="text" name="city" class="validate" value="{{ old('city') }}">

                                @if ($errors->has('city'))
                                    <span>
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                            <label for="street">Ulica</label>

                            <div class="input-field col s12">
                                <input id="street" type="text" name="street" class="validate"
                                       value="{{ old('street') }}">

                                @if ($errors->has('street'))
                                    <span>
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('houseNumber') ? ' has-error' : '' }}">
                            <label for="houseNumber">Numer domu *</label>

                            <div class="input-field col s12">
                                <input id="houseNumber" type="text" name="houseNumber" class="validate"
                                       value="{{ old('houseNumber') }}">

                                @if ($errors->has('houseNumber'))
                                    <span>
                                        <strong>{{ $errors->first('houseNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apartmentNumber') ? ' has-error' : '' }}">
                            <label for="apartmentNumber">Numer mieszkania</label>

                            <div class="input-field col s12">
                                <input id="apartmentNumber" type="text" name="apartmentNumber"
                                       class="validate" value="{{ old('apartmentNumber') }}">

                                @if ($errors->has('apartmentNumber'))
                                    <span>
                                        <strong>{{ $errors->first('apartmentNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postCode') ? ' has-error' : '' }}">
                            <label for="postCode">Kod pocztowy^</label>

                            <div class="input-field col s12">
                                <input id="postCode" type="text" name="postCode" class="validate"
                                       value="{{ old('postCode') }}">

                                @if ($errors->has('postCode'))
                                    <span>
                                        <strong>{{ $errors->first('postCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Hasło *</label>

                            <div class="input-field col s12">
                                <input id="password" type="password" class="form-control" class="validate"
                                       name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Powtórz hasło *</label>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="validate"
                                       name="password_confirmation">
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
        </div>
    </div>
@endsection
@include('top-menu')
@include('top-menu-logged')