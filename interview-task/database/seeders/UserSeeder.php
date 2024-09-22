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
        DB::table('users')->insert([
            [
                'name' => 'Admin user',
                'phone' => '01114567890',
                'password' => hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'hadeer ibraheem',
                'phone' => '01234567890',
                'password' => hash::make('password'),
                'role' => 'user',
            ]
        ]);
    }
}
