<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'description',  'parent_id'];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function parent()
    {
        return $this->belongsTo(Task::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Task::class, 'parent_id');
    }

    public function assignments()
    {
        return $this->hasMany(TaskAssignment::class);
    }

    /**
     * Get the latest task assignment.
     */
    public function latestAssignment()
    {
        return $this->hasOne(TaskAssignment::class)->latestOfMany();
    }
}
