<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    
    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'username'          => $faker->unique()->userName,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Tweet::class, function (Faker\Generator $faker) {
    
    return [
        'body'    => $faker->paragraph(2),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});


