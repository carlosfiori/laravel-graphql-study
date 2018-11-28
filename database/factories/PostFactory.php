<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'title' => $faker->title,
        'user_id' => \App\User::inRandomOrder()->first()->id,
    ];
});
