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
        $this->call(KtpSeeder::class);
        
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'role' => 'user'
        ]);
    }
}
