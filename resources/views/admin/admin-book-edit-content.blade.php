<div class="container-fluid">
    <div class="row">
        <form class="col-12 mt-4" method="POST" action="{{route('admin-book-edit')}}" enctype="multipart/form-data">
            <div class="form-row">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$compact['book']['id']}}">
                <div class="form-group col-6 {{ $errors->has('title') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="title">Tytuł</label>
                    <div class="col-12">
                        <input id="title" name="title" type="text" class="form-control input-md" required=""
                               value="{{ old('title') ? old('title') : $compact['book']['title']}}">
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
                               value="{{ old('unifiedTitle') ? old('unifiedTitle') : $compact['book']['unified_title']}}">
                        @if ($errors->has('unifiedTitle'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('unifiedTitle') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 {{ $errors->has('author') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="author">Autor</label>
                    <div class="col-12">
                        <input id="author" name="author" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('author') ? old('author') : $compact['book']['author']}}">
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
                               value="{{ old('subauthors') ? old('subauthors') : $compact['book']['subauthors']}}">
                        @if ($errors->has('subauthors'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('subauthors') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 {{ $errors->has('publishingHouse') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="publishingHouse">Wydawnictwo</label>
                    <div class="col-12">
                        <input id="publishingHouse" name="publishingHouse" type="text" class="form-control input-md"
                               value="{{ old('publishingHouse') ? old('publishingHouse') : $compact['book']['publishing_house']}}">
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
                               value="{{ old('isbn') ? old('isbn') : $compact['book']['isbn']}}">
                        @if ($errors->has('isbn'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-2 {{ $errors->has('language') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="language">Język (skrót)</label>
                    <div class="col-12">
                        <input id="language" name="language" type="text" class="form-control input-md"
                               required=""
                               value="{{ old('language') ? old('language') : $compact['book']['language']}}">
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
                               value="{{ old('publicationCountryCode') ? old('publicationCountryCode') : $compact['book']['publication_country_code']}}">
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
                               value="{{ old('pages') ? old('pages') : $compact['book']['pages']}}">
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
                               value="{{ old('edition') ? old('edition') : $compact['book']['edition']}}">
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
                               value="{{ old('publicationYear') ? old('publicationYear') : $compact['book']['publication_year']}}">
                        @if ($errors->has('publicationYear'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('publicationYear') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-2 {{ $errors->has('binding') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="binding">Oprawa</label>
                    <div class="col-12">
                        <input id="binding" name="binding" type="text" class="form-control input-md"
                               value="{{ old('binding') ? old('binding') : $compact['book']['binding']}}">
                        @if ($errors->has('binding'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('binding') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 {{ $errors->has('description') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="description">Opis</label>
                    <div class="col-12">
                        <textarea style="min-height: 150px;" id="description" class="form-control input-md"
                                  name="description">{{ old('description') ? old('description') : $compact['book']['description']}}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 {{ $errors->has('category') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="category">Kategoria</label>
                    <div class="col-12">
                        <select id="category" name="category" class="form-control" id="exampleFormControlSelect1">
                            @foreach($compact['categories'] as $category)
                                @if($category['id'] == $compact['book']['category_id'])
                                    <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                                @else
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endif
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
                                {{$i = 0}}
                                @foreach($compact['book']['genres'] as $bookGenres)
                                    @if(in_array($genre['id'], $bookGenres))
                                        {{$i++}}
                                    @endif
                                @endforeach
                                @if($i)
                                    <option value="{{$genre['id']}}" selected="selected">{{$genre['name']}}</option>
                                @else
                                    <option value="{{$genre['id']}}">{{$genre['name']}}</option>
                                @endif
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
            <div class="form-row">
                <div class="form-group col-6 {{ $errors->has('ageCategory') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="ageCategory">Kategoria wiekowa</label>
                    <div class="col-12">
                        <select id="ageCategory" name="ageCategory" class="form-control" id="exampleFormControlSelect1">
                            @foreach($compact['ageCategories'] as $ageCategory)
                                @if($ageCategory['id'] == $compact['book']['age_category_id'])
                                    <option value="{{$ageCategory['id']}}" selected>{{$ageCategory['name']}}</option>
                                @else
                                    <option value="{{$ageCategory['id']}}">{{$ageCategory['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('ageCategory'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('ageCategory') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-6 {{ $errors->has('locationId') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="locationId">Lokalizacja</label>
                    <div class="col-12">
                        <select id="locationId" name="locationId" class="form-control" id="locationId">
                            @foreach($compact['locations'] as $location)
                                @if($location['id'] == $compact['book']['location_id'])
                                    <option value="{{$location['id']}}"
                                            selected>{{$location['name'] . ' ' . $location['address']}}</option>
                                @else
                                    <option value="{{$location['id']}}">{{$location['name'] . ' ' . $location['address']}}</option>
                                @endif

                            @endforeach
                        </select>
                        @if ($errors->has('locationId'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('locationId') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 {{ $errors->has('keys') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="keys">Słowa kluczowe</label>
                    <div class="col-12">
                        <input id="keys" name="keys" type="text" class="form-control input-md"
                               value="{{ old('keys') ? old('keys') : $compact['book']['keys']}}">
                        @if ($errors->has('keys'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('keys') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-3{{ $errors->has('photoChange') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="photoChange">Zmień grafikę</label>
                    <div class="col-12">
                        <input id="photoChange" name="photoChange" type="checkbox"
                               class="form-control form-check-input" @click="changePhotoFunction()">
                        @if ($errors->has('photoChange'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('photoChange') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-3{{ $errors->has('photo') ? ' has-error' : '' }} width_customize" v-show="changePhoto" id="photoDiv">
                    <label class="col-12 control-label" for="photo">Grafika</label>
                    <div class="col-12">
                        <input type="file" class="form-control-file" id="photo" name="photo"
                               value="{{$compact['book']['image_url']}}">
                        @if ($errors->has('photo'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                @if($compact['book']['image_url'])
                <div class="form-group col-3 {{ $errors->has('photo') ? ' has-error' : '' }} width_customize" id="imgDiv">
                    <div class="col-12 align-right">
                        <img src="{{asset('/img/' . $compact['book']['image_url'])}}" class="img-fluid width_customize"
                             style="max-width:100px">
                    </div>
                </div>
                    @endif
            </div>
            <div class="form-row mt-3 mb-2">
                <div class="form-group col-6 {{ $errors->has('active') ? ' has-error' : '' }} width_customize">
                    <label class="col-12 control-label" for="active">Dostępna do wypożyczenia</label>
                    <input id="active" name="active" type="checkbox" class="form-control form-check-input"
                            {{$compact['book']['active'] ? 'checked' : ''}}>
                    @if ($errors->has('active'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
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