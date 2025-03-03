<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'role' => 'admin',
            'username' => 'admin',
            'password' => 'rahasia'
        ]);
        \App\Models\User::create([
            'role' => 'upz',
            'username' => 'upz',
            'password' => 'rahasia'
        ]);
    }
}
