<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //libreria
        $faker = Faker::create();

        $books = DB::table('books')->pluck('id');
        $categories = DB::table('categories')->pluck('id');

        foreach ($books as $book) {
            // Asignar entre 1 y 3 categorías aleatorias a cada libro
            $randomCategories = $faker->randomElements($categories, $faker->numberBetween(1, 3));

            foreach ($randomCategories as $category) {
                DB::table('book_category')->insert([
                    'book_id' => $book,
                    'category_id' => $category,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
