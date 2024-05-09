<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->insert([
            'favicon' => 'path_to_favicon',
            'title' => 'Your Site Title',
            'logo' => 'path_logo',
            'phone' => '01964870527',
            'email' => 'email@gmail.com',
            'address' => 'address',
            'footer_text' => 'Your Footer Text',
            'facebook' => 'your_facebook_url',
            'instagram' => 'your_instagram_url',
            'youtube' => 'your_youtube_url',
            'linkedin' => 'your_linkedin_url',
            'twitter' => 'your_twitter_url',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
