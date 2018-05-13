<div class="container-fluid">
    <div class="row col-12">
        <form class="col-12 mt-4" method="POST" action="{{route('user-data-login-edit-api')}}">
            <h2 class="mb-4">Edycja danych logowania</h2>
            {{ csrf_field() }}
            <input id="userId" type="hidden" name="userId" value="{{Auth::User()->id}}">
            <div class="form-row col-12">
                <div class="form-group col-6 {{ $errors->has('login') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="login">{{__('view.Nazwa użytkownika') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="login" name="login" type="text" class="form-control input-md" required=""
                               value="{{ old('login') ? old('login') : Auth::User()->login}}">
                        @if ($errors->has('login'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('login_confirmation') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="login_confirmation">{{__('view.Potwierdź nazwę użytkownika') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="login_confirmation" name="login_confirmation" type="text" class="form-control input-md" required=""
                               value="{{ old('login_confirmation') ? old('login_confirmation') : Auth::User()->login}}">
                        @if ($errors->has('login_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('login_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-6 {{ $errors->has('password') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="password">{{__('view.Hasło') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="password" name="password" type="password" class="form-control input-md" required=""
                               value="">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="password_confirmation">{{__('view.Potwierdź hasło') . __('view.*')}}</label>
                    <div class="col-12">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control input-md" required=""
                               value="{{ old('password_confirmation') ? old('password_confirmation') : ''}}">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
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