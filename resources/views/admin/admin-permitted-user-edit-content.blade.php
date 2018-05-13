<div class="container-fluid">
    <div class="row col-12">
        <form class="col-12 mt-4" method="POST" action="{{route('admin-permitted-user-edit')}}" enctype="multipart/form-data">
            <div class="form-row col-12">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$compact['user']['id']}}">
                <div class="form-group col-6 {{ $errors->has('login') ? ' has-error' : '' }}">
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
                <div class="form-group col-6 {{ $errors->has('email') ? ' has-error' : '' }}">
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
                <div class="form-group col-4 {{ $errors->has('firstName') ? ' has-error' : '' }}">
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
                <div class="form-group col-4 {{ $errors->has('secondName') ? ' has-error' : '' }}">
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
                <div class="form-group col-4 {{ $errors->has('surname') ? ' has-error' : '' }}">
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
                <div class="form-group col-6 {{ $errors->has('status') ? ' has-error' : '' }}">
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
                <div class="form-group col-6 {{ $errors->has('permissions') ? ' has-error' : '' }}">
                    <label class="col-12 control-label" for="permissions">Uprawnienia</label>
                    <div class="col-12">
                        <select id="permissions" name="permissions" class="form-control">
                            @foreach($compact['config']['users_permissions'] as $key => $value)
                                @if($key == $compact['user']['permissions'])
                                    <option value="{{$key}}" selected>{{$value['string']}}</option>
                                @else
                                    <option value="{{$key}}">{{$value['string']}}</option>
                                @endif
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