<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'descricao' => $faker->words(3, true),
    ];
});
