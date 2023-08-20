@extends('dashboard.app.app')
@section('content')
    @php $create = __('site.create').' '.__('site.one_users'); @endphp

    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">{{ $data['title'] }}</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" onclick="send_all()"><i class="fa-circle-plus me-2 fs-6"></i>Send notification to all
                            </button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div><!-- Row End -->
        </div>
    </div>

@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/css/jquery.dataTables.min.css')}}">
@endpush

@push('scripts')
    @php $table_id = 'table';@endphp
    <script src="{{ asset('dashboard/js/data-table/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('dashboard/js/data-table/data-table-act.js')}}"></script>
    {!! $dataTable->scripts()  !!}
    @include('dashboard.users.notifications.partials.add_note_modal')
    @include('dashboard.users.notifications.partials.add_note_js')
    @include('dashboard.users.notifications.partials._form')
    @include('dashboard.app.js.operations.create')


@endpush
