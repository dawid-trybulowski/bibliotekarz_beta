<div class="container-fluid">
    <div class="row">
        <form class="mt-4 col-12" method="POST" action="{{route('admin-user-edit')}}" enctype="multipart/form-data">
            <div class="form-row col-12">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$compact['user']['id']}}">
                <div class="form-group col-6 {{ $errors->has('login') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="login">Login</label>
                    <div class="col-12">
                        <input id="login" name="login" type="text" class="form-control input-md" required=""
                               value="{{ old('login') ? old('login') : $compact['user']['login']}}">
                        @if ($errors->has('login'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('email') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="email">E-mail</label>
                    <div class="col-12">
                        <input id="email" name="email" type="email" class="form-control input-md"
                               value="{{ old('email') ? old('email') : $compact['user']['email']}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-4 {{ $errors->has('firstName') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="firstName">Pierwsze imię</label>
                    <div class="col-12">
                        <input id="firstName" name="firstName" type="text" class="form-control input-md" required=""
                               value="{{ old('firstName') ? old('firstName') : $compact['user']['first_name']}}">
                        @if ($errors->has('firstName'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('secondName') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="secondName">Drugie imię</label>
                    <div class="col-12">
                        <input id="secondName" name="secondName" type="text" class="form-control input-md"
                               value="{{ old('secondName') ? old('secondName') : $compact['user']['second_name']}}">
                        @if ($errors->has('secondName'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('secondName') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('surname') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="surname">Nazwisko</label>
                    <div class="col-12">
                        <input id="surname" name="surname" type="text" class="form-control input-md"
                               value="{{ old('surname') ? old('surname') : $compact['user']['surname']}}">
                        @if ($errors->has('surname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-6 {{ $errors->has('city') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="city">Miejscowość</label>
                    <div class="col-12">
                        <input id="city" name="city" type="text" class="form-control input-md" required=""
                               value="{{ old('city') ? old('city') : $compact['user']['city']}}">
                        @if ($errors->has('city'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('street') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="street">Ulica</label>
                    <div class="col-12">
                        <input id="street" name="street" type="text" class="form-control input-md"
                               value="{{ old('street') ? old('street') : $compact['user']['street']}}">
                        @if ($errors->has('street'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-4 {{ $errors->has('houseNumber') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="houseNumber">Numer domu</label>
                    <div class="col-12">
                        <input id="houseNumber" name="houseNumber" type="text" class="form-control input-md" required=""
                               value="{{ old('houseNumber') ? old('houseNumber') : $compact['user']['house_number']}}">
                        @if ($errors->has('houseNumber'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('houseNumber') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('apartmentNumber') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="apartmentNumber">Numer mieszkania</label>
                    <div class="col-12">
                        <input id="apartmentNumber" name="apartmentNumber" type="text" class="form-control input-md"
                               value="{{ old('apartmentNumber') ? old('apartmentNumber') : $compact['user']['apartment_number']}}">
                        @if ($errors->has('apartmentNumber'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('apartmentNumber') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('postCode') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="postCode">Kod pocztowy</label>
                    <div class="col-12">
                        <input id="postCode" name="postCode" type="text" class="form-control input-md"
                               value="{{ old('postCode') ? old('postCode') : $compact['user']['post_code']}}">
                        @if ($errors->has('postCode'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('postCode') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-4 {{ $errors->has('birthDate') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="birthDate">Data urodzenia (YYYY-MM-DD)</label>
                    <div class="col-12">
                        <input id="birthDate" name="birthDate" type="text" class="form-control input-md" required=""
                               value="{{ old('birthDate') ? old('birthDate') : $compact['user']['birth_date']}}">
                        @if ($errors->has('birthDate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('cardNumber') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="cardNumber">Numer karty bibliotecznej</label>
                    <div class="col-12">
                        <input id="cardNumber" name="cardNumber" type="text" class="form-control input-md"
                               value="{{ old('cardNumber') ? old('cardNumber') : $compact['user']['card_number']}}">
                        @if ($errors->has('cardNumber'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('cardNumber') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('debt') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="debt">Kwota zadłużenia</label>
                    <div class="col-12">
                        <input id="debt" name="debt" type="text" class="form-control input-md"
                               value="{{ old('debt') ? old('debt') : $compact['user']['debt']}}">
                        @if ($errors->has('debt'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('debt') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-6 {{ $errors->has('status') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="status">Status</label>
                    <div class="col-12">
                        <select id="status" name="status" class="form-control">
                            @foreach($compact['config']['users_statuses'] as $key => $value)
                                @if($key == $compact['user']['status'])
                                    <option value="{{$key}}" selected>{{$value['string']}}</option>
                                @else
                                    <option value="{{$key}}">{{$value['string']}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
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