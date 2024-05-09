<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us')->insert([
            // Admin
            [
                'header_title' => 'default',
                'details' => 'default',
                'side_image' => 'default',
                'background_image' => 'default',

            ],

        ]);
    }
}
