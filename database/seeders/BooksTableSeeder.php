<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'title' => 'Il Nome della Rosa',
                'description' => 'Un romanzo storico e giallo di Umberto Eco ambientato in un monastero del XIV secolo.',
                'pages' => 512,
                'author_id' => 1,
                'category_id' => 3,
                'cover_image' => 'cover/default.png',
            ],
            [
                'title' => 'Cent’anni di solitudine',
                'description' => 'Un romanzo che narra la storia della famiglia Buendía, scritta da Gabriel García Márquez.',
                'pages' => 417,
                'author_id' => 2,
                'category_id' => 1,
                'cover_image' => 'cover/default.png',
            ],
            [
                'title' => '1984',
                'description' => 'Un romanzo distopico di George Orwell che esplora i temi del totalitarismo e della sorveglianza.',
                'pages' => 328,
                'author_id' => 3,
                'category_id' => 3,
                'cover_image' => 'cover/default.png',
            ],
            [
                'title' => 'Kafka sulla spiaggia',
                'description' => 'Un romanzo surrealista di Haruki Murakami che intreccia le storie di due personaggi.',
                'pages' => 496,
                'author_id' => 4,
                'category_id' => 4,
                'cover_image' => 'cover/default.png',
            ],
            [
                'title' => 'Orgoglio e pregiudizio',
                'description' => 'Un romanzo che esplora le questioni dell\'amore e delle classi sociali, scritto da Jane Austen.',
                'pages' => 432,
                'author_id' => 5,
                'category_id' => 6,
                'cover_image' => 'cover/default.png',
            ],
        ];
        DB::table('books')->insert($books);
    }
}
