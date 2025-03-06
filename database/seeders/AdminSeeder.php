<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin= User::create([
            'name' => 'Admin',
            'email' => 'admin@mailinator.com',
            'password' => bcrypt('Admin@Biomed'),
            'type' => 'Admin',
            
        ]);
    }
}
