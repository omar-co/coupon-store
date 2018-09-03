<?php

use Faker\Generator as Faker;

$factory->define(App\Products::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'description' => $faker->paragraph(1),
        'points' => $faker->numberBetween(1,10000)
    ];
});
