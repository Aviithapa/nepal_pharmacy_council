<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NocUsers extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'noc_users';

    protected $fillable = [
        'email',
        'email_verified_at',
        'phone_number',
        'phone_number_verified_at',
        'password',
        'reference',
        'status',
        'token',
    ];

    protected $hidden = [
        'password',
        'token',
    ];

    protected $dates = [
        'email_verified_at',
        'phone_number_verified_at',
        'deleted_at',
    ];

}
