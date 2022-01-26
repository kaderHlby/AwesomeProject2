<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            "email" => "admin@test.com",
            "password" =>  bcrypt('adminpassword'),
            "role" => "admin"
        ]);
        \App\Models\User::factory()->create([
            "email" => "user@test.com",
            "password" =>  bcrypt('userpassword'),
            'role' => 'user'
        ]);
    }
}
