<div class="container-fluid center-on-customize">
    <div class="row col-12 mt-3 mb-3 internal-div">
        <form class="col-8 width_customize" action="{{route('admin-payments')}}" method="get">
            <select name="searchBy" class="mr-2 width_customize">
                <option value="" selected>Wyszukaj według...</option>
                <option value="payments.id">ID</option>
                <option value="user_id">ID użytkownika</option>
                <option value="user.surname">Nazwiska użytkownika</option>
            </select>
            <select name="orderBy" class="mr-2 width_customize">
                <option value="" selected>Sortuj według...</option>
                <option value="payments.id">ID</option>
                <option value="created_at">Daty wpłaty</option>
            </select>
            <select name="orderDirection" class="mr-2 width_customize">
                <option value="desc">Malejąco</option>
                <option value="asc">Rosnąco</option>
            </select>
            <input id="text" type="search" name="text" class="mr-2 width_customize">
            <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit"
                    name="submit" value="search">
                Wyszukaj
            </button>
        </form>
        <div class="col-4 text-right width_customize center-on-customize" style="font-size: 150%">
            <a href="{{route('admin-payment-add-show')}}">
                <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="button"
                        name="submit" value="search">
                    Dodaj <i class="fas fa-plus-circle"></i>
                </button>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div id="no-more-tables">
        <table class="col-md-12 table-bordered table-striped table-condensed cf text-center">
            <thead class="cf bg-dark text-white">
            <tr>
                <th>ID płatności</th>
                <th>ID użytkownika</th>
                <th>Imię i nazwisko użytkownika</th>
                <th>Kwota (gr.)</th>
                <th>Waluta</th>
                <th>Status</th>
                <th>Data transakcji</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($compact['payments'] as $payment)
                <tr>
                    <td data-title="{{__('view.ID')}}">{{$payment['id']}}</td>
                    <td data-title="ID użytkownika">{{$payment['user_id']}}</td>
                    <td data-title="Dane użytkownika">{{$payment['first_name'] . ' ' . $payment['surname']}}</td>
                    <td data-title="Kwota (gr.)">{{$payment['amount']}}</td>
                    <td data-title="Waluta">{{$payment['currency']}}</td>
                    <td data-title="Status">{{$compact['config']['payments_statuses'][$payment['status']]['string']}}</td>
                    <td data-title="Data transakcji">{{$payment['created_at']}}</td>
                    <td data-title="Akcje">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                Akcje
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if($payment['status'])
                                    <a class="dropdown-item"
                                       href="{{route('set-payment-status', ['id' => $payment['id'], 'status' => false])}}">Oznacz
                                        jako nieopłaconą</a>
                                @else
                                    <a class="dropdown-item"
                                       href="{{route('set-payment-status', ['id' => $payment['id'], 'status' => true])}}">Oznacz
                                        jako opłaconą</a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="center-align ">
        {{$compact['payments']->links("pagination::bootstrap-4")}}
    </div>
</div>


