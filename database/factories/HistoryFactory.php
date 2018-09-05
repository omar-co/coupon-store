<?php

use Faker\Generator as Faker;

$factory->define(App\History::class, function (Faker $faker) {
    $user = \App\User::where('name', 'user')->first()->id;
    return [

        'user_id' => \App\User::where('name', 'user')->first()->id,
        'product_id' => \App\Products::all()->random()
    ];
});
