<div class="modal fade bd-example-modal-lg" id="activeBorrowsModal" tabindex="-1" role="dialog"
     aria-labelledby="activeBorrowsModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="borrowsModalLongTitle">Aktywne wypożyczenia
                    użytkownika {{Auth::User()->login}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="centered_new">
                <div class="loaderBorrows"></div>
            </div>
            <div class="modal-body" v-show="activeBorrowsLoaded">
                <div class="container-fluid" id="activeBorrowsContainer">
                    <div id="no-more-tables">
                        <table class="col-md-12 table-bordered table-condensed cf"
                               id="activeBorrowsTable">
                            <thead class="cf bg-dark text-white" id="activeBorrowsThead">
                            </thead>
                            <tbody id="activeBorrowsTbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>