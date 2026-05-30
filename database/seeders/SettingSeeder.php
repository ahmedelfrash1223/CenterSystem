<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Center System',
                'site_title' => 'System Title',
                'logo_text' => 'Center',
                'hero_desc' => 'Modern platform powered by Laravel, Filament & Spatie Media Library.',
                'hero_gradient' => [
                    '#2563eb',
                    '#7c3aed',
                ],
            ]
        );
    }
}