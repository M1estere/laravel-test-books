<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_genre')->insert([
            ['book_id' => 1, 'genre_id' => 1], // 1984 - Фантастика
            ['book_id' => 2, 'genre_id' => 2], // Джеймс Бонд - Детектив
            ['book_id' => 3, 'genre_id' => 1], // Гарри Поттер - Фантастика
            ['book_id' => 4, 'genre_id' => 1], // Собачье сердце - Фантастика
            ['book_id' => 5, 'genre_id' => 1], // Война и мир - Роман
        ]);
    }
}
