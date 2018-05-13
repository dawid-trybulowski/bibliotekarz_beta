<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{session('message')->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{session('message')->content}}
                @if(session('message')->code != 200)
                    <p>{{'Kod błędu ' . session('message')->code}}</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>