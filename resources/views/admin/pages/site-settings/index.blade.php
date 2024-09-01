@extends('admin.layout.app')

@section('content')

  <!-- start page title -->
                        @include('admin.component.breadcrumb', ['title' => "Site Setting"])
                        <!-- end page title -->
                        <div class="row">
    
                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('dashboard.site-settings.create') }}" class="btn btn-primary" style="color: white;">Edit Setting</a>
                                            </div>
                                            <h5 class="header-title mb-0">Site Settings</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Display Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($site_settings as $data)
                                                        <tr>
                                                            <td>{{ ++ $loop->index  }}</td>
                                                            <td>{{ $data->name }}</td>
                                                            <td>{{ $data->display_name }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                   <div style="padding: 10px; float:right;">
                                                {{  $site_settings->appends(request()->query())->links('admin.layout.pagination') }}
                                                </div>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
@endsection

@push('scripts')

    
@endpush