<div class="modal fade bd-example-modal-lg" id="communiquesModal" tabindex="-1" role="dialog"
     aria-labelledby="communiquesModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="communiquesModalTitle">Komunikaty</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="communiquesModalContainer">
                    <div class="col-12 mt-4">
                        @foreach ($compact['communiques'] as $communique)
                            <div class="col-12 border border-dark mt-2 mb-2">
                                <h6 class="font-weight-bold">{{$communique['created_at']}}</h6>
                                <div class="centered_new"><h6>{{$communique['text']}}</h6></div>
                                <div class="text-right pr-5"><h6>{{$communique['user_name']}}</h6></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if(count($compact['communiques']))
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                </div>
            @else
                <div class="modal-footer">
                    Brak komunikatów
                </div>
            @endif
        </div>
    </div>
</div>