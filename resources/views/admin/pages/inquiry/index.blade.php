@extends('admin.layout.app')

@section('content')

            <!-- start page title -->
            @include('admin.component.breadcrumb', ['title' => "INquiry Management"])
            <!-- end page title -->
            
            <!-- Search -->
            <div class="card">
                <form action="{{  route('inquiry.index') }}"  method="GET" novalidate>
                    <div class="row" style="padding: 20px 10px 0px 10px;"> 
                        
                        <div class="col-lg-4 col-md-4 col-sm-6"> 
                            <div class="mb-3">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="keyword" value="{{ isset($request) ? $request->get('keyword') : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6"> 
                            <div class="mb-3">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Email" name="email" value="{{ isset($request) ? $request->get('email') : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6"> 
                            <div class="mb-3">
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="keyword" value="{{ isset($request) ? $request->get('keyword') : '' }}">
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-6"> 
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Search -->

            <!-- Body -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <h5 class="header-title mb-0" style="text-transform: capitalize;">Inquiry List</h5>
                            </div>
                            <div id="yearly-sales-collapse" class="collapse show">
                                <!-- List -->
                                <div class="table-responsive">
                                        <table class="table table-nowrap table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Contact Number</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($inquiries as $index => $data)
                                                <tr>
                                                    <td>{{ ++ $loop->index  }}</td>
                                                    <td>{{ $data->first_name }}</td>
                                                    <td>{{ $data->last_name }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->phone_number }}</td>
                                                    <td>{{ $data->status }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                           <div style="padding: 10px; float:right;">
                                        {{  $inquiries->appends(request()->query())->links('admin.layout.pagination') }}
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                   
                                <!-- List -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Body -->
@endsection


@push('scripts')
<script> 
     const exampleModal = document.getElementById('exampleModal')
     exampleModal.addEventListener('show.bs.modal', event => {
     const button = event.relatedTarget
     const recipient = button.getAttribute('data-attr')
      document.getElementById('deleteForm').action = recipient; 
     })
</script>
    
@endpush