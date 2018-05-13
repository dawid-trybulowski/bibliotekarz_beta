<div class="container-fluid center-on-customize">
    <div class="row col-12 align-center internal-div">
        <div class="col-8 width_customize internal-div">
            <h3 class="mt-3 mb-3">Komunikaty</h3>
        </div>
        <div class="col-4 width_customize internal-div">
            <div class="text-center mt-3 mb-3" style="font-size: 150%">
                <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="button"
                        name="submit" value="search" @click="showAddCommuniqueModal()">
                    Dodaj komunikat <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </div>
        @if(count($compact['communiques']))
            @for ($i = 0; $i < 3; $i++)
                @if(isset($compact['communiques'][$i]))
                    <div class="col-12 border border-dark mt-2 mb-2 internal-div">
                        <h6 class="font-weight-bold">{{$compact['communiques'][$i]['updated_at']}}</h6>
                        <div class="centered_new"><h6>{{$compact['communiques'][$i]['text']}}</h6></div>
                        <div class="text-right pr-5"><h6>{{$compact['communiques'][$i]['user_name']}}</h6></div>
                    </div>
                @endif
            @endfor
            <div class="col-12 centered_new internal-div">
                <button class="btn btn-outline-dark mt-3"
                        name="moreCommunicates" @click="showCommuniquesModal()">
                    Pokaż starsze komunikaty
                </button>
            </div>
        @else
            <div class="col-12 centered_new internal-div">
                Brak komunikatów
            </div>
        @endif
    </div>
</div>
<div class="container-fluid center-on-customize">

    <h3 class="mt-3 mb-3">Statystyki</h3>
    <div class="row col-12 text-center internal-div">
        <div class="col-4 border border-dark form-group width_customize">
            <h5 class="mt-4 mb-3">Użytkownicy</h5>
            <div class="row col-12 center-align mb-2 internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Zarejestrowanych ogółem
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['users']['all']}}
                </div>
            </div>
            <div class="row col-12 center-align internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Zarejestrowanych dzisiaj
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['users']['all']}}
                </div>
            </div>
            <div class="row col-12 center-align internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Zarejestrowanych w tym tygodniu
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['users']['week']}}
                </div>
            </div>
            <div class="row col-12 center-align mb-3 internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Zarejestrowanych w tym miesiącu
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['users']['month']}}
                </div>
            </div>
        </div>
        <div class="col-4 border border-dark align-content-center form-group width_customize">
            <h5 class="mt-4 mb-3">Rezerwacje</h5>
            <div class="row col-12 center-align mb-2 internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Zarezerwowanych ogółem
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['reservations']['all']}}
                </div>
            </div>
            <div class="row col-12 center-align internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Zarezerwowanych dzisiaj
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['reservations']['today']}}
                </div>
            </div>
            <div class="row col-12 center-align internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Zarezerwowanych w tym tygodniu
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['reservations']['week']}}
                </div>
            </div>
            <div class="row col-12 center-align mb-3 internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Zarezerwowanych w tym miesiącu
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['reservations']['month']}}
                </div>
            </div>
        </div>
        <div class="col-4 border border-dark align-content-center form-group width_customize">
            <h5 class="mt-4 mb-3">Wypożyczenia</h5>
            <div class="row col-12 center-align mb-2 internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Wypożyczonych ogółem
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['borrows']['all']}}
                </div>
            </div>
            <div class="row col-12 center-align internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Wypożyczonych dzisiaj
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['borrows']['today']}}
                </div>
            </div>
            <div class="row col-12 center-align internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Wypożyczonych w tym tygodniu
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['borrows']['week']}}
                </div>
            </div>
            <div class="row col-12 center-align mb-3 internal-div">
                <div class="col-12 bg-secondary text-white border centered_new">
                    Wypożyczonych w tym miesiącu
                </div>
                <div class="col-12 centered_new border">
                    {{$compact['statistics']['borrows']['month']}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>