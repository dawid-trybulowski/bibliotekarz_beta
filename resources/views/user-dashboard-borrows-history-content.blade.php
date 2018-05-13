<div class="container-fluid">
    <div class="col-12 mt-4">
        <h2 class="mb-4">{{__('view.Historia wypożyczeń')}}</h2>
        <div id="no-more-tables" class="text-center">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
                <thead class="cf bg-dark text-white">
                <tr class="">
                    <th class="numeric">{{__('view.ID')}}</th>
                    <th class="numeric">{{__('view.Tytuł')}}</th>
                    <th class="numeric">{{__('view.Autor')}}</th>
                    <th class="numeric">{{__('view.Data rozpoczęcia')}}</th>
                    <th class="numeric">{{__('view.Data zakończenia')}}</th>
                    <th class="numeric">{{__('view.Status')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($compact['borrows'] as $borrow)
                    <tr>
                        <td data-title="{{__('view.ID')}}">{{$borrow->id}}</td>
                        <td data-title="{{__('view.Tytuł')}}">{{$borrow->title}}</td>
                        <td data-title="{{__('view.Autor')}}" class="numeric">{{$borrow->author}}</td>
                        <td data-title="{{__('view.Rozpoczęcie')}}" class="numeric">{{$borrow->borrow_date_start}}</td>
                        <td data-title="{{__('view.Zakończenie')}}" class="numeric">{{$borrow->borrow_date_end}}</td>
                        <td data-title="{{__('view.Status')}}" class="numeric">{{$compact['config']['borrows_statuses'][$borrow->status]['string']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination center mt-2">
            {{$compact['borrows']->appends(request()->input())->links("pagination::bootstrap-4")}}
        </div>
    </div>
</div>