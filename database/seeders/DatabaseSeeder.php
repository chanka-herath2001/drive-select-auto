<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'role_id' => 1,
            'password' => Hash::make('password')
        ]);

        foreach (UserRole::cases() as $case) {
            \App\Models\User::factory()->create([
                'name' => $case->name,
                'email' => $case->name . '@site.com',
                'role_id' => $case->value,
                'password' => Hash::make('password')
            ]);
        }

        \App\Models\User::factory(100)->create();
    }
}
