<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('12345678');
        DB::table('users')->insert([
            [
                'id'=>1,
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' =>  $password ,
                'name' => 'Super Admin',

            ],
        ]);
    }
}
