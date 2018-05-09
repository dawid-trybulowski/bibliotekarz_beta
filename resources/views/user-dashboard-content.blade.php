<div class="container-fluid">
    <div class="col-12 mt-3" id="user_{{Auth::User()->id}}">
        <div class="row col-12 center-align mt-4">
            <div class="col-6 width_customize center-on-customize">
                <h2>{{__('view.Panel konta') . ' ' . Auth::User()->login}}</h2>
            </div>
            <div class="col-6 text-right width_customize center-on-customize">
                <h2>{{__('view.' . $compact['config']['users_statuses'][Auth::User()->status]['string']) . ' '}} <i
                            class="{{$compact['config']['users_statuses'][Auth::User()->status]['icon']}}"></i></h2>
            </div>
        </div>
        <div class="row col-12 center-align mt-4">
            <div class="col-4 width_customize">
                <a href="{{route('user-data')}}">
                    <button type="button" class="btn btn-secondary btn-lg btn-block margined">{{__('view.Moje dane')}}</button>
                </a>
            </div>
            <div class="col-4 width_customize">
                <a href="{{route('user-data-login-edit')}}">
                    <button type="button"
                            class="btn btn-secondary btn-lg btn-block margined">{{__('view.Edytuj dane logowania')}}</button>
                </a>
            </div>
            <div class="col-4 width_customize">
                <a href="{{route('user-data-personal-edit')}}">
                    <button type="button"
                            class="btn btn-secondary btn-lg btn-block">{{__('view.Edytuj dane osobowe')}}</button>
                </a>
            </div>
        </div>
        <div class="row col-12 center-align mt-5">
            <div class="col-4 width_customize">
                <a href="{{route('user-dashboard-borrows-history')}}">
                    <button type="button"
                            class="btn btn-secondary btn-lg btn-block margined">{{__('view.Historia wypożyczeń')}}</button>
                </a>
            </div>
            <div class="col-4 width_customize">
                <a href="{{route('user-dashboard-reservations-history')}}">
                    <button type="button"
                            class="btn btn-secondary btn-lg btn-block margined">{{__('view.Historia rezerwacji')}}</button>
                </a>
            </div>
            <div class="col-4 width_customize">
                <a href="{{route('user-dashboard-payments')}}">
                    <button type="button" class="btn btn-secondary btn-lg btn-block margined">{{__('view.Płatności')}}</button>
                </a>
            </div>
        </div>
    </div>
</div>