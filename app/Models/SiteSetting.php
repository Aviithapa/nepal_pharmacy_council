<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        'display_name',
        'name',
        'value'
    ];

    public static function getValue($name)
    {
        $setting =  SiteSetting::where('name', $name)->first();
        if ($setting != null)
            return $setting->value;
        else
            return null;
    }
    public static function getLogoImage($name)
    {
        $setting =  SiteSetting::where('name', $name)->first();
        if ($setting != null)
            return Storage::url($setting->value);
        else
            return null;
    }

    public static function findByNameOrFail($name)
    {
        $setting = self::findByName($name);
        if (!$setting)
            return null;
        return $setting;
    }

    public static function findByName($name)
    {
        if (!Cache::has('setting.' . $name)) {
            $setting = self::where('name', $name)->first();
            Cache::forever('setting.' . $name, $setting);
            return $setting;
        } else {
            return Cache::get('setting.' . $name);
        }
    }
}
