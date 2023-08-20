<div class="modal fade" id="edit-model" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="addUserLabel">@lang('site.edit') @lang('site.one_notes')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="edit_new_form" role="form" method="post"
                      action="{{ route('dashboard.notes.update',0) }}">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="box-body">
                        <div id="edit_model_body">
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">@lang('site.edit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


