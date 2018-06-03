<!doctype html>
<html lang="pl">
@include('head')
@yield('head')
<body>
<header>
    <div id="menu">
        @include('top-menu')
        @yield('top-menu')
    </div>
</header>
<main>
    <div id="app">
        <div class="container-fluid">
            <div class="row col-12">
                <form class="col-12 mt-4" method="POST" action="{{ route('register') }}">
                    <h2 class="mb-4">Rejestracja</h2>
                    {{ csrf_field() }}
                    <div class="form-row col-12">
                        <div class="form-group col-6 {{ $errors->has('email') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 control-label" for="email">{{__('view.E-mail') . __('view.*')}}</label>
                            <div class="col-12">
                                <input id="email" name="email" type="text" class="form-control input-md" required=""
                                       value="{{ old('email')}}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-6 {{ $errors->has('login') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 control-label"
                                   for="login">{{__('view.Nazwa użytkownika') . __('view.*')}}</label>
                            <div class="col-12">
                                <input id="login" name="login" type="text" class="form-control input-md" required=""
                                       value="{{ old('login')}}">
                                @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row col-12">
                        <div class="form-group col-6 {{ $errors->has('password') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 control-label"
                                   for="password">{{__('view.Hasło') . __('view.*')}}</label>
                            <div class="col-12">
                                <input id="password" name="password" type="password" class="form-control input-md"
                                       required="" value="{{ old('password')}}">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 control-label"
                                   for="password_confirmation">{{__('view.Potwierdź hasło') . __('view.*')}}</label>
                            <div class="col-12">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                       class="form-control input-md" required=""
                                       value="{{ old('password_confirmation')}}">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row col-12">
                        <div class="form-group col-4 {{ $errors->has('firstName') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 control-label"
                                   for="firstName">{{__('view.Imię') . __('view.*')}}</label>
                            <div class="col-12">
                                <input id="firstName" name="firstName" type="text" class="form-control input-md"
                                       required=""
                                       value="{{ old('firstName')}}">
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
                                       value="{{ old('secondName')}}">
                                @if ($errors->has('secondName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secondName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-4 {{ $errors->has('surname') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 control-label"
                                   for="surname">{{__('view.Nazwisko') . __('view.*')}}</label>
                            <div class="col-12">
                                <input id="surname" name="surname" type="text" class="form-control input-md" required=""
                                       value="{{ old('surname')}}">
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
                            <label class="col-12 control-label"
                                   for="city">{{__('view.Miejscowość') . __('view.*')}}</label>
                            <div class="col-12">
                                <input id="city" name="city" type="text" class="form-control input-md" required=""
                                       value="{{ old('city')}}">
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-6 {{ $errors->has('street') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 control-label" for="street">{{__('view.Ulica')}}</label>
                            <div class="col-12">
                                <input id="street" name="street" type="text" class="form-control input-md"
                                       value="{{ old('street')}}">
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
                            <label class="col-12 control-label"
                                   for="houseNumber">{{__('view.Numer domu') . __('view.*')}}</label>
                            <div class="col-12">
                                <input id="firstName" name="houseNumber" type="text" class="form-control input-md"
                                       required="" value="{{ old('houseNumber')}}">
                                @if ($errors->has('houseNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('houseNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-4 {{ $errors->has('apartmentNumber') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 control-label"
                                   for="apartmentNumber">{{__('view.Numer mieszkania')}}</label>
                            <div class="col-12">
                                <input id="apartmentNumber" name="apartmentNumber" type="text"
                                       class="form-control input-md"
                                       value="{{ old('apartmentNumber')}}">
                                @if ($errors->has('apartmentNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apartmentNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-4 {{ $errors->has('postCode') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 control-label"
                                   for="postCode">{{__('view.Kod pocztowy') . __('view.*')}}</label>
                            <div class="col-12">
                                <input id="postCode" name="postCode" type="text" class="form-control input-md"
                                       required=""
                                       value="{{ old('postCode')}}">
                                @if ($errors->has('postCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row col-12">
                        <div class="form-group col-6 {{ $errors->has('birthDate') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 control-label"
                                   for="birthDate">{{__('view.Data urodzenia') . __('view.*') . ' (rrrr-mm-dd)'}}</label>
                            <div class="col-12">
                                <input id="birthDate" name="birthDate" type="text" class="form-control input-md"
                                       required=""
                                       value="{{ old('birthDate')}}">
                                @if ($errors->has('birthDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row col-12">
                        <div class="form-group col-12 {{ $errors->has('regulations') ? ' has-error' : '' }} width_customize">
                                <label class="col-12 checkbox-inline">Zapoznałem się i akceptuję <a href="{{route('regulations')}}" style="color:blue">regulamin biblioteki</a>{{__('view.*')}}
                                <input id="regulations" name="regulations" type="checkbox"
                                       class="ml-2" required="">
                                </label>
                                @if ($errors->has('regulations'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('regulations') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-row col-12">
                        <div class="form-group col-12 {{ $errors->has('privacyPolicy') ? ' has-error' : '' }} width_customize">
                            <label class="col-12 checkbox-inline">Zapoznałem się i akceptuję <a href="{{route('privacy-policy')}}" style="color:blue">politykę prywatności</a>{{__('view.*')}}
                                <input id="privacyPolicy" name="privacyPolicy" type="checkbox"
                                       class="ml-2" required="">
                            </label>
                            @if ($errors->has('privacyPolicy'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('privacyPolicy') }}</strong>
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
    </div>
</main>
@include('footer')
@yield('footer')
</body>
<script src={{url('/') .'/js/app.js'}}></script>
</html>
