<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'is_blinking'];

    public static function getValue($id)
    {
        $count =  Setting::where('id', $id)->first();
        if ($count != null){
            return $count->is_blinking;
        }
        else{
            return null;
        }
    }
}
