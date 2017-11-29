<template id="books">
    <div>
        @foreach ($refactoredBooks as $book)
            <div>
                <div class="row refactored-row">
                    <div class="col s1 centered cursorPointer" id="{{'bookImgSmall_' . $book->getId()}}"
                         @click="showDetailsFunction({{$book->getId()}})">
                        <img src="{{asset('img/'.$book->getImageUrl())}}" class="bookImgSmall">
                    </div>
                    <div class="col s3 valign-wrapper cursorPointer" style="display:flex"
                         id="{{'bookData_' . $book->getId()}}" @click="showDetailsFunction({{$book->getId()}})">
                        <div>
                            <div>
                                <a class="waves-effect waves-light btn biggerButton">{{$book->getTitle()}}</a>
                            </div>
                            <div>
                                <a class="waves-effect waves-light btn smallButton">{{$book->getauthor()}}</a>
                            </div>
                            <h6>
                                @foreach($book->getGenres() as $genre)
                                    <a class="waves-effect waves-light btn smallButton blueButton">{{$genre[0]}}</a>
                                @endforeach
                            </h6>
                        </div>
                    </div>
                    <div class="col s5 valign-wrapper cursorPointer" style="display:flex"
                         id="{{'bookDescriptionShort_' . $book->getId()}}"
                         @click="showDetailsFunction({{$book->getId()}})">

                        <div class="col s12">
                            <div class="card-panel teal cardShort centered">
                                Tu jest krótki opis Tu jest krótki opisTu jest krótki opisTu jest krótki opisTu jest
                                krótki opisTu jest krótki opisTu jest krótki opisTu jest krótki opis
                            </div>
                        </div>


                    </div>
                    <div class="col s1 valign-wrapper centered cursorPointer" style="display:flex"
                         id="{{'bookStatus_' . $book->getId()}}" @click="showDetailsFunction({{$book->getId()}})">
                        @if ($book->getStatus() == 'Dostępna')
                            <div>
                                <a class="waves-effect waves-light btn smallButton availabeButton">{{$book->getStatus()}}</a>
                            </div>
                        @else
                            <div>
                                <a class="waves-effect waves-light btn smallButton unavailableButton">{{$book->getStatus()}}</a>
                            </div>
                        @endif
                    </div>
                    <div class="col s2 valign-wrapper centered " style="display:flex"
                         id="{{'bookReservation_' . $book->getId()}}">
                            <form class="col s12" action="reservation" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="bookId" value="{{$book->getId()}}">
                                <input type="hidden" name="userId" value="{{isset(Auth::user()->id) ? Auth::user()->id : 0}}">
                                <input class="waves-effect waves-light btn biggerButton" type="submit"
                                       name="reservation" value="Zarezerwuj">
                            </form>
                    </div>
                </div>
                <div class="row refactored-row details" style="display:flex; margin-bottom: 2px;"
                     v-show="showDetailsProp[{{$book->getId()}}]==true">
                    <div class="col s4 centered">
                        <img src="{{asset('img/'.$book->getImageUrl())}}" class="bookImgBig">
                    </div>
                    <div class="col s5 centered">
                        <div>
                            <div class="col s12">
                                <div class="card-panel teal cardLong centered" style="background-color">
                                    {{$book->getDescription()}}
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="card-panel teal cardLong centered">
                                    <form id="ratingsForm" style="width:100%">
                                        <h6 style="text-align:center">Oceń książkę</h6>
                                        <div class="stars">
                                            <input name="star" class="star-1" id="star-1" type="radio">
                                            <label class="star-1" for="star-1">1</label>
                                            <input name="star" class="star-2" id="star-2" type="radio">
                                            <label class="star-2" for="star-2">2</label>
                                            <input name="star" class="star-3" id="star-3" type="radio">
                                            <label class="star-3" for="star-3">3</label>
                                            <input name="star" class="star-4" id="star-4" type="radio">
                                            <label class="star-4" for="star-4">4</label>
                                            <input name="star" class="star-5" id="star-5" type="radio">
                                            <label class="star-5" for="star-5">5</label>
                                            <span></span>
                                        </div>
                                        <div class="row" style="margin-bottom: 0">
                                            <div class="input-field col s12">
                                                <textarea id="textarea1" class="materialize-textarea"></textarea>
                                                <label for="textarea1">Dodaj komentarz</label>
                                            </div>
                                        </div>
                                        <div class="centered">
                                            <button class="btn waves-effect waves-light biggerButton" type="submit"
                                                    name="action">Wyślij opinię
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s3 centered">
                        <div>
                            <div class="col s12">
                                <div class="card-panel teal cardLong centered" style="background-color">
                                    Dostępnych egzeplarzy: {{$book->getItems()}}
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="card-panel teal cardLong centered" style="background-color">
                                    Ocena:
                                    <form id="ratingsForm" style="width:100%">
                                        <h6 style="text-align:center">4,52</h6>
                                        <div class="stars">
                                            <input name="star" class="star-1" id="star-1" type="radio">
                                            <label class="star-1" for="star-1">1</label>
                                            <input name="star" class="star-2" id="star-2" type="radio">
                                            <label class="star-2" for="star-2">2</label>
                                            <input name="star" class="star-3" id="star-3" type="radio">
                                            <label class="star-3" for="star-3">3</label>
                                            <input name="star" class="star-4" id="star-4" type="radio">
                                            <label class="star-4" for="star-4">4</label>
                                            <input name="star" class="star-5" id="star-5" type="radio">
                                            <label class="star-5" for="star-5">5</label>
                                            <span></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="card-panel teal cardLong" style="background-color">
                                    <div class="chip">
                                        <img src="img/yuna.jpg" alt="Contact Person">
                                        Jane Doe
                                    </div>
                                    <div>
                                        To jest mój komentarz To jest mój komentarz To jest mój komentarz To jest mój
                                        komentarz
                                    </div>
                                    <div class="chip">
                                        <img src="img/yuna.jpg" alt="Contact Person">
                                        Dawid Trybułowski
                                    </div>
                                    <div>
                                        To jest drugi komentarz
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                </div>
                @endforeach
            </div>
</template>