<div class="modal fade bd-example-modal-lg" id="addCommuniqueModal" tabindex="-1" role="dialog"
     aria-labelledby="addCommuniqueModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCommuniqueModalTitle">Dodaj komunikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="addCommuniqueModalContainer">
                    <form action="{{route('admin-add-communique')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group col-12 {{ $errors->has('text') ? ' has-error' : '' }}">
                            <label class="col-12 control-label" for="text">Tekst komunikatu</label>
                            <div class="col-12">
                        <textarea style="min-height: 150px;" id="text" class="form-control input-md"
                                  name="text">{{ old('text') ? old('text') : ''}}</textarea>
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-12">
                                <input name="reservation" value="{{__('view.Wyślij')}}"
                                       class="btn btn-outline-success my-2 my-sm-0 mr-sm-2"
                                       type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>