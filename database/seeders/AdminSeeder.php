<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample admin user 
        User::create([
            'name' => 'Admin',
            'email' => 'admin@emial.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // sample user
        User::create([
            'name' => 'Test',
            'email' => 'test@emial.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);
    }
}
