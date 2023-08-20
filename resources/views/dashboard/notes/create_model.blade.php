<div class="modal fade" id="create-model" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="addUserLabel">@lang('site.add') @lang('site.one_notes')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" id="add_new_form1" method="post" action="{{ route('dashboard.notes.store') }}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <div class="box-body">
                        @include('dashboard.notes.partials._form')
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">@lang('site.add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


