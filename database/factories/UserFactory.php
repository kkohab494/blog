<?php

use Faker\Generator as Faker;

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

// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//         'remember_token' => str_random(10),
//     ];
// });

// $factory->define(App\Category::class, function (Faker $faker) {
//     return [
//         'name' => $faker->colorName,
//         'slug' => $faker->colorName,
//         'image' => "laravel-2018-12-25-5c22116ed7e03.jpg",
//     ];
// });
$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'slug' => $faker->colorName,
    ];
});
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->word,
        'slug' => $faker->userName,
        'image' => "laravel-2018-12-25-5c22116ed7e03.jpg",
        'body' => $faker->realText($maxNbChars = 2000, $indexSize = 5),
        'view_count' => $faker->numberBetween($min = 0, $max = 2147),
        'status' => $faker->numberBetween($min = 0, $max = 1),
        'is_approved' => $faker->numberBetween($min = 0, $max = 1),
    ];
});


