<div class="container-fluid center-on-customize">
    <div class="row col-12 mt-3 mb-3 internal-div">
        <form class="col-8 width_customize" action="{{route('admin-permitted-users')}}" method="get">
            <select name="searchBy" class="mr-2 width_customize">
                <option value="" selected>Wyszukaj według...</option>
                <option value="id">ID</option>
                <option value="surname">Nazwisko</option>
                <option value="login">login</option>
                <option value="email">email</option>
            </select>
            <select name="orderBy" class="mr-2 width_customize">
                <option value="" selected>Sortuj według...</option>
                <option value="id">ID</option>
                <option value="permissions">Uprawnienia</option>
                <option value="surname">Nazwisko</option>
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
            <a href="{{route('admin-permitted-user-add-show')}}">
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
                <th>ID użytkownika</th>
                <th>Login</th>
                <th>E-mail</th>
                <th>Imię</th>
                <th>Drugie imię</th>
                <th>Nazwisko</th>
                <th>Status</th>
                <th>Uprawnienia</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($compact['permittedUsers'] as $permittedUser)
                <tr>
                    <td data-title="{{__('view.ID')}}">{{$permittedUser['id']}}</td>
                    <td data-title="Login">{{$permittedUser['login']}}</td>
                    <td data-title="E-mail">{{$permittedUser['email']}}</td>
                    <td data-title="Imię">{{$permittedUser['first_name']}}</td>
                    <td data-title="Drugie imię">{{$permittedUser['second_name'] ?: '-'}}</td>
                    <td data-title="Nazwisko">{{$permittedUser['surname']}}</td>
                    <td data-title="Status">{{$compact['config']['users_statuses'][$permittedUser['status']]['string']}}</td>
                    <td data-title="Uprawnienia">{{$compact['config']['users_permissions'][$permittedUser['permissions']]['string']}}</td>
                    <td data-title="Akcje">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                Akcje
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                   href="{{route('admin-permitted-user-edit-show', ['userId' => $permittedUser['id']])}}">Edytuj</a>
                                @if($permittedUser['status'] < 2)
                                    <a class="dropdown-item"
                                       href="{{route('user-close-account', ['userId' => $permittedUser['id']])}}">Zamknij
                                        konto</a>
                                @else
                                    <a class="dropdown-item"
                                       href="{{route('user-open-account', ['userId' => $permittedUser['id']])}}">Otwórz
                                        konto</a>
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
        {{$compact['permittedUsers']->links("pagination::bootstrap-4")}}
    </div>
</div>


