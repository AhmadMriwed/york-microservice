<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $footerDetails = [
            [
                'section' => 'contact',
                'title' => 'EMAIL',
                'content' => 'info@yorkbritishacademy.uk',
                'type' => 'email',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'contact',
                'title' => 'OFFICE',
                'content' => '27 Old Gloucester Street, WC1N 3AX, London, United Kingdom',
                'type' => 'address',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'contact',
                'title' => 'PHONE',
                'content' => '+442087209292 / +447520619292',
                'type' => 'phone',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'contact',
                'title' => 'Canada - Ontario',
                'content' => '+13438000033',
                'type' => 'phone',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'contact',
                'title' => 'Netherlands - Amsterdam',
                'content' => '+3197005033557',
                'type' => 'phone',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'about',
                'title' => null,
                'content' => 'The York British Academy is currently pursuing an ambitious vision...',
                'type' => 'text',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'image',
                'title' => null,
                'content' => 'https://facebook.com',
                'type' => 'link',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'copy_right',
                'title' => null,
                'content' => 'copyright 2025.All Rights Reserved by York British Academy',
                'type' => 'copy_right',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('footer_details')->insert($footerDetails);
    }
}
