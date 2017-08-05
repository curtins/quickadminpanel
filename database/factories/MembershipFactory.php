<?php

$factory->define(App\Membership::class, function (Faker\Generator $faker) {
    return [
        "gvr_number" => $faker->randomNumber(2),
    ];
});
