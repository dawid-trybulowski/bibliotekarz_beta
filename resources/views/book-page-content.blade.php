<div class="container_fluid">
    <div class="row">
        @if($compact['book']['image_url'])
            <div class="col-12 text-center">
                <img class="img-fluid mt-2 mb-2" style="max-width:400px"
                     src="{{asset('img/'.$compact['book']['image_url'])}}">
            </div>
        @endif
        <div class="col-12 text-center align-content-center">
            @foreach($compact['map'] as $key => $value)
                <div class="col-sm-12 bg-dark text-white pt-2 pb-2">
                    {{ucfirst($value)}}
                </div>
                <div class="col-sm-12 pt-2 pb-2 border border-dark">
                    @if(is_array($compact['book'][$key]))
                        @foreach($compact['book'][$key] as $element)
                            {{$element['string'] . ', '}}
                        @endforeach
                    @else
                        {{$compact['book'][$key] ?: '-'}}
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>