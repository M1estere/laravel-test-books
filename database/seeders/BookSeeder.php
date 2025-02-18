<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            ['title' => '1984', 'status' => 'published', 'cover_url' => 'https://example.com/1984.jpg'],
            ['title' => 'James Bond', 'status' => 'published', 'cover_url' => 'https://example.com/james_bond.jpg'],
            ['title' => 'Harry Potter', 'status' => 'published', 'cover_url' => 'https://example.com/harry_potter.jpg'],
            ['title' => 'Dog Heart', 'status' => 'published', 'cover_url' => 'https://example.com/dog_heart.jpg'],
            ['title' => 'War and Peace', 'status' => 'published', 'cover_url' => 'https://example.com/war_and_peace.jpg'],
        ]);
    }
}
