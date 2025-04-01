@extends('admin.layout.app')

@section('content')
@include('admin.component.breadcrumb', ['title' => "Work Flow Management"])

<div class="row">
    @foreach($data as $task)
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $task->task->parent ? $task->task->parent->title : ''  }} {{ $task->task->title }}</h5>
                <h6 class="text-muted">Assigned to: {{ $task->user->username }}</h6>

                <p class="mb-2"><strong>Assigned Date:</strong> {{ \Carbon\Carbon::parse($task->assigned_at)->format('Y-m-d') }}</p>
                <p class="mb-2"><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}</p>
                <p class="mb-2"><strong>Completed Date:</strong> 
                    {{ $task->completed_at ? \Carbon\Carbon::parse($task->completed_at)->format('Y-m-d') : 'Not completed' }}
                </p>
                <p title="{{ $task->description }}">
                    <strong>Description:</strong> <br>{{ $task->description }}
                </p>

                <!-- Form to Submit the Data -->
                <form action="{{ route('task.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <p class="mb-2"><strong>Status:</strong> 
                        <select name="status" class="form-control">
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="working" {{ $task->status == 'working' ? 'selected' : '' }}>Working</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </p>

                    <p class="mb-2"><strong>Task Description:</strong> 
                        <textarea name="extra_description" class="form-control" rows="3">{{ $task->extra_description }}</textarea>
                    </p>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-warning btn-sm">
                            Update
                        </button>
                    </div>
                </form>
                <!-- End Form -->

            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
