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
                'content' => json_encode(['en' => 'info@yorkbritishacademy.uk', 'ar' => 'info@yorkbritishacademy.uk']),
                'type' => 'email',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'contact',
                'title' => 'OFFICE',
                'content' => json_encode(['en' => '27 Old Gloucester Street, WC1N 3AX, London, United Kingdom', 'ar' => '27 شارع غلوستر القديم، لندن، المملكة المتحدة']),
                'type' => 'address',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'contact',
                'title' => 'PHONE',
                'content' => json_encode(['en' => '+442087209292 / +447520619292', 'ar' => '+442087209292 / +447520619292']),
                'type' => 'phone',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'contact',
                'title' => 'Canada - Ontario',
                'content' => json_encode(['en' =>'+13438000033','ar' =>'+13438000033']),
                'type' => 'phone',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'contact',
                'title' => 'Netherlands - Amsterdam',
                'content' => json_encode(['en' =>'+3197005033557','ar' =>'+3197005033557' ]),
                'type' => 'phone',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'about',
                'title' => null,
                'content' => json_encode(['en' => 'The York British Academy is currently pursuing an ambitious vision...', 'ar' => 'أكاديمية يورك البريطانية تتابع حاليًا رؤية طموحة...']),
                'type' => 'text',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'image',
                'title' => null,
                'content' => json_encode(['en' => 'https://facebook.com', 'ar' => 'https://facebook.com']),
                'type' => 'link',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'section' => 'copy_right',
                'title' => null,
                'content' => json_encode(['en' => 'copyright 2025. All Rights Reserved by York British Academy', 'ar' => 'حقوق النشر 2025. جميع الحقوق محفوظة لأكاديمية يورك البريطانية']),
                'type' => 'copy_right',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('footer_details')->insert($footerDetails);
    }
}
