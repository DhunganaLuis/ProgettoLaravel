<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Fiction'],
            ['name' => 'Non-Fiction'],
            ['name' => 'Science Fiction'],
            ['name' => 'Fantasy'],
            ['name' => 'Biography'],
            ['name' => 'History'],
            ['name' => 'Mystery'],
            ['name' => 'Romance'],
            ['name' => 'Horror'],
            ['name' => 'Self-Help'],
        ];
        DB::table('categories')->insert($categories);
    }
}
