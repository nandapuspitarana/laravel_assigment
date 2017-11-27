<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['category' => 'action'],
            ['category' => 'drama'],
            ['category' => 'anime'],
            ['category' => 'scifi'],
            ['category' => 'horor'],
            ['category' => 'comedy']
        ];
        DB::table('categories')->insert($data);
    }
}
