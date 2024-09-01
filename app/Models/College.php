<?php

namespace App\Models;

use App\Infrastructure\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    use HasFilter;

    protected $table = 'colleges';
    protected $fillable = ['name', 'university', 'contact_number', 'email', 'type'];

}

