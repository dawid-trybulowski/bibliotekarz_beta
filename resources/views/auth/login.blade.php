@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <div>
                <div class="col s12 card-panel teal cardLong">
                    <h5>Logowanie</h5>
                    <form class="col s12" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Adres e-mail</label>

                            <div class="input-field col s12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Hasło</label>

                            <div class="input-field col s12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group" style="text-align:center">
                            <div class="input-field col s12">
                                <i class="waves-effect waves-light btn biggerButton waves-input-wrapper" style="">
                                    <input name="reservation" value="Zaloguj" class="waves-button-input" type="submit">
                                </i>

                                <a class="waves-effect waves-light btn biggerButton waves-input-wrapper" href="{{ route('password.request') }}">
                                    Zapomniałeś hasła?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('top-menu')
@include('top-menu-logged')
