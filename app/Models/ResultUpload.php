<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultUpload extends Model
{
    use HasFactory;

    protected $table = 'result_uploads';
    protected $fillable = [
        'roll_number',
        'obtain_marks',
        'exam',
        'level',
        'status',
    ];
    
      /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'level' => 'string',
        'status' => 'string',
        'obtain_marks' => 'string',
        'exam' => 'string',
    ];

}

