<div class="container-fluid">
    <div class="row">
        <form class="mt-4 col-12" method="POST" action="{{route('admin-payments-config-update')}}">
            <h4>Dane do przelewu tradycyjnego</h4>
            <div class="form-row col-12 col-center">
                {{ csrf_field() }}
                <div class="form-group col-6 {{ $errors->has('accountNumber') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="accountNumber">Numer konta</label>
                    <div class="col-12">
                        <input id="accountNumber" name="accountNumber" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('accountNumber') ? old('accountNumber') : $compact['config']['payments_data']['account_number']}}">
                        @if ($errors->has('accountNumber'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('accountNumber') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('paymentTitle') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="paymentTitle">Tytuł płatności</label>
                    <div class="col-12">
                        <input id="paymentTitle" name="paymentTitle" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('paymentTitle') ? old('paymentTitle'): $compact['config']['payments_data']['payment_title']}}">
                        @if ($errors->has('paymentTitle'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('paymentTitle') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('receiver') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="receiver">Odbiorca płątności</label>
                    <div class="col-12">
                        <input id="receiver" name="receiver" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('receiver') ? old('receiver') : $compact['config']['payments_data']['receiver']}}">
                        @if ($errors->has('receiver'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('receiver') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('address') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="address">Adres</label>
                    <div class="col-12">
                        <input id="address" name="address" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('address') ? old('address') : $compact['config']['payments_data']['address']}}">
                        @if ($errors->has('address'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <h4>Płatność przez Przelewy24</h4>
            <div class="form-row col-12 col-center">
                <div class="form-group col-12 {{ $errors->has('przelewy24Status') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label text-center" for="przelewy24Status">Aktywuj płatność przez Przelewy24
                        konta</label>
                    <div class="col-12">
                        <input id="przelewy24Status" name="przelewy24Status" type="checkbox"
                               class="form-control input-md"
                               {{$compact['config']['przelewy24_status'] ? 'checked' : ''}}>
                        @if ($errors->has('przelewy24Status'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('przelewy24Status') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12 col-center">
                <div class="form-group col-6 {{ $errors->has('p24MerchantId') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="p24MerchantId">p24_merchant_id</label>
                    <div class="col-12">
                        <input id="p24MerchantId" name="p24MerchantId" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('p24MerchantId') ? old('p24MerchantId') : $compact['config']['przelewy24_config']['p24_merchant_id']}}">
                        @if ($errors->has('p24MerchantId'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('p24MerchantId') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('p24PosId') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="p24PosId">p24_pos_id</label>
                    <div class="col-12">
                        <input id="p24PosId" name="p24PosId" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('p24PosId') ? old('p24PosId') : $compact['config']['przelewy24_config']['p24_pos_id']}}">
                        @if ($errors->has('p24PosId'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('p24PosId') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('crc') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="borrowTime">crc</label>
                    <div class="col-12">
                        <input id="crc" name="crc" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('crc') ? old('crc') : $compact['config']['przelewy24_config']['crc']}}">
                        @if ($errors->has('crc'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('crc') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('testMode') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label text-center" for="chargeFee">Tryb testowy</label>
                    <div class="col-12">
                        <input id="testMode" name="testMode" type="checkbox"
                               class="form-control input-md"
                                {{$compact['config']['przelewy24_config']['test_mode'] ? 'checked' : ''}}>
                        @if ($errors->has('testMode'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('testMode') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <h4>Opóźnienie</h4>
            <div class="form-row col-12 col-center">
                <div class="form-group col-6 {{ $errors->has('chargeFee') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label text-center" for="chargeFee">Naliczaj opłatę po przekroczeniu terminu wypożyczenia</label>
                    <div class="col-12">
                        <input id="chargeFee" name="chargeFee" type="checkbox"
                               class="form-control input-md"
                                {{$compact['config']['charge_fee'] ? 'checked' : ''}}>
                        @if ($errors->has('chargeFee'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('chargeFee') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('delayCost') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="p24PosId">Opłata za dobę opóźnienia (w groszach)</label>
                    <div class="col-12">
                        <input id="delayCost" name="delayCost" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('delayCost') ? old('delayCost') : $compact['config']['delay_cost']}}">
                        @if ($errors->has('delayCost'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('delayCost') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group text-center col-center">
                <div class="col-12">
                    <input name="reservation" value="{{__('view.Zatwierdź')}}"
                           class="btn btn-outline-success my-2 my-sm-0 mr-sm-2"
                           type="submit">
                </div>
            </div>
        </form>
    </div>
</div>