<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingKeys extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settingKeys = getSiteSettingKeys();
        foreach ($settingKeys as $key
            => $type) {
            $displayName = ucwords(str_replace('_', ' ', $key));
            SiteSetting::create([
                'name' => $key,
                'display_name' => $displayName,
                'value' => '', // Set default value if needed
            ]);
        }
    }
}
