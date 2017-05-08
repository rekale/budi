<?php

use App\Models\Agenda;
use App\Models\Destination;
use App\Models\Participant;

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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Destination::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->unique()->word,
        'abstract' => $faker->sentence,
        'body' => $faker->paragraph(50),
        'image' => $faker->imageUrl(640, 480, 'city'),
    ];
});

$factory->define(Agenda::class, function (Faker\Generator $faker) {
    return [
        'destination_id' => 1,
        'agenda_at' => $faker->date,
        'name' => $faker->word(3, true),
    ];
});

$factory->define(Participant::class, function (Faker\Generator $faker) {
    return [
        'destination_id' => 1,
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'phone' => $faker->phoneNumber,
        'position' => $faker->word,
    ];
});
