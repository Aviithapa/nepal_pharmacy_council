<?php

namespace App\Exports;

use App\Models\Task;
use App\Models\TaskAssignment;
use Maatwebsite\Excel\Concerns\FromCollection;

class WorkFlowExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Fetch all Task Assignments with related Task data
        return TaskAssignment::with('task')->get();
    }

    public function headings(): array
    {
        return ['Work', 'Assigned Date', 'Due Date', 'Status', 'Description'];
    }

    public function map($taskAssignment): array
    {
        return [
            $taskAssignment->id,
            $taskAssignment->task->title, // Task title
            $taskAssignment->assigned_at, // Assigned date
            $taskAssignment->due_date, // Due date
            ucfirst($taskAssignment->status), // Status
            $taskAssignment->description, // Task description
        ];
    }

}
