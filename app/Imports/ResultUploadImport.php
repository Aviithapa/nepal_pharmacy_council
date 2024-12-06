<?php

namespace App\Imports;

use App\Models\ResultUpload;
use Maatwebsite\Excel\Concerns\ToModel;

class ResultUploadImport implements ToModel
{
    protected $exam;
    protected $level;

    // Constructor to initialize exam and level
    public function __construct($exam, $level)
    {
        $this->exam = $exam;
        $this->level = $level;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ResultUpload([
            'roll_number' => $row[0], // Assuming roll_number is in the first column
            'status' => $row[1],
            'obtain_marks' => $row[2],
            'exam'         => $this->exam,
            'level'        => $this->level,
        ]);
    }
}
