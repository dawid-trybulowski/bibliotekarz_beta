@include('top')
@if (Session::has('message'))
    <script>Materialize.toast('{{Session::get('message')}}', 4000)</script>
@endif
<div id="app">
    @if(Auth::check())
        <topmenulogged></topmenulogged>
    @else
        <topmenu></topmenu>
    @endif
</div>
        <div class="container">
            <div class="row">
                <div class="col s12 ">
                    <div class="col s12 card-panel teal cardLong ">
                        <h5>Wprowadź nowe dane logowania</h5>
                        <form class="col s12" method="POST" action="login-set">
                            {{ csrf_field() }}

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

                            <div class="form-group{{ $errors->has('email_confirmation') ? ' has-error' : '' }}">
                                <label for="email-confirm" class="col-md-4 control-label">Powtórz email *</label>
                                @if ($errors->has('email_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_confirmation') }}</strong>
                                    </span>
                                @endif
                                <div class="input-field col s12">
                                    <input id="email-confirm" type="email" class="validate"
                                           name="email_confirmation">
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
                                        <input name="login-edit" value="Zatwierdź" class="waves-button-input" type="submit">
                                    </i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @include('top-menu')
    @include('top-menu-logged')
    @include('footer')

