@extends('admin.layout.app')

@section('content')

        <!-- start page title -->
                @include('admin.component.breadcrumb', ['title' => "College Management"])
        <!-- end page title -->


        <!-- Body -->
        <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <h5 class="header-title mb-0" style="text-transform: capitalize;">College List</h5>
                            </div>
                            <div id="yearly-sales-collapse" class="collapse show row">
                                <!-- List -->
                                
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <div class="card">
                                                <div class="card-body p-3">
                                                        <form method="POST" action="{{ route('college.store') }}" enctype="multipart/form-data">
                                                            <div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom01">Name</label>
                                                                        <input type="text" class="form-control" placeholder="Name" name="name"  required value="{{ isset($model) ? $model->name : old('name') }}">
                                                                            @if($errors->any())
                                                                                {{ $errors->first('name') }}
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom01">University</label>
                                                                        <select class="form-select mb-3" name="university">
                                                                            <option value="">Please Select University</option>
                                                                            <option value="purbanchal">Purbanchal University</option>
                                                                            <option value="tribhuvan">Tribhuvan University</option>
                                                                            <option value="pokhara">Pokhara University</option>
                                                                            <option value="kathmandu">Kathamandu University</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom01">Level</label>
                                                                        <select class="form-select mb-3" name="type">
                                                                            <option>Please Select Level</option>
                                                                            <option value="diploma">Diploma</option>
                                                                            <option value="bachelor">Bachelor</option>
                                                                            <option value="foreign">Foreign</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom01">Contact Number</label>
                                                                        <input type="text" class="form-control" placeholder="Contact Number" name="contact_number" value="{{ isset($model) ? $model->contact_number : old('contact_number') }}">
                                                                            @if($errors->any())
                                                                                {{ $errors->first('contact_number') }}
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="validationCustom01">Email</label>
                                                                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{ isset($model) ? $model->email : old('email') }}">
                                                                            @if($errors->any())
                                                                                {{ $errors->first('email') }}
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                            <button class="btn btn-primary" type="submit">Create College</button>
                                                        </form>
                                                </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>University</th>
                                                                    <th>Label</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($college as $index => $data)
                                                                <tr>
                                                                    <td>{{ $college->firstItem() + $index }}</td>
                                                                    <td>{{ $data->name }}</td>
                                                                    <td>{{ $data->university }}</td>
                                                                    <td>
                                                                        {{ $data->type }}
                                                                    </td>
                                                                    <td>
                                                                        <a  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"  data-attr="{{ route('college.destroy', ['college' => $data->id]) }}" style="cursor: pointer;"><span class="badge bg-danger-subtle text-danger">Delete</span></a>                                                            
                                                                    </td>
        
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                    <div style="padding: 10px; float:right;">
                                                        {{  $college->appends(request()->query())->links('admin.layout.pagination') }}
                                                        </div>
                                                </div>
                                                
                                        </div>
                                </div>


                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="mySmallModalLabel">Delete Modal</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure want to delete?
                                                </div>
                                                <div class="modal-footer">
                                                    <form  action="#" method="POST" id="deleteForm">
                                                        @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                
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