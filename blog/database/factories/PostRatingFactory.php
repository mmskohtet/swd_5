<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostRating;
use Faker\Generator as Faker;

$factory->define(PostRating::class, function (Faker $faker) {
    return [
        "post_id"=>\App\Post::all()->random()->id,
        "user_id" =>\App\User::all()->random()->id,
        "amount"=>rand(0,5)
    ];
});
