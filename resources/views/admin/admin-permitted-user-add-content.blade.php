<div class="container-fluid">
    <div class="row">
        <form class="col-12 mt-4" method="POST" action="{{route('admin-permitted-user-add')}}"
              enctype="multipart/form-data">
            <div class="form-row">
                {{ csrf_field() }}
                <div class="form-group col-6 {{ $errors->has('login') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="login">Login</label>
                    <div class="col-12">
                        <input id="login" name="login" type="text" class="form-control input-md" required=""
                               value="{{ old('login') ? old('login') : ''}}">
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
                               value="{{ old('email') ? old('email') : ''}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 {{ $errors->has('password') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="password">Hasło</label>
                    <div class="col-12">
                        <input id="password" name="password" type="password" class="form-control input-md" required=""
                               value="{{ old('password') ? old('password') : ''}}">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="password_confirmation">Potwierdź hasło</label>
                    <div class="col-12">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control input-md"
                               value="{{ old('password_confirmation') ? old('password_confirmation') : ''}}">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4 {{ $errors->has('firstName') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="firstName">Pierwsze imię</label>
                    <div class="col-12">
                        <input id="firstName" name="firstName" type="text" class="form-control input-md" required=""
                               value="{{ old('firstName') ? old('firstName') : ''}}">
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
                               value="{{ old('secondName') ? old('secondName') : ''}}">
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
                               value="{{ old('surname') ? old('surname') : ''}}">
                        @if ($errors->has('surname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 {{ $errors->has('status') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="status">Status</label>
                    <div class="col-12">
                        <select id="status" name="status" class="form-control">
                            @foreach($compact['config']['users_statuses'] as $key => $value)
                                <option value="{{$key}}">{{$value['string']}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('permissions') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="permissions">Uprawnienia</label>
                    <div class="col-12">
                        <select id="permissions" name="permissions" class="form-control">
                            @foreach($compact['config']['users_permissions'] as $key => $value)
                                <option value="{{$key}}">{{$value['string']}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('permissions'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('permissions') }}</strong>
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