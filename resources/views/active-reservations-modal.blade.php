<div class="modal fade bd-example-modal-lg" id="activeReservationsModal" tabindex="-1" role="dialog" aria-labelledby="activeReservationsModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Aktywne rezerwacje użytkownika {{Auth::User()->login}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="centered_new"><div class="loaderReservations"></div></div>
            <div class="modal-body" v-show="activeReservationsLoaded">
                <div class="container-fluid">
                    <div id="no-more-tables">
                    <table class="col-md-12 table-bordered table-striped table-condensed cf" id="activeReservationsTable">
                        <thead class="cf bg-dark text-white" id="activeReservationsThead">
                        </thead>
                        <tbody id="activeReservationsTbody">
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