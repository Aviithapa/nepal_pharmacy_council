<?php

use App\Models\Count;
use App\Models\Setting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

function generateRandomUsername($length = 8)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $username = '';

    for ($i = 0; $i < $length; $i++) {
        $randomChar = $characters[rand(0, strlen($characters) - 1)];
        $username .= $randomChar;
    }

    return $username;
}

if (!function_exists('getSiteSetting')) {
    /**
     * @param $name
     * @return null
     */
    function getSiteSetting($name)
    {
        if ($name === 'logo_image') {
            return App\Models\SiteSetting::getLogoImage($name);
        }

        return App\Models\SiteSetting::getValue($name);
    }
}



if (!function_exists('imageNotFound')) {
    /**
     * @param null $type
     * @return string
     */
    function imageNotFound($type = null)
    {
        switch ($type) {
            case 'small':
                return 'https://via.placeholder.com/350x150';
                break;
            default:
                return 'https://via.placeholder.com/350x150';
                //return asset('images/default.png');

        }
    }
}




if (!function_exists('getImage')) {
    /**
     * @param null $type
     * @return string
     */
    function getImage($path)
    {
        return  Storage::url('public/' . $path);
    }
}

if (!function_exists('uploadedAsset')) {
    /**
     * Generates an asset path for the uploads.
     * @param null $path
     * @param null $file_name
     * @return string
     */
    function uploadedAsset($path = null, $file_name = null)
    {
        $path  = Storage::url($path . '/' . $file_name);
        return $path;
    }
}


if (!function_exists('carbon')) {
    /**
     * @param null $type
     * @return string
     */
    function carbon(Carbon $date, $format = 'Y-m-d')
    {
        return $date->setTimezone('Asia/Kathmandu')->format($format);
    }
}



if (!function_exists('generateSlug')) {
    /**
     * Generates the alias equivalent for the provided string
     *
     * @param $string
     * @return mixed|string
     */
    function generateSlug($string)
    {
        $string = strtolower($string);
        $string = str_replace(" ", "-", $string);
        $string = str_replace(".", "-", $string);
        $string = str_replace("--", "-", $string);
        $string = str_replace("--", "-", $string);
        $string = str_replace("--", "-", $string);
        $string = str_replace("&", "and", $string);
        $string = str_replace("@", "", $string);
        $string = str_replace("(", "", $string);
        $string = str_replace(")", "", $string);
        $string = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $string);
        return $string;
    }
}

if (!function_exists('switchLanguage')) {

    function switchLanguage($lang)
    {
        app()->setLocale($lang);
        return redirect()->back();
    }
}


if (!function_exists('getSiteSettingKeys')) {
    /**
     * @return array
     */
    function getSiteSettingKeys(): array
    {
        return [
            'site_title' => 'text',
            'meta_keyword' => 'text',
            'meta_description' => 'textarea',
            'contact_details' => 'textarea',
            'social_fb' => 'text',
            'social_twitter' => 'text',
            'social_youtube' => 'text',
            'social_google' => 'text',
            'social_instagram' => 'text',
            'social_mail' => 'text',
            'social_phone' => 'text',
            'opening_time' => 'text',
            'footer' => 'text',
            'footer_info' => 'textarea',
            'copy_right' => 'text',
            'location' => 'text',
            'email' => 'text',
            'logo_image' => 'file',
        ];
    }
}

if (!function_exists('truncateText')) {
    /**
     * Truncate the given title to 20 words and append ellipsis if necessary.
     *
     * @param string $title
     * @param int $wordCount
     * @return string
     */
    function truncateText($title,  $charCount = 100)
    {
        if (strlen($title) > $charCount) {
            return substr($title, 0, $charCount) . '...';
        }
        return $title;
    }
}

if (!function_exists('getCountKeys')) {
    /**
     * @return array
     */
    function getCountKeys(): array
    {
        return [
            'total_number_of_pharmacist' => 'text',
            'total_number_of_pharmacy_assistant' => 'text',
        ];
    }
}

if (!function_exists('getCount')) {
    /**
     * @param $name
     * @return null
     */
    function getCount($name)
    {


        return Count::getValue($name);
    }
}

if (!function_exists('getBlinking')) {
    /**
     * @param $id
     * @return null
     */
    function getBlinking($id)
    {
        return  Setting::getValue($id);
    }
}