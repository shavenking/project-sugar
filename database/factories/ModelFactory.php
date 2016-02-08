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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entities\Activity::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Entities\Freetime::class, function (Faker\Generator $faker) {
    $startAt = $faker->dateTimeBetween('- 10 days', 'now');
    $endAt = $faker->dateTimeBetween('now', '+ 5 days');

    return [
        'start_at' => $startAt,
        'end_at' => $endAt
    ];
});

$factory->define(App\Entities\Goal::class, function (Faker\Generator $faker) {
    $dueAt = $faker->dateTimeBetween('now', '+ 5 days');

    return [
        'title' => $faker->title,
        'due_at' => $dueAt
    ];
});

$factory->define(App\Entities\Task::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title
    ];
});
