<?php

namespace App\Console\Commands;

use App\Models\Exam;
use Illuminate\Console\Command;

class UpdateExamStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-exam-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update exam statuses based on dates';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $currentDate = now()->toDateString();

        $exam =
            Exam::where(function ($query) use ($currentDate) {
                $query->where('form_open_date', $currentDate)
                    ->orWhere('form_deu_date', $currentDate)
                    ->orWhere('form_double_dustur_date', $currentDate);
            })->first();

        if ($exam) {
            if ($exam->form_open_date == $currentDate) {
                $exam->status = 'open';
            } elseif ($exam->form_deu_date == $currentDate) {
                $exam->status = 'closed';
            } elseif ($exam->form_double_dustur_date == $currentDate) {
                $exam->status = 'double_duster';
            }
            $exam->save();
            echo "Exam status updated successfully.\n";
        } else {
            echo "No matching date found in the exam table.\n";
        }


        $this->info('Exam statuses updated successfully.');
    }
}
