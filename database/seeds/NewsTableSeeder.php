<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'title' => str_random(10),
            'content' => str_random(25) . ' ' . str_random(25),
            'user_id' => rand (1,8),
        ]);
    }
}
