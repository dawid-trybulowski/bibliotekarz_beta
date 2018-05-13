<!doctype html>
<html lang="pl">
@include('head')
@yield('head')
@include('top-menu')
@yield('top-menu')
<main class="container-fluid" role="main">
    <div class="row col-12">
        <div class="col-12" method="POST" action="{{ route('login') }}">
            <form class="col-12 mt-4" method="POST" action="{{ route('login') }}">
                <h2 class="mb-4">{{__('view.Logowanie')}}</h2>
                {{ csrf_field() }}
                <div class="form-row col-12">
                    <div class="form-group col-6{{ $errors->has('login') ? ' has-error' : '' }} width_customize">
                        <label class="col-12 control-label" for="login">{{__('view.Nazwa użytkownika') }}</label>
                        <div class="input-field col col-12">
                            <input id="login" type="login" class="form-control" name="login" value="{{ old('login') }}"
                                   required autofocus>
                            @if ($errors->has('login'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-6 {{ $errors->has('password') ? ' has-error' : '' }} width_customize">
                        <label class="col-12 control-label" for="password">{{__('view.Hasło')}}</label>

                        <div class="col-12 control-label">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-row col-12">
                    <div class="form-group text-center col-12">
                        <div class="col-12 control-label">
                            <input name="reservation" value="{{__('view.Zaloguj')}}"
                                   class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit">
                            <a class="btn btn-outline-success my-2 my-sm-0 mr-sm-2"
                               href="{{ route('password.request') }}">
                                {{__('view.Zapomniałeś hasła?')}}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@include('footer')
@yield('footer')
<script src={{url('/') .'/js/app.js'}}></script>
</html>
