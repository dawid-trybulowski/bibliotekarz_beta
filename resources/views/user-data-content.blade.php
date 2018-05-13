<div class="container-fluid mt-3">
    <h2>Dane konta {{Auth::User()->login}}</h2>
    <div class="row col-12 mt-3 text-center">
        <div class="form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.Nazwa użytkownika')}}
            </div>
            <div class="col-12 border">
                {{Auth::User()->login ?: '-'}}
            </div>
        </div>
        <div class="form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.E-mail')}}
            </div>
            <div class="col-12 border">
                {{Auth::User()->email ?: '-'}}
            </div>
        </div>
        <div class="form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.Imię')}}
            </div>
            <div class="col-12 border">
                {{Auth::User()->first_name ?: '-'}}
            </div>
        </div>
    </div>
    <div class="row col-12 mt-3 text-center">
        <div class="form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.Drugie imię')}}
            </div>
            <div class="col-12 border">
                {{Auth::User()->second_name ?: '-'}}
            </div>
        </div>
        <div class="form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.Nazwisko')}}
            </div>
            <div class="col-12 border">
                {{Auth::User()->surname ?: '-'}}
            </div>
        </div>
        <div class="form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.Miejscowość')}}
            </div>
            <div class="col-12 border width_customize">
                {{Auth::User()->city ?: '-'}}
            </div>
        </div>
    </div>
    <div class="row col-12 mt-3 text-center">
        <div class="form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.Ulica')}}
            </div>
            <div class="col-12 border">
                {{Auth::User()->street ?: '-'}}
            </div>
        </div>
        <div class="form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.Numer domu')}}
            </div>
            <div class="col-12 border">
                {{Auth::User()->house_number ?: '-'}}
            </div>
        </div>
        <div class="form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.Numer mieszkania')}}
            </div>
            <div class="col-12 border">
                {{Auth::User()->apartment_number ?: '-'}}
            </div>
        </div>
    </div>
    <div class="row col-12 mt-3 text-center">
        <div class=" form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.Kod pocztowy')}}
            </div>
            <div class="col-12 border">
                {{Auth::User()->post_code ?: '-'}}
            </div>
        </div>
        <div class=" form-group col-4 width_customize">
            <div class="col-12 bg-secondary text-white border">
                {{__('view.Data urodzenia') . ' (rrrr-mm-dd)'}}
            </div>
            <div class="col-12 border">
                {{Auth::User()->birth_date ?: '-'}}
            </div>
        </div>
    </div>
    <div class="row col-12 mt-3 text-center">
        <div class="form-group align-content-center col-12">
            <a href="{{route('user-data-personal-edit')}}">
                <button type="button"
                        class="btn btn-outline-success my-2 my-sm-0 mr-sm-2">{{__('view.Edytuj dane osobowe')}}</button>
            </a>
            <a href="{{route('user-data-login-edit')}}">
                <button type="button"
                        class="btn btn-outline-success my-2 my-sm-0 mr-sm-2">{{__('view.Edytuj dane logowania')}}</button>
            </a>
        </div>
    </div>
</div>