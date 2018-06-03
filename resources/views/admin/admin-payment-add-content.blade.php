<div class="container-fluid">
    <div class="row">
        <form class="col-12 mt-4" method="POST" action="{{route('admin-payment-add')}}" enctype="multipart/form-data">
            <div class="form-row">
                {{ csrf_field() }}
                <input type="hidden" name="userId" value="">
                <div class="form-group col-4 {{ $errors->has('name') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="userId">ID użytkownika *</label>
                    <div class="col-12">
                        <input id="userId" name="userId" type="text" class="form-control input-md"
                               value="{{ old('userId') ? old('userId') : ''}}">
                        @if ($errors->has('userId'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('userId') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('amount') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="amount">Kwota (w groszach)*</label>
                    <div class="col-12">
                        <input id="amount" name="amount" type="text" class="form-control input-md"
                               value="{{ old('amount') ? old('amount') : ''}}">
                        @if ($errors->has('amount'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('method') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="method">Metoda  *</label>
                    <div class="col-12">
                        <input id="method" name="method" type="text" class="form-control input-md"
                               value="{{ old('method') ? old('method') : 'Przelew tradycyjny'}}">
                        @if ($errors->has('method'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('method') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-4 {{ $errors->has('status') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="status">Status</label>
                    <div class="col-12">
                        <select id="status" name="status" class="form-control">
                            @foreach($compact['config']['payments_statuses'] as $key => $value)
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