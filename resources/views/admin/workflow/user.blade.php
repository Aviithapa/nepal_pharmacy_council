@extends('admin.layout.app')

@section('content')

 <!-- start page title -->
 @include('admin.component.breadcrumb', ['title' => "Work Flow Management"])
 <!-- end page title -->
 

 <!-- Body -->
 <div class="row">
     <div class="col-xl-12">
         <div class="card">
             <div class="card-body p-0">
                 <div class="p-3">
                     <div class="card-widgets">
                     </div>
                     <h5 class="header-title mb-0" style="text-transform: capitalize;">Work Flow List</h5>
                 </div>
                 <div id="yearly-sales-collapse" class="collapse show">
                     <!-- List -->
                     <div class="table-responsive">
                             <table class="table table-nowrap table-hover mb-0">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Work</th>
                                         <th>Assigned Date</th>
                                         <th>Due Date</th>
                                         <th>Status</th>
                                         <th>Task Description</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($data as $task)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $loop->iteration }}</td> <!-- Display the index number -->
                                        <td style="vertical-align: middle;">{{ $task->task->title }}</td> <!-- Task name -->
                                        <td style="vertical-align: middle;">{{ $task->assigned_at }}</td> <!-- Display the assignment date -->
                                        <td style="vertical-align: middle;">
                                            {{ $task->due_date }}     
                                        </td>
                                       
                                        <td style="vertical-align: middle;">
                                            <span class="badge bg-info-subtle text-info">{{ ucfirst($task->status) }}</span>
                                        </td> <!-- Task status -->
                                        <td style="vertical-align: middle;">
                                            <textarea class="form-control" rows="3">{{ $task->description }}</textarea>
                                        </td>
                                        
                                    </tr>
                                 
                                @endforeach
                                 </tbody>
                             </table>
                                <div style="padding: 10px; float:right;">
                             {{-- {{  $data->appends(request()->query())->links('admin.layout.pagination') }} --}}
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