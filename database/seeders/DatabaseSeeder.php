<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\Job::factory(20)->create(); // This will create 20 jobs, each with a NEW employer because of the factory definition.
        // OR better:
        // \App\Models\Employer::factory(10)->has(\App\Models\Job::factory(3))->create();
        // Since the instruction says "Seed 10-20 employers with jobs", I'll stick to simple or do the relational one.
        // Let's do the relational one for better data.

        \App\Models\Employer::factory(10)->has(\App\Models\Job::factory(3))->create();
    }
}
