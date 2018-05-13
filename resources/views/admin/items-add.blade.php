@include('admin/top')
@include('admin/books-find-modal')
<div class="col s9" style="color:#fff">
    <h3>Dodaj egzemplarz</h3>
</div>
</div>
</div>
<div id="app">

    <div class="row">
        <form class="col s12" method="POST" action="{{route('admin-items-add')}}">
            {{ csrf_field() }}

            <div class="col s12">
                <div class="form-group{{ $errors->has('bookId') ? ' has-error' : '' }}">

                    <div class="input-field col s4">
                        <input placeholder='ID pozycji' id="bookId" type="text" name="bookId" class="validate"
                               value="{{ old('bookId') }}"
                               onchange="bookIdChange({{$data['books']}})">
                        @if ($errors->has('bookId'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('bookId') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="col s1 input-field" style="margin-top:2%">
                    <i class="material-icons cursorPointer" onclick="$('#booksFindModal').modal('open')">search</i>
                </div>
                <div class="col s7 input-field centered_new" style="margin-top:2%">
                    <h6 id="bookData"></h6>
                </div>

            </div>
            <div class="col s12">

                <div class="form-group{{ $errors->has('isbn') ? ' has-error' : '' }}">

                    <div class="input-field col s6">
                        <input id="isbn" type="text" name="isbn" class="validate"
                               value="{{ old('isbn') }}">
                        <label for="name">ISBN *</label>
                        @if ($errors->has('isbn'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('publicationYear') ? ' has-error' : '' }}">

                    <div class="input-field col s6">
                        <input id="publicationYear" type="text" name="publicationYear" class="validate"
                               value="{{ old('publicationYear') }}">
                        <label for="name">Rok wydania *</label>
                        @if ($errors->has('publicationYear'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('publicationYear') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <div class="col s6" style="margin-top:15px;">
                        <input type="checkbox" id="status" checked="checked" name="status">
                        <label for="status">Dostępny do wypożyczenia?</label>
                    </div>
                    @if ($errors->has('status'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                    @endif
                </div>

            </div>
            <div class="form-group" style="text-align:center">
                <div class="input-field col s12">
                    <i class="waves-effect waves-light btn biggerButton waves-input-wrapper" style="">
                        <input name="submit" value="Zatwierdź" class="waves-button-input" type="submit">
                    </i>
                </div>
            </div>
        </form>
    </div>

</div>
<main>

@include('admin/footer')

    <script>
        function bookIdChange(books) {
            if (books[$('#bookId').val()]) {
                $('#bookData').text(books[$('#bookId').val()].title + ' ' + books[$('#bookId').val()].author);
            }
            else{
                $('#bookData').text('Nie znaleziono');
            }
        }
    </script>