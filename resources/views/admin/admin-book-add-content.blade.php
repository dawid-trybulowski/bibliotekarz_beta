<div class="container-fluid">
    <div class="row">
        <form class="col-12 mt-4" method="POST" action="{{route('admin-book-add')}}" enctype="multipart/form-data">
            <div class="form-row col-12">
                {{ csrf_field() }}
                <div class="form-group col-6 {{ $errors->has('title') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="title">Tytuł</label>
                    <div class="col-12">
                        <input id="title" name="title" type="text" class="form-control input-md" required=""
                               value="{{ old('title') ? old('title') : ''}}">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('unifiedTitle') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="author">Tytuł zunifikowany</label>
                    <div class="col-12">
                        <input id="unifiedTitle" name="unifiedTitle" type="text" class="form-control input-md"
                               value="{{ old('unifiedTitle') ? old('unifiedTitle') : ''}}">
                        @if ($errors->has('unifiedTitle'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('unifiedTitle') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-6 {{ $errors->has('author') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="author">Autor</label>
                    <div class="col-12">
                        <input id="author" name="author" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('author') ? old('author') : ''}}">
                        @if ($errors->has('author'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('subauthors') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="subauthors">Współautorzy (wpisz po przecinkach)</label>
                    <div class="col-12">
                        <input id="subauthors" name="subauthors" type="text" class="form-control input-md"
                               value="{{ old('subauthors') ? old('subauthors') :''}}">
                        @if ($errors->has('subauthors'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('subauthors') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-6 {{ $errors->has('publishingHouse') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="publishingHouse">Wydawnictwo</label>
                    <div class="col-12">
                        <input id="publishingHouse" name="publishingHouse" type="text" class="form-control input-md"
                               value="{{ old('publishingHouse') ? old('publishingHouse') : ''}}">
                        @if ($errors->has('publishingHouse'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('publishingHouse') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('isbn') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="isbn">ISBN</label>
                    <div class="col-12">
                        <input id="isbn" name="isbn" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('isbn') ? old('isbn') : ''}}">
                        @if ($errors->has('isbn'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-2 {{ $errors->has('language') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="language">Język (skrót)</label>
                    <div class="col-12">
                        <input id="language" name="language" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('language') ? old('language') : ''}}">
                        @if ($errors->has('language'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-2 {{ $errors->has('publicationCountryCode') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="language">Kraj wydania (skrót)</label>
                    <div class="col-12">
                        <input id="publicationCountryCode" name="publicationCountryCode" type="text"
                               class="form-control input-md"
                               value="{{ old('publicationCountryCode') ? old('publicationCountryCode') : ''}}">
                        @if ($errors->has('publicationCountryCode'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('publicationCountryCode') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-2 {{ $errors->has('pages') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="language">Ilość stron</label>
                    <div class="col-12">
                        <input id="pages" name="pages" type="text" class="form-control input-md"
                               value="{{ old('pages') ? old('pages') : ''}}">
                        @if ($errors->has('pages'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('pages') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-2 {{ $errors->has('edition') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="language">Edycja</label>
                    <div class="col-12">
                        <input id="edition" name="edition" type="text" class="form-control input-md"
                               value="{{ old('edition') ? old('edition') : ''}}">
                        @if ($errors->has('edition'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('edition') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-2 {{ $errors->has('publicationYear') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="language">Rok wydania</label>
                    <div class="col-12">
                        <input id="publicationYear" name="publicationYear" type="text" class="form-control input-md"
                               value="{{ old('publicationYear') ? old('publicationYear') : ''}}">
                        @if ($errors->has('publicationYear'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('publicationYear') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-12 {{ $errors->has('description') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="description">Opis</label>
                    <div class="col-12">
                        <textarea style="min-height: 150px;" id="description" class="form-control input-md"
                                  name="description">{{ old('description') ? old('description') : ''}}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-6 {{ $errors->has('category') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="category">Kategoria</label>
                    <div class="col-12">
                        <select id="category" name="category" class="form-control" id="exampleFormControlSelect1">
                            @foreach($compact['categories'] as $category)
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('genres') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="genres">Kategoria</label>
                    <div class="col-12">
                        <select multiple="multiple" id="genres" name="genres[]" class="form-control">
                            @foreach($compact['genres'] as $genre)
                                <option value="{{$genre['id']}}">{{$genre['name']}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('genres'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('genres') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-6 {{ $errors->has('ageCategory') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="ageCategory">Kategoria wiekowa</label>
                    <div class="col-12">
                        <select id="ageCategory" name="ageCategory" class="form-control" id="exampleFormControlSelect1">
                            @foreach($compact['ageCategories'] as $ageCategory)
                                <option value="{{$ageCategory['id']}}">{{$ageCategory['name']}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('ageCategory'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('ageCategory') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('photo') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="photo">Grafika</label>
                    <div class="col-12">
                        <input type="file" class="form-control-file" id="photo" name="photo">
                        @if ($errors->has('ageCategory'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('ageCategory') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12">
                <div class="form-group col-6 {{ $errors->has('owner') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="owner">Właściciel</label>
                    <div class="col-12">
                        <input id="owner" name="owner" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('owner') ? old('owner') : ''}}">
                        @if ($errors->has('owner'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('owner') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('locationCode') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="locationCode">Kod lokalizacji</label>
                    <div class="col-12">
                        <input id="locationCode" name="locationCode" type="text" class="form-control input-md"
                               value="{{ old('locationCode') ? old('locationCode') : ''}}">
                        @if ($errors->has('locationCode'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('locationCode') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row col-12 mt-2 mb-2">
                <div class="form-group col-6 {{ $errors->has('visible') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="visible">Dostępna do wypożyczenia</label>
                    <div class="col-6 center-on-customize width_customize">
                        <input id="visible" name="visible" type="checkbox" class="form-control form-check-input">
                    </div>
                    @if ($errors->has('author'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('visible') }}</strong>
                                    </span>
                    @endif
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