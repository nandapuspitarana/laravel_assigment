<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(CategoriesTableSeeder::class);
        $this->call(MovieTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MovieUserTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
