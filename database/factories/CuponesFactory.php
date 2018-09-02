<?php

use Faker\Generator as Faker;

$factory->define(App\Cupones::class, function (Faker $faker) {
    return [
        'string' => $faker->md5,
        'points' => $faker->numberBetween(10, 10000)
    ];
});
