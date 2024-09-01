<?php

namespace Database\Seeders;

use App\Models\Count;
use Illuminate\Database\Seeder;

class CountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settingKeys = getCountKeys();
        foreach ($settingKeys as $key
            => $type) {
            $displayName = ucwords(str_replace('_', ' ', $key));
            Count::create([
                'name' => $key,
                'display_name' => $displayName,
                'value' => '', // Set default value if needed
            ]);
        }
    }
}
