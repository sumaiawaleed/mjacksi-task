<input type="hidden" name="id" value="{{ $form_data->id }}">

<div class="row">
   

    <div class="col-md-6 mb-3" id="note_details_edit_div">
        <label class="form-label" for="note_details_edit_input">@lang('site.note_details')</label>
        <textarea class="form-control" name="note_details" id="note_details_edit_input">{{ $form_data->note_details }}</textarea>
        <span id="note_details_edit_error" class="help-block"></span>
    </div>


    <div class="col-md-6 mb-3" id="image_edit_div">
        <div class="form-group">
            <input type="file" name="image" id="image_file" class="image">
        </div>

        <div class="form-group">
            @php $image_path = isset($form_data) ? $form_data->image_path : asset('photo.svg'); @endphp
            <img class="image-preview" width="200" height="200" src="{{ $image_path }}">
        </div>
    </div>

</div>


