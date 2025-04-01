@extends('admin.layout.app')

@section('content')

 <!-- start page title -->
 @include('admin.component.breadcrumb', ['title' => "Work Flow Management"])
 <!-- end page title -->
 
 <div class="row">
    @foreach($users as $user)
    <div class="col-xl-4 col-md-6">
        <!-- User Card -->
        <div class="card">
            <div class="card-body">
                <h5 class="header-title text-center mb-3">{{ $user->username }}</h5>
                
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h6 class="mb-2" style="font-size: 18px;">Assigned Tasks</h6>
                        <p style="font-size: 20px;">{{ $user->assigned_tasks_count }}</p>
                    </div>
                    <div class="p-2">
                        <h6 class="mb-2" style="font-size: 18px;">Completed Tasks</h6>
                        <p style="font-size: 20px;">{{ $user->completed_tasks_count }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h6 class="mb-2" style="font-size: 18px;">Overdue Tasks</h6>
                        <p style="font-size: 20px;">{{ $user->failed_tasks_count }}</p>
                    </div>
                </div>
                
                <!-- Action buttons (if needed) -->
                <div class="text-center">
                    <a href="{{ url('workflow/users/' . $user->id) }}" class="btn btn-info btn-sm mt-3">View User</a>
                </div>
            </div>
        </div>
        <!-- End User Card -->
    </div>
    @endforeach
</div>
<!-- End Body -->

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
                                         <th>Assigned To</th>
                                         <th>Status</th>
                                         <th>Task Description</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($data as $task)
                                    @if($task->latestAssignment)  <!-- Only show tasks that have an assignment -->
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $loop->iteration }}</td> <!-- Display the index number -->
                                        <td style="vertical-align: middle;">{{ $task->title }}</td> <!-- Task name -->
                                        <td style="vertical-align: middle;">{{ $task->latestAssignment->assigned_at }}</td> <!-- Display the assignment date -->
                                        <td style="vertical-align: middle;">
                                            <input name="due_date_{{ $task->id }}" class="form-control" type="date" 
                                            value="{{ $task->latestAssignment->due_date ? \Carbon\Carbon::parse($task->latestAssignment->due_date)->format('Y-m-d') : '' }}"/>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <select name="assigned_to_{{ $task->id }}" class="form-control">
                                                @foreach($users as $user) <!-- Assuming you have a list of users -->
                                                    <option value="{{ $user->id }}" 
                                                        {{ $task->latestAssignment->assigned_to == $user->id ? 'selected' : '' }}>
                                                        {{ $user->username }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            {{ $task->latestAssignment->status }}
                                            {{-- <select name="status_{{ $task->id }}" class="form-control">
                                                @php
                                                    $statuses = ['working', 'pending', 'completed', 'failed'];
                                                @endphp
                                                @foreach($statuses as $status)
                                                    <option value="{{ $status }}" {{ $task->latestAssignment->status === $status ? 'selected' : '' }}>
                                                        {{ ucfirst($status) }}
                                                    </option>
                                                @endforeach
                                            </select> --}}
                                        </td> <!-- Task status -->
                                        <td style="vertical-align: middle;">
                                            <textarea name="description_{{ $task->id }}" class="form-control" rows="3">{{ $task->latestAssignment->description }}</textarea>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <button class="btn btn-warning btn-sm update-assignment" data-task-id="{{ $task->id }}">Update</button>
                                            <a href="{{ url('workflow/tasks/completed/'. $task->latestAssignment->id) }}" class="btn btn-success btn-sm">Marked as Completed</a>
                                            <a href="{{ url('workflow/tasks/'. $task->id) }}" class="btn btn-info btn-sm">View</a>
                                        </td>
                                    </tr>
                                    @else
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>  <!-- Display the index number -->
                                            <td>{{ $task->title }}</td>  <!-- Task name -->
                                            <td colspan="6">No assignments available for this task.</td>
                                        </tr>
                                    @endif
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

@push('scripts')
<script>
    $(document).ready(function() {
        // Handle the update button click
        $('.update-assignment').on('click', function() {
            var taskId = $(this).data('task-id');
            var assignedTo = $('select[name="assigned_to_' + taskId + '"]').val();
            var description = $('textarea[name="description_' + taskId + '"]').val();
            var dueDate = $('input[name="due_date_' + taskId + '"]').val();
            var status = $('select[name="status_' + taskId + '"]').val();


    
            // Send AJAX request
            $.ajax({
                url: '/tasks/' + taskId + '/assignment/update',
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    assigned_to: assignedTo,
                    description: description,
                    due_date: dueDate,
                    status: status
                },
                success: function(response) {
                    // Handle success
                    alert('Task Assignment Updated Successfully!');
                    // Optionally, update the UI (e.g., display new assignment or status)
                },
                error: function(xhr, status, error) {
                    // Handle error
                    alert('An error occurred while updating the assignment.');
                }
            });
        });
    });
    </script>
    
@endpush