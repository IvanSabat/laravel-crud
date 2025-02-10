<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::query()->create([
            'name' => 'Муха-цокотуха',
            'description' => 'Книга про поезію для дітей',
            'author' => 'Корній Чуковський',
            'genre' => 'Fairy tales',
            'year_of_publication' => 2023,
        ]);
    }
}
