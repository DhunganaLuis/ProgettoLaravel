<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'name' => 'Umberto Eco',
                'birthday' => '1932-01-05',
            ],
            [
                'name' => 'Gabriel García Márquez',
                'birthday' => '1927-03-06',
            ],
            [
                'name' => 'George Orwell',
                'birthday' => '1903-06-25',
            ],
            [
                'name' => 'Haruki Murakami',
                'birthday' => '1949-01-12',
            ],
            [
                'name' => 'Jane Austen',
                'birthday' => '1775-12-16',
            ],
        ];

        DB::table('authors')->insert($authors);
    }
}
