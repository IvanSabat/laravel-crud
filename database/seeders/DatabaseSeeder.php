<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ivan Sabat',
            'email' => 'admin@example.com',
        ]);

        $this->call([
            BookSeeder::class
        ]);
    }
}
