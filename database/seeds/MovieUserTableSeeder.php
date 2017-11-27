<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MovieUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        // $dataClass = DB::table('users')->pluck('id')->toArray();
        // $dataClass = DB::table('movies')->pluck('id')->toArray();

        // foreach(range(1, 100) as $index) {
        //     DB::table('movie_user')->insert([
        //         'user_id' => $faker->randomElement($dataClass),
        //         'movie_id' => $faker->randomElement($dataClass)
        //     ]);
        // }
    }
}
