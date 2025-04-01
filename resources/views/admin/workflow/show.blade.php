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
                     <h5 class="header-title mb-0" style="text-transform: capitalize;">{{ $data->parent ? $data->parent->title : ''  }} {{ $data->title }}</h5>
                 </div>
                 <div id="yearly-sales-collapse" class="collapse show">
                     <!-- List -->
                     <div class="row">
                        @foreach($data->assignments as $task)
                            <div class="col-md-4 mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $task->task->parent ? $task->task->parent->title : ''  }} {{ $task->task->title }}</h5>
                                        <h6 class="text-muted">Assigned to: {{ $task->user->username }}</h6>
                    
                                        <p class="mb-2"><strong>Assigned Date:</strong> {{ $task->assigned_at }}</p>
                                        <p class="mb-2"><strong>Completed Date:</strong> {{ $task->completed_at ?? 'Not completed' }}</p>
                    
                                        <p class="mb-2"><strong>Status:</strong> 
                                            <span class="badge bg-info">{{ ucfirst($task->status) }}</span>
                                        </p>
                    
                                        <p title="{{ $task->description }}">
                                            <strong>Description:</strong> <br>{{ $task->description }}
                                        </p>
                    
                                        {{-- <div class="d-flex justify-content-between">
                                            <button class="btn btn-warning btn-sm update-assignment" data-task-id="{{ $task->id }}">
                                                Update
                                            </button>
                                            <a href="#" class="btn btn-info btn-sm">View</a>
                                            <button class="btn btn-danger btn-sm delete-task" data-task-id="{{ $task->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                Delete
                                            </button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                        
                     <!-- List -->
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Body -->
@endsection

 