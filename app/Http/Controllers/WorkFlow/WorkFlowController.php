<?php

namespace App\Http\Controllers\WorkFlow;

use App\Exports\WorkFlowExport;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskAssignment;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WorkFlowController extends Controller
{
    public function index(Request $request){
        $data = Task::with(['children', 'latestAssignment'])->get();
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })
        ->withCount([
            'taskAssignments as assigned_tasks_count', 
            'taskAssignments as completed_tasks_count' => function ($query) {
                $query->where('status', 'completed'); // assuming 'completed' is the status value for completed tasks
            },
            'taskAssignments as failed_tasks_count' => function ($query) {
                $query->where('status', 'failed'); // assuming 'failed' is the status value for failed tasks
            },
        ])
        ->get();
        // dd($users);
        return view('admin.workflow.index', compact('data','users'));
    }

    public function updateTaskAssignment(Request $request, $taskId)
    {
        // Validate the incoming request
        $request->validate([
            'assigned_to' => 'required|exists:users,id',
            'description' => 'nullable|string',
            'due_date'    => 'required|date',
            'status'      => 'nullable|string'
        ]);

        // Find the task
        $task = Task::findOrFail($taskId);

        // Get the latest task assignment
        $latestAssignment = TaskAssignment::where('task_id', $task->id)
                                ->latest()
                                ->first();

        // Check if assigned_to has changed
        if (!$latestAssignment || $latestAssignment->assigned_to != $request->assigned_to) {
            // Create new task assignment
            $taskAssignment = new TaskAssignment();
            $taskAssignment->task_id = $task->id;
            $taskAssignment->assigned_to = $request->assigned_to;
            $taskAssignment->assigned_at = now();
            $taskAssignment->due_date = $request->due_date;
            $taskAssignment->status = $request->input('status', 'Pending'); // default status
            $taskAssignment->description = $request->input('description', '');
            $taskAssignment->save();

            return response()->json(['success' => true, 'message' => 'Task reassigned successfully.']);
        } else {
            // Update existing assignment
            $latestAssignment->due_date = $request->due_date;
            $latestAssignment->status = $request->input('status', $latestAssignment->status);
            $latestAssignment->description = $request->input('description', $latestAssignment->description);
            $latestAssignment->save();

            return response()->json(['success' => true, 'message' => 'Task assignment updated successfully.']);
        }
    }

    public function show($id){
        $data = Task::with(['assignments'])->findOrFail($id);
        $users = User::all();
        // dd($data->assignments);
        return view('admin.workflow.show', compact('data','users'));
    }

    public function user($id){
        $data = TaskAssignment::with(['user', 'task'])->where('assigned_to', $id)->get();
        return view('admin.workflow.user', compact('data'));
    }

    public function exportWorkFlow()
    {
        return Excel::download(new WorkFlowExport, 'workflow_data.xlsx');
    }

    public function completed($id)
    {
        TaskAssignment::where('id', $id)->update([
            'status' => 'completed',
            'completed_at' => now(),
        ]);
    
        return redirect()->back()->with('success', 'Task marked as completed.');
    }

    public function update(Request $request, $id)
    {
        $task = TaskAssignment::findOrFail($id);

        $task->update([
            'status' => $request->status,
            'extra_description' => $request->extra_description,
        ]);

        return redirect()->back()->with('success', 'Task updated successfully.');
    }
}
