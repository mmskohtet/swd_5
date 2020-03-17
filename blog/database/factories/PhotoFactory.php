<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        "post_id" => \App\Post::all()->random()->id,
        "location" => "img\default_photo.jpg",
        "user_id" => \App\User::all()->random()->id
    ];
});
