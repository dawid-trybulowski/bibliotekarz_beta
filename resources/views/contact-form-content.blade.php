<div class="container-fluid">
    <div class="row col-12">
        <form class="col-12 mt-4" method="POST" action="{{route('send-from-contact-form')}}" enctype="multipart/form-data">
            <div class="form-row col-12">
                {{csrf_field()}}
                <div class="form-group col-12 {{ $errors->has('subject') ? ' has-error' : '' }}">
                    <label class="col-12 control-label" for="subject">Temat</label>
                    <div class="col-12">
                        <input id="subject" name="subject" type="text" class="form-control input-md" required=""
                               value="{{ old('subject') ? old('subject') : ''}}">
                        @if ($errors->has('subject'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-12 control-label" for="email">Email</label>
                    <div class="col-12">
                        <input id="email" name="email" type="text" class="form-control input-md" required=""
                               value="{{ Auth::check() ? Auth::user()->email : ''}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-12 {{ $errors->has('main_text') ? ' has-error' : '' }}">
                    <label class="col-12 control-label" for="main_text">Opis</label>
                    <div class="col-12">
                        <textarea style="min-height: 150px;" id="main_text" class="form-control input-md"
                                  name="main_text">{{ old('main_text') ? old('main_text') : ''}}</textarea>
                        @if ($errors->has('main_text'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('main_text') }}</strong>
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