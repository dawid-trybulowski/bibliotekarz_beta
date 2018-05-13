<div class="modal fade bd-example-modal-lg" id="paymentsDataModal" tabindex="-1" role="dialog" aria-labelledby="activeReservationsModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentsDataTitle">Dane do przelewu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="paymentsDataContainer">
                    <div class="col-12 mt-4">
                        <p><b>Numer konta: </b>{{$compact['config']['payments_data']['account_number']}}</p>
                        <p><b>Tytuł płatności: </b>{{$compact['config']['payments_data']['payment_title'] . ' ' . Auth::User()->id}}</p>
                        <p><b>Odbiorca: </b>{{$compact['config']['payments_data']['receiver']}}</p>
                        <p><b>Adres: </b>{{$compact['config']['payments_data']['address']}}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>