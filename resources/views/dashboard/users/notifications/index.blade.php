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
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>title</th>
                                    <th>description</th>
                                </tr>
                                @foreach($data['notifications'] as $n)
                                 <tr>
                                    <td>{{ $n->title }}</td>
                                    <td>{{ $n->description }}</td>
                                 </tr>
                                 @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Row End -->
        </div>
    </div>

@endsection

