@section('books')
<template id="books">
    <div>
        @foreach ($allBooks as $book)
        <div>
            <div class="row" style="display:flex">
                <div class="col s1 centered cursorPointer" id="{{'bookImageMin_' . $book->id}}" @click="showDetailsFunction({{$book->id}})">      
                    <h5 class="fa fa-book" aria-hidden="true"></h5>
                </div>
                <div class="col s3 valign-wrapper cursorPointer" style="display:flex" id="{{'bookData_' . $book->id}}" @click="showDetailsFunction({{$book->id}})">
                    <div>
                        <h6>{{$book->title}}</h6>
                        <h6>{{$book->author}}</h6>
                        <h6>gatunki/gatunki</h6>
                    </div>
                </div>
                <div class="col s5 valign-wrapper cursorPointer" style="display:flex" id="{{'bookDescriptionShort_' . $book->id}}" @click="showDetailsFunction({{$book->id}})">
                    <div class="truncate">
                        <h6>{{$book->description}}</h6>
                    </div>
                </div>
                <div class="col s1 valign-wrapper centered cursorPointer" style="display:flex" id="{{'bookStatus_' . $book->id}}" @click="showDetailsFunction({{$book->id}})">
                    STATUS
                </div>
                <div class="col s2 valign-wrapper centered" style="display:flex" id="{{'bookActions_' . $book->id}}">
                    <a class='dropdown-button btn' href='#' data-activates="{{'dropdown_' . $book->id}}">Akcje</a>

                    <ul id="{{'dropdown_' . $book->id}}" class='dropdown-content'>
                        <li><a href="#modal_details">Szczegóły</a></li>
                        <li><a href="#!">two</a></li>
                        <li class="divider"></li>
                        <li><a href="#!">three</a></li>
                    </ul>
                </div>
            </div> 
            <div class="row" style="display:flex" v-show="showDetailsProp[{{$book->id}}]==true">
                <div class="divider"></div>
                <div class="col s4 centered">
                    <img src="{{asset($book->image_url)}}" class="bookImgBig">
                    <!--<h6 class="fa fa-book" aria-hidden="true"></h6>-->
                </div>
                <div class="col s4 centered">
                    <h6>{{$book->description}}</h6>
                </div>
                <div class="col s2 centered">
                    <h6>DOSTĘPNE EGZEMPLARZE</h6>
                </div>
                <div class="col s2 centered">
                    <h6>OPINIE</h6>
                </div>
            </div>
            <div class="divider"></div>
        </div>
        @endforeach
    </div>
</template>
@endsection