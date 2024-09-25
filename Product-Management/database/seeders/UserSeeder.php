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
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => hash::make('password'),
            ],
            [
                'name' => 'Seller user',
                'email' => 'seller@gmail.com',
                'role' => 'seller',
                'password' => hash::make('password'),
            ]
        ]);
    }
}
