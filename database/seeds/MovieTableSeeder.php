<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $dataClass = DB::table('categories')->pluck('id')->toArray();

        foreach(range(1, 50) as $index) {
            DB::table('movies')->insert([
                'categories_id' => $faker->randomElement($dataClass),
                'title' => $faker->word,
                'year' => rand(2010, 2017),
                'description' => $faker->realText($maxNbChars = 180),
            ]);
        }
    }
}
