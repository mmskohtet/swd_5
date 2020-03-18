<?php

use Illuminate\Database\Seeder;

class PostRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\PostRating::class,50)->create();
    }
}
