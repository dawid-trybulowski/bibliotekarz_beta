<div class="container-fluid">
    <div class="row col-12">
        <form class="col-12 mt-4" method="POST" action="{{route('general-settings-save')}}">
            <h4>Email rejestacyjny</h4>
            <div class="form-row col-12">
                {{ csrf_field() }}
                <div class="form-group col-12 {{ $errors->has('registrationonfirmationTheme') ? ' has-error' : '' }}">
                    <label class="col-12 control-label" for="registrationonfirmationTheme">Temat</label>
                    <div class="col-12">
                        <input id="registrationonfirmationTheme" name="registrationonfirmationTheme" type="text"
                               class="form-control input-md" required=""
                               value="{{ old('registrationonfirmationTheme') ? old('registrationonfirmationTheme') : $compact['config']['registration_email']['theme']}}">
                        @if ($errors->has('registrationonfirmationTheme'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('registrationonfirmationTheme') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-12 {{ $errors->has('registrationConfirmationContent') ? ' has-error' : '' }}">
                    <div class="col-12">
                        <label class="col-12 control-label" for="registrationConfirmationContent">Tekst</label>
                        <textarea id="registrationConfirmationContent input-md" class="form-control"
                                  name="registrationConfirmationContent">{{$compact['config']['registration_email']['content']}}</textarea>
                    </div>
                </div>
            </div>
            <h4>Email ponaglenia do zwrotu</h4>
            <div class="form-row col-12">
                {{ csrf_field() }}
                <div class="form-group col-12 {{ $errors->has('reminderTheme') ? ' has-error' : '' }}">
                    <label class="col-12 control-label" for="reminderTheme">Temat</label>
                    <div class="col-12">
                        <input id="reminderTheme" name="reminderTheme" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('reminderTheme') ? old('reminderTheme') : $compact['config']['reminder_email']['theme']}}">
                        @if ($errors->has('reminderTheme'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('reminderTheme') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-12 {{ $errors->has('reminderContent') ? ' has-error' : '' }}">
                    <div class="col-12">
                        <label class="col-12 control-label" for="registrationConfirmationContent">Tekst</label>
                        <textarea id="reminderContent" class="form-control input-md"
                                  name="reminderContent">{{$compact['config']['reminder_email']['content']}}</textarea>
                    </div>
                </div>
            </div>
            <h4>Email potwierdzenia wypożyczenia</h4>
            <div class="form-row col-12">
                {{ csrf_field() }}
                <div class="form-group col-12 {{ $errors->has('borrowConfirmationTheme') ? ' has-error' : '' }}">
                    <label class="col-12 control-label" for="borrowConfirmationTheme">Temat</label>
                    <div class="col-12">
                        <input id="borrowConfirmationTheme" name="borrowConfirmationTheme" type="text"
                               class="form-control input-md" required=""
                               value="{{ old('borrowConfirmationTheme') ? old('borrowConfirmationTheme') : $compact['config']['borrow_confirmation_email']['theme']}}">
                        @if ($errors->has('borrowConfirmationTheme'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('borrowConfirmationTheme') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-12 {{ $errors->has('borrowConfirmationContent') ? ' has-error' : '' }}">
                    <div class="col-12">
                        <label class="col-12 control-label" for="registrationConfirmationContent">Tekst</label>
                        <textarea id="borrowConfirmationTheme" class="form-control input-md"
                                  name="borrowConfirmationTheme">{{$compact['config']['borrow_confirmation_email']['content']}}</textarea>
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