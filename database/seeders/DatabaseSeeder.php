<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'harijs',
            'email' => 'harijs@localhost',
            'usertype' => 'admin',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'name' => 'mario',
            'email' => 'mario@localhost',
            'usertype' => 'user',
            'password' => bcrypt('123'),
        ]);
    }
}
