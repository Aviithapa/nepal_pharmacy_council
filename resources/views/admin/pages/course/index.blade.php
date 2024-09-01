@extends('admin.layout.app')

@section('content')

            <!-- start page title -->
            @include('admin.component.breadcrumb', ['title' => "Course Management"])
            <!-- end page title -->
            
            <!-- Search -->
            @include('admin.component.search', ['route' => "course.index"])
            <!-- End Search -->

            <!-- Body -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <div class="card-widgets">
                                    <a href="{{ route('course.create') }}" class="btn btn-primary" style="color: white; text-transform: capitalize;">Create New Course</a>
                                </div>
                                <h5 class="header-title mb-0" style="text-transform: capitalize;">Course List</h5>
                            </div>
                            <div id="yearly-sales-collapse" class="collapse show">
                                <!-- List -->
                                <div class="table-responsive">
                                        <table class="table table-nowrap table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Advisor Name</th>
                                                    <th>Price</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($courses as $index => $data)
                                                <tr>
                                                    <td>{{ ++ $loop->index  }}</td>
                                                    <td>{{ $data->title }}</td>
                                                    <td>{{ $data->category}}</td>
                                                    <td>{{ $data->advisor->name}}</td>
                                                    <td>{{ $data->price}}</td>
                                                    <td>
                                                        <a href="{{ route( 'course.edit', ['course' => $data->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                                        <a  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"  data-attr="{{ route( 'course.destroy', ['course' => $data->id]) }}" style="cursor: pointer;"><span class="badge bg-danger-subtle text-danger">Delete</span></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                           <div style="padding: 10px; float:right;">
                                        {{  $courses->appends(request()->query())->links('admin.layout.pagination') }}
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