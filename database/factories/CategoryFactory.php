<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=> $faker->text(10),
        'description'=>$faker->realText(),
        'parent_id' => Category::all()->count() < 10 ? null : rand(1, 10),

    ];
});
