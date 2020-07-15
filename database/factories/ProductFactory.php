<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => rand(11, \App\Category::query()->count()),
        'user_id' => rand(1, \App\User::query()->count()),
        'name' => $faker->text(25),
        'description' => $faker->realText(),
        'quantity' => rand(50, 99),
        'price' => rand(200, 10000),
        'reorder_point' => rand(5, 20)
    ];
});
