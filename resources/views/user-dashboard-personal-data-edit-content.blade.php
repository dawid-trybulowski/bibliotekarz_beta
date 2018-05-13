<div class="container-fluid">
    <div class="row col-12">
        <form class="col-12 mt-4" method="POST" action="{{route('user-data-personal-edit-api')}}">
            <h2 class="mb-4">Edycja danych osobowych</h2>
            {{ csrf_field() }}
            <input id="userId" type="hidden" name="userId" value="{{Auth::User()->id}}">
            <div class="form-row col-12">
                <div class="form-group col-4 {{ $errors->has('email') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="email">{{__('view.E-mail') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="email" name="email" type="text" class="form-control input-md" required=""
                               value="{{ old('email') ? old('email') : Auth::User()->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('firstName') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="firstName">{{__('view.Imię') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="firstName" name="firstName" type="text" class="form-control input-md" required=""
                               value="{{ old('firstName') ? old('firstName') : Auth::User()->first_name}}">
                        @if ($errors->has('firstName'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('secondName') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="secondName">{{__('view.Drugie imię')}}</label>
                    <div class="col-12">
                        <input id="secondName" name="secondName" type="text" class="form-control input-md"
                               value="{{ old('secondName') ? old('secondName') : Auth::User()->second_name}}">
                        @if ($errors->has('secondName'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('secondName') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-4 {{ $errors->has('surname') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="surname">{{__('view.Nazwisko') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="surname" name="surname" type="surname" class="form-control input-md" required=""
                               value="{{ old('surname') ? old('surname') : Auth::User()->surname}}">
                        @if ($errors->has('surname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('city') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="city">{{__('view.Miejscowość') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="city" name="city" type="text" class="form-control input-md" required=""
                               value="{{ old('city') ? old('city') : Auth::User()->city}}">
                        @if ($errors->has('city'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('street') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="street">{{__('view.Ulica') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="street" name="street" type="text" class="form-control input-md"
                               value="{{ old('street') ? old('street') : Auth::User()->street}}">
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
                    <label class="col-12 control-label" for="houseNumber">{{__('view.Numer domu') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="houseNumber" name="houseNumber" type="houseNumber" class="form-control input-md" required=""
                               value="{{ old('houseNumber') ? old('houseNumber') : Auth::User()->house_number}}">
                        @if ($errors->has('houseNumber'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('houseNumber') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('apartmentNumber') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="apartmentNumber">{{__('view.Numer mieszkania')}}</label>
                    <div class="col-12">
                        <input id="apartmentNumber" name="apartmentNumber" type="text" class="form-control input-md"
                               value="{{ old('apartmentNumber') ? old('apartmentNumber') : Auth::User()->apartment_number}}">
                        @if ($errors->has('apartmentNumber'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('apartmentNumber') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('postCode') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="postCode">{{__('view.Kod pocztowy') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="postCode" name="postCode" type="text" class="form-control input-md" required=""
                               value="{{ old('postCode') ? old('postCode') : Auth::User()->post_code}}">
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
                    <label class="col-12 control-label" for="birthDate">{{__('view.Data urodzenia') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="birthDate" name="birthDate" type="birthDate" class="form-control input-md" required=""
                               value="{{ old('birthDate') ? old('birthDate') : Auth::User()->birth_date}}">
                        @if ($errors->has('birthDate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-12">
                    <input name="submit" value="{{__('view.Zatwierdź')}}" class="btn btn-outline-success my-2 my-sm-0 mr-sm-2"
                           type="submit">
                </div>
            </div>
        </form>
    </div>
</div>