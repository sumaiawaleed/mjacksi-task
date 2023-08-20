<div class="modal fade" id="create-model" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="addUserLabel">@lang('site.add') @lang('site.one_notifications')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" id="add_new_form" method="post" action="{{ route('dashboard.notifications.store') }}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <input type="hidden" id="user_id_input" name="user_id">
                    <h2 id="user_name_lable"></h2>
                    <div class="box-body">
                        @include('dashboard.users.notifications.partials._form')
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">@lang('site.add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
