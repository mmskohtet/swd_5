<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence(15),
        "category_id" => \App\Category::all()->random()->id ,
        "description" => $faker->text(350) ,
        "user_id" => \App\User::all()->random()->id
    ];
});
