
<div class="btn-group" role="group" aria-label="Basic outlined example" style="display: inline">
    <button onclick="return edit_row('{{ route('dashboard.notes.edit',$id) }}')" type="button" class="btn btn-outline-secondary"><i
            class="fa fa-pencil text-success"></i></button>
</div>
    <form onsubmit="return delete_process('{{ route('dashboard.notes.remove',$id) }}')" id="delete-{{ $id }}"
          class="delete-form"
          action="{{ route('dashboard.notes.remove',$id) }}"
          method="post" style="display: inline">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <button onclick="delete_row({{ $id }})" type="button" class="btn btn-outline-secondary deleterow"><i
                class="fa fa-trash text-danger"></i></button>
    </form>
