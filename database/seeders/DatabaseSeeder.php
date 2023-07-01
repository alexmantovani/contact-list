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
        \App\Models\User::factory()
            ->has(\App\Models\Contact::factory()->count(50))
            ->create([
                'name' => 'Mario Pompeo',
                'email' => 'a@a.a',
                'password' => Hash::make('12345678'),
            ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
