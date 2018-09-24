<?php

$factory->define(App\StudentCommission::class, function (Faker\Generator $faker) {
    return [
        'student_id' => function () {
            return factory('App\Student')->create()->id;
        },
        'institutioncommission_id' => function () {
            return factory('App\InstitutionCommission')->create()->id;
        },
        'country_id' => function () {
            return factory('App\Country')->create()->id;
        },
    ];
});

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'role' => $faker->randomNumber(),
        'institution_id' => function () {
            return factory('App\Institution')->create()->id;
        },
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->dateTimeBetween(),
        'password' => bcrypt($faker->password),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Commission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->word,
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'institution_id' => function () {
            return factory('App\Institution')->create()->id;
        },
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->safeEmail,
    ];
});

$factory->define(App\Institution::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'type' => $faker->word,
        'phone' => $faker->phoneNumber,
        'city' => $faker->city,
    ];
});

$factory->define(App\InstitutionCommission::class, function (Faker\Generator $faker) {
    return [
        'commission_id' => function () {
            return factory('App\Commission')->create()->id;
        },
        'capacity' => $faker->randomNumber(),
        'countries' => $faker->text,
    ];
});
