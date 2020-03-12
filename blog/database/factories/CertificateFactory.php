<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Certificate;
use Faker\Generator as Faker;

$factory->define(Certificate::class, function (Faker $faker) {
    return [
        "photo" => "img/default_user.png",
        "name" => $faker->name,
        "nrc" => rand(1,14)."BaHaNa(N)".rand(100000,999999),
    ];
});
