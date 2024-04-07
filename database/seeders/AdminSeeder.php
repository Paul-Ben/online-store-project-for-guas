<?php

namespace Database\Seeders;

use App\Models\User;
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
            'user_id' =>  1,
            'name' => 'Admin',
            'email' => 'admin@emial.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'phone' => '09032458873',
            'address' =>  'Jl. Raya Malang No.123, Kecamatan Lowokwarmen.',
            'is_admin' => true,
        ]);

        // sample user
        User::create([
            'user_id' =>  2,
            'name' => 'Test',
            'email' => 'test@emial.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'phone' => '09032458873',
            'address' =>  'Jl. Raya Malang No.123, Kecamatan Lowokwarmen.',
            'is_admin' => false,
        ]);
    }
}
