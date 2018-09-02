<?php

use Faker\Generator as Faker;

$factory->define(App\History::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'product_id' => \App\Products::all()->random()
    ];
});
