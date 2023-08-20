
<script>

</script>
<script>
    function delete_row(id){
        Swal.fire({
            title: '@lang('site.confirm_delete')',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#C64EB2',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{ __('site.yes') }}'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-'+id).submit();
            } else {
            }
        })

    }

    $('.delete-form')

    function delete_process(actionurl,id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: actionurl,
            dataType: 'text',
            processData: false,
            contentType: false,
            success: function (data) {
                result = jQuery.parseJSON(data);
                if (result.success) {
                    $("#table").DataTable().ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: '{{ __('site.delete') }}',
                        text: '{{ __('site.deleted_successfully') }}',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: '{{ __('site.delete') }}',
                        text: '{{ __('site.cannot_delete_item') }}',
                    });
                }
            },
            error: function (data) {

            }
        });
        return false;
    }
</script>

<script>
    $(".excel_form").submit(function (e) {
        e.preventDefault();
        btn = $(this).children('btn');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var actionurl = e.currentTarget.action;
        $.ajax({
            type: 'POST',
            url: actionurl,
            data: new FormData(this),
            dataType: 'text',
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('#value').show();
            },
            complete: function () {
                $('#value').hide();
                $('button').removeAttr('disabled');
            },
            success: function (data) {
                result = jQuery.parseJSON(data);
                if (result.success == '3'){
                    swal({
                        icon: 'error',
                        title: result.msg,
                        text: "",
                        type: "error",
                    });
                }
                else if (result.success) {

                    swal({
                        icon: 'success',
                        title: '{{ __('site.added_successfully') }}',
                        text: "",
                        type: "success",
                    });
                    $("{{ $table_id }}").DataTable().ajax.reload()
                    $('.excel_form').trigger('reset');
                    $('.form-group').removeClass('has-error');
                    $('.help-block').text('');
                } else {
                    var errors = result.errors;
                    var html_errors = '<ul>';

                    $('#error').html('');
                    $.each(errors, function (key, val) {
                        key = key.replace('[', '');
                        key = key.replace(']', '');
                        key = key.replace('.', '');
                        $("#" + key + "_error").text(val[0]);
                        $("#" + key + "_div").addClass('has-error');
                        html_errors += "<li>" + val[0] + "<\li>";
                    });
                    html_errors += '</ul>';
                }
            },
            error: function (data) {

            }
        });
    });
</script>
