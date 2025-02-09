@extends('admin.layout.app')

@section('content')

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Innov8itcode</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">News</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="card">
                                    <form action="{{  route("news.index") }}"  method="GET" novalidate>
                                        <div class="row" style="padding: 20px 10px 0px 10px;">
                                            
                                            <div class="col-lg-11 col-md-11 col-sm-12">
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
                        <div class="row">
    
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('news.create') }}" class="btn btn-primary" style="color: white;">Create New News</a>
                                            </div>
                                            <h5 class="header-title mb-0">News List</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Slug</th>
                                                            <th>Is Popup</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($news as $index => $data)
                                                        <tr>
                                                            <td>{{ $news->firstItem() + $index }}</td>
                                                            <td>{{ $data->title }}</td>
                                                            <td>{{ $data->slug }}</td>
                                                            <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_popup" {{ $data->is_popup ? 'checked' : '' }}>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('news.edit', ['news' => $data->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                                                <a  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"  data-attr="{{ route('news.destroy', ['news' => $data->id]) }}" style="cursor: pointer;"><span class="badge bg-danger-subtle text-danger">Delete</span></a>   
                                                                @if($data->status === 'pending' && Auth::user()->mainRole()->name === 'super_admin')
                                                                <form action="{{ route('news.approve', ['id' => $data->id]) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    <button type="submit" class="badge bg-success-subtle text-success border-0">Approve</button>
                                                                </form>
                                                            @endif
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div style="padding: 10px; float:right;">
                                                    {{  $news->appends(request()->query())->links('admin.layout.pagination') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-checkbox').change(function() {
                var newsId = $(this).data('id');
                var attribute = $(this).data('attribute');
                var checked = $(this).prop('checked');

                $.ajax({
                    url: '/cms/news/' + newsId,
                    method: 'POST', // Use POST method
                    data: {
                        _method: 'PUT', // Use _method key to override method to PUT
                        _token: '{{ csrf_token() }}', // Include CSRF token for security
                        attribute: attribute,
                        checked: checked ? 1 : 0,
                    },
                    success: function(response) {
                        console.log(response); // Handle success response
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Handle error response
                    }
                });
            });
        });
    </script>
    
@endpush