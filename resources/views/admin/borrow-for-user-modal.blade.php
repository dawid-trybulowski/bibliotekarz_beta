<div class="modal fade bd-example-modal-lg" id="borrowForUserModal" tabindex="-1" role="dialog"
     aria-labelledby="activeBorrowsModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="borrowForUserTitle">Rezerwacja dla użytkownika</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="centered_new">
                <div class="container-fluid" id="borrowForUserContainer">
                    <form method="post" action="{{route('borrow-for-user')}}">
                        {{ csrf_field() }}
                        <input id="bookId" type="hidden" name="bookId" value="0">
                        <div class="col-12 mt-4">
                            <div class="form-group col-6 {{ $errors->has('user') ? ' has-error' : '' }}">
                                <label class="col-12 control-label" for="user">Wybierz użytkownika z listy lub wpisz
                                    jego ID</label>
                                <div class="col-12">
                                    <select id="user" name="user" class="form-control" id="user"
                                            onChange="$('#userId').val($('#user').val())">
                                        <option value="" selected>Wybierz użytkownika</option>
                                        @foreach($compact['users'] as $user)
                                            <option value="{{$user['id']}}">{{$user['id'] . '. ' . $user['login'] . ' (' . $user['first_name'] . ' ' . $user['surname'] . ')'}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('user'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-6 {{ $errors->has('userId') ? ' has-error' : '' }}">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>