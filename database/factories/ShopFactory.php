<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'shop_introduce' => $faker->shop_introduce,
        'image_location' => $faker->image_location,
        'free_time' => $faker->free_time,
        'shop_location' => $faker->shop_location,
        'shop_location_prefecture' => $faker->shop_location_prefecture,
        'shop_type' => $faker->shop_type,
        
        'remember_token' => Str::random(10),
    ];
});
