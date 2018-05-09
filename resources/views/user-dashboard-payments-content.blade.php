<div class="container-fluid">
    <div class="col-12">
        <h2 class="mb-3 mt-3">{{__('view.Historia opóźnionych wypożyczeń')}}</h2>
    </div>
    <div class="col-12">
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
                <thead class="cf bg-dark text-white">
                <tr class="">
                    <th class="numeric">{{__('view.ID')}}</th>
                    <th class="numeric">{{__('view.Tytuł')}}</th>
                    <th class="numeric">{{__('view.Autor')}}</th>
                    <th class="numeric">{{__('view.Data rozpoczęcia')}}</th>
                    <th class="numeric">{{__('view.Data zakończenia')}}</th>
                    <th class="numeric">{{__('view.Dni opóźnienia')}}</th>
                    <th class="numeric">{{__('view.Koszt opóźnienia')}}</th>
                    <th class="numeric">{{__('view.Status')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($compact['delayedBorrows'] as $delayedBorrow)
                    <tr>
                        <td data-title="{{__('view.ID')}}" class="numeric">{{$delayedBorrow->id}}</td>
                        <td data-title="{{__('view.Tytuł')}}" class="numeric">{{$delayedBorrow->book_title}}</td>
                        <td data-title="{{__('view.Autor')}}" class="numeric">{{$delayedBorrow->book_author}}</td>
                        <td data-title="{{__('view.Data rozpoczęcia')}}" class="numeric">{{$delayedBorrow->borrow_date_start}}</td>
                        <td data-title="{{__('view.Data zakończenia')}}" class="numeric">{{$delayedBorrow->borrow_date_end}}</td>
                        <td data-title="{{__('view.Dni opóźnienia')}}" class="numeric">{{$delayedBorrow->delay}}</td>
                        <td data-title="{{__('view.Koszt opóźnienia')}}" class="numeric">{{$delayedBorrow->delay_cost . ' PLN'}}</td>
                        <td data-title="{{__('view.Status')}}" class="numeric">{{$compact['config']['borrows_statuses'][$delayedBorrow->status]['string']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-12">
        <h2 class="mb-2 mt-2">{{__('view.Do zapłaty') . ': ' . Auth::User()->debt / 100 . ' PLN'}}</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-4 width_customize text-center mb-2">
            <button type="button"
                    class="btn btn-outline-success btn-block my-2 my-sm-0 mr-sm-2 cursorPointer width_customize"
                    @click="showPrzelewy24PaymentsModal()">{{__('view.Zapłać z Przelewy24')}}</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4 width_customize text-center">
            <button type="button"
                    class="btn btn-outline-success btn-block my-2 my-sm-0 mr-sm-2 width_customize"
                    @click="showPaymentsDataModal()">{{__('view.Dane do przelewu tradycyjnego')}}</button>
        </div>
    </div>

</div>