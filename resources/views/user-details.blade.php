<template id="userdetails">
    <div style="display:inherit">
        <div class="row refactored-row">
            <div class="col s12">
                <div class="col s11 ">
                    <h5>Dane konta {{Auth::user()->email}}</h5>
                </div>
                <div class="col s1 centered" v-show="showDetailsProp['account_data']==false || showDetailsProp['account_data']==undefined">
                    <i class="fa fa-angle-double-down cursorPointer" aria-hidden="true" style="font-size: 300%"
                       @click="showDetailsFunction('account_data')"></i>
                </div>
                <div class="col s1 centered" v-show="showDetailsProp['account_data']==true">
                    <i class="fa fa-angle-double-up cursorPointer" aria-hidden="true" style="font-size: 300%"
                       @click="showDetailsFunction('account_data')" v-show="showDetailsProp['account_data']==true"></i>
                </div>
            </div>
        </div>
        <div class="row refactored-row details" style="display:flex; margin-bottom: 2px;" id="account_data"
             v-show="showDetailsProp['account_data']==true">
            <div class="col s12">
                <div class="col s6 card-panel teal cardLong centered labelCard">
                    Id
                </div>
                <div class="col s6 card-panel teal cardLong centered">
                    {{Auth::user()->id}}
                </div>
                <div class="col s6 card-panel teal cardLong centered labelCard">
                    Email
                </div>
                <div class="col s6 card-panel teal cardLong centered">
                    {{Auth::user()->email}}
                </div>
                <div class="form-group" style="text-align:center">
                    <div class="input-field col s12">
                        <div>
                            <a class="waves-effect waves-light btn biggerButton waves-input-wrapper" href="user/login-edit">
                                Zmien dane logowania
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row refactored-row">
            <div class="col s12">
                <div class="col s11">
                    <h5>Dane osobowe i adres</h5>
                </div>
                <div class="col s1 centered" v-show="showDetailsProp['personal_data']==false || showDetailsProp['personal_data']==undefined">
                    <i class="fa fa-angle-double-down cursorPointer" aria-hidden="true" style="font-size: 300%"
                       @click="showDetailsFunction('personal_data')"></i>
                </div>
                <div class="col s1 centered" v-show="showDetailsProp['personal_data']==true">
                    <i class="fa fa-angle-double-up cursorPointer" aria-hidden="true" style="font-size: 300%"
                       @click="showDetailsFunction('personal_data')" v-show="showDetailsProp['personal_data']==true"></i>
                </div>
            </div>
        </div>
        <div class="row refactored-row details" style="display:flex; margin-bottom: 2px;" id="personal_data"
             v-show="showDetailsProp['personal_data']==true">
            <div class="col s12">
                <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                    Imię
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                    {{Auth::user()->first_name}}
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                    Drugie imię
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                    {{Auth::user()->second_name}}
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                    Nazwisko
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                    {{Auth::user()->surname}}
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                    Miasto
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                    {{Auth::user()->city}}
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                    Ulica
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                    {{Auth::user()->street}}
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                    Numer domu
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                    {{Auth::user()->house_number}}
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                    Numer mieszkanie
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                    {{Auth::user()->apartment_number}}
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                    Kod pocztowy
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                    {{Auth::user()->post_code}}
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                    Data urodzenia
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                    {{Auth::user()->birth_date}}
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered labelCard">
                    Konto zweryfikowane?
                </div>
                <div class="col s6 card-panel teal userDashboardCard centered dataCard">
                    {{Auth::user()->verified ? 'tak' : 'nie'}}
                </div>
                <div class="form-group" style="text-align:center">
                    <div class="input-field col s12">
                        <div>
                            <a class="waves-effect waves-light btn biggerButton waves-input-wrapper"
                               href="{{ route('password.request') }}">
                                Edytuj dane osobowe
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row refactored-row">
            <div class="col s12">
                <div class="col s11">
                    <h5>Historia rezerwacji</h5>
                </div>
                <div class="col s1 centered" v-show="showDetailsProp['reservation_history']==false || showDetailsProp['reservation_history']==undefined">
                    <i class="fa fa-angle-double-down cursorPointer" aria-hidden="true" style="font-size: 300%"
                       @click="showDetailsFunction('reservation_history')"></i>
                </div>
                <div class="col s1 centered" v-show="showDetailsProp['reservation_history']==true">
                <i class="fa fa-angle-double-up cursorPointer" aria-hidden="true" style="font-size: 300%"
                   @click="showDetailsFunction('reservation_history')" v-show="showDetailsProp['reservation_history']==true"></i>
                </div>
            </div>
        </div>
        <div id="reservation_history" v-show="showDetailsProp['reservation_history']==true">
            <div class="row refactored_rows details centered" style="display:flex; margin-bottom: 2px;">
                <div class="col s12">
                    <div class="col s1 card-panel teal userDashboardCard centered labelCard">
                        ID
                    </div>
                    <div class="col s3 card-panel teal userDashboardCard centered labelCard">
                        Tytuł
                    </div>
                    <div class="col s2 card-panel teal userDashboardCard centered labelCard">
                        Autor
                    </div>
                    <div class="col s2 card-panel teal userDashboardCard centered labelCard">
                        Data rezerwacji
                    </div>
                    <div class="col s2 card-panel teal userDashboardCard centered labelCard">
                        Koniec rezerwacji
                    </div>
                    <div class="col s2 card-panel teal userDashboardCard centered labelCard">
                        Status
                    </div>
                </div>
            </div>
            @foreach($updatedReservations as $reservation)
                <div class="row centered" style="display:flex; margin-bottom: 2px;">
                    <div class="col s12" style="display:flex;">
                        <div class="col s1 card-panel teal userDashboardCard centered dataCard">
                            {{$reservation->getId()}}
                        </div>
                        <div class="col s3 card-panel teal userDashboardCard centered dataCard">
                            {{$reservation->getTitle()}}
                        </div>
                        <div class="col s2 card-panel teal userDashboardCard centered dataCard">
                            {{$reservation->getAuthor()}}
                        </div>
                        <div class="col s2 card-panel teal userDashboardCard centered dataCard">
                            {{$reservation->getReservationDateStart()}}
                        </div>
                        <div class="col s2 card-panel teal userDashboardCard centered dataCard">
                            {{$reservation->getReservationDateEnd()}}
                        </div>
                        <div class="col s2 card-panel teal userDashboardCard centered dataCard">
                            @if($reservation->getStatus())
                                Aktywna
                            @else
                                Zakonczona
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</template>