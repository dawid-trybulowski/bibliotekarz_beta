<div class="modal fade bd-example-modal-lg" id="przelewy24PaymentsModal" tabindex="-1" role="dialog"
     aria-labelledby="przelewy24PaymentsModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="przelewy24PaymentsContainer_down">
                        <div class="col-4 col-md-offset-4 width_customize col-center"><img src="{{asset('/img/przelewy24-logo.png')}}" class="img-fluid width_customize"></div>
                        <div class="col-8 width_customize col-center">
                            <form method="post" action="{{route('przelewy24Payment')}}">
                                {{ csrf_field() }}
                                <div class="col-12 width_customize align-content-center">
                                    <div class="col-12 width_customize mb-2 align-content-center">
                                        <h5>Wpisz kwotę (PLN):</h5>
                                    </div>
                                    <div class="col-4 width_customize mb-2 align-content-center">
                                        <input id="amount" name="amount" type="text" class="form-control input-md"
                                               required=""
                                               value="{{Auth::User()->debt / 100}}">
                                    </div>
                                    <div class="col-6 text-right width_customize align-content-center">
                                        <button type="submit" class="btn btn-success btn-block">Zapłać</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>