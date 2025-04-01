<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            ['title' => 'Certificate Generation Bachelor'],
            ['title' => 'Certificate Generation Diploma'],
            ['title' => 'Registration Book Entry'],
            ['title' => 'Update Bachelor'],
            ['title' => 'Update Diploma'],
            ['title' => 'Online Record Maintenance'],
            ['title' => 'Letter Official Reply'],
            ['title' => 'Copy of Original'],
            ['title' => 'Verification'],
            ['title' => 'Good Standing | NOC'],
        ];

        foreach ($tasks as $taskData) {
            $task = Task::create(['title' => $taskData['title']]);

            if (isset($taskData['children'])) {
                foreach ($taskData['children'] as $child) {
                    Task::create(['title' => $child['title'], 'parent_id' => $task->id]);
                }
            }
        }
    }
}
