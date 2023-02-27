<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //libreria
        $faker = Faker::create();
        // crear 10 libros aleatorios 
        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'isbn' => $faker->unique()->isbn13,
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'published_date' => $faker->date('Y-m-d', 'now'),
                'description' => $faker->paragraph(2),
                'price' => $faker->randomFloat(2, 5, 50),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
