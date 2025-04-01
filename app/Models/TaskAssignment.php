<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignment extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'task_id',
        'assigned_to',
        'assigned_at',
        'completed_at',
        'status',
        'description',
        'extra_description',
        'due_date'
    ];

    /**
     * Get the task that is assigned.
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * Get the user (employee) who is assigned the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
