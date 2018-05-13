<div class="modal fade" id="messageModalCompact" tabindex="-1" role="dialog" aria-labelledby="messageModalCompact" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$compact['message']->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{$compact['message']->content}}
                @if($compact['message']->code != 200)
                    <p>{{'Kod błędu ' .$compact['message']->code}}</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>