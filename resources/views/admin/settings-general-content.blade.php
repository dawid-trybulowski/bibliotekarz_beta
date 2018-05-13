<div class="container-fluid">
    <div class="row">
        <form class="col-12 mt-4" method="POST" action="{{route('admin-config-update')}}">
            <h4>Dane adresowe</h4>
            <div class="form-row">
                {{ csrf_field() }}
                <div class="form-group col-6 {{ $errors->has('libraryName') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="libraryName">Nazwa biblioteki</label>
                    <div class="col-12">
                        <input id="libraryName" name="libraryName" type="text" class="form-control input-md" required=""
                               value="{{ old('libraryName') ? old('libraryName') : $compact['config']['library_name']}}">
                        @if ($errors->has('libraryName'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('libraryName') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('libraryAddress') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="libraryAddress">Adres biblioteki</label>
                    <div class="col-12">
                        <input id="libraryAddress" name="libraryAddress" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('libraryAddress') ? old('libraryAddress') : $compact['config']['library_name']}}">
                        @if ($errors->has('libraryAddress'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('libraryAddress') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('libraryPhone') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="libraryPhone">Telefon</label>
                    <div class="col-12">
                        <input id="libraryPhone" name="libraryPhone" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('libraryPhone') ? old('libraryPhone') : $compact['config']['library_phone']}}">
                        @if ($errors->has('libraryPhone'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('libraryPhone') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('libraryEmail') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="libraryEmail">E-mail</label>
                    <div class="col-12">
                        <input id="libraryEmail" name="libraryEmail" type="email" class="form-control input-md"
                               required=""
                               value="{{ old('libraryEmail') ? old('libraryEmail') : $compact['config']['library_email']}}">
                        @if ($errors->has('libraryEmail'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('libraryEmail') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <h4>Zasady biblioteki</h4>
            <div class="form-row">
                {{ csrf_field() }}
                <div class="form-group col-6 {{ $errors->has('reservationTime') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="reservationTime">Czas obowiązywania rezerwacji (dni)</label>
                    <div class="col-12">
                        <input id="reservationTime" name="reservationTime" type="text" class="form-control input-md" required=""
                               value="{{ old('reservationTime') ? old('reservationTime') : $compact['config']['reservation_time']}}">
                        @if ($errors->has('reservationTime'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('reservationTime') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('maxReservationCount') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="maxReservationCount">Ilość jednorazowych rezerwacji</label>
                    <div class="col-12">
                        <input id="maxReservationCount" name="maxReservationCount" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('maxReservationCount') ? old('maxReservationCount') : $compact['config']['max_reservation_count']}}">
                        @if ($errors->has('maxReservationCount'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('maxReservationCount') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('borrowTime') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="borrowTime">Czas obowiązywania wypożyczenia (dni)</label>
                    <div class="col-12">
                        <input id="borrowTime" name="borrowTime" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('borrowTime') ? old('borrowTime') : $compact['config']['borrow_time']}}">
                        @if ($errors->has('borrowTime'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('borrowTime') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('reservationWithoutVerification') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="reservationWithoutVerification">Rezerwacja bez weryfikacji konta</label>
                    <div class="col-12">
                        <input id="reservationWithoutVerification" name="reservationWithoutVerification" type="checkbox" class="form-control input-md"
                               {{$compact['config']['reservation_without_verification'] ? 'checked' : ''}}
                               value="{{ old('reservationWithoutVerification') ? old('reservationWithoutVerification') : $compact['config']['reservation_without_verification']}}">
                        @if ($errors->has('reservationWithoutVerification'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('reservationWithoutVerification') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-12">
                    <input name="reservation" value="{{__('view.Zatwierdź')}}" class="btn btn-outline-success my-2 my-sm-0 mr-sm-2"
                           type="submit">
                </div>
            </div>
        </form>
    </div>
</div>