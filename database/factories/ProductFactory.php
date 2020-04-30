<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'price' => $faker->numberBetween(100, 1000),
        'Description' => $faker->paragraph(),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(5, 30)
    ];
});
