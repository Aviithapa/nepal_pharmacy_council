<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Count extends Model
{
    protected $table = 'counts';

    protected $fillable = [
        'display_name',
        'name',
        'value'
    ];

    public static function getValue($name)
    {
        $count =  Count::where('name', $name)->first();
        if ($count != null){
            return $count->value;
        }
        else{
            return null;
        }
    }


    public static function findByNameOrFail($name)
    {
        $count = self::findByName($name);
        if (!$count){
            return null;
        }
        return $count;
    }

    public static function findByName($name)
    {
        if (!Cache::has('count.' . $name)) {
            $count = self::where('name', $name)->first();
            Cache::forever('count.' . $name, $count);
            return $count;
        } else {
            return Cache::get('count.' . $name);
        }
    }
}
