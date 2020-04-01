<?php

$factory->define(App\Representation::class, function (Faker\Generator $faker) {
    return [
        'spanish_name' => $faker->country,
        'english_name' => $faker->country,
        'french_name' => $faker->country,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'role' => $faker->numberBetween($min = 1, $max=2),
        'institution_id' => function () {
            return factory('App\Institution')->create()->id;
        },
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->dateTimeBetween(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Commission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->word,
        'language_id' => $faker->numberBetween($min = 1, $max=2)
    ];
});

$factory->define(App\Participant::class, function (Faker\Generator $faker) {
    return [
        'institution_id' => function () {
            return factory('App\Institution')->create()->id;
        },
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->safeEmail,
        'category' => 'Observador',
        'gender' => 'Masculino',
        'date_birth' =>$faker->dateTimeBetween,
         'academic_level' => 'Media',
        'address' => $faker->address,
        'cellphone' => $faker->phoneNumber,
        'phone' => $faker->phoneNumber,
        'blood_type' => 'A+',
        'emergency_contact_name' => $faker->name,
        'emergency_contact_cellphone' => $faker->phoneNumber,
        'emergency_contact_phone' => $faker->phoneNumber,
        'emergency_contact_email' => $faker->safeEmail,
        'emergency_contact_relation' => 'Padre'
    ];
});

$factory->define(App\Institution::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'type' => 'Educación Superior',
        'phone' => $faker->phoneNumber,
        'country' => 'Distrito Nacional (Santo Domingo)',
    ];
});

$factory->define(App\InstitutionCommission::class, function (Faker\Generator $faker) {
    return [
        'commission_id' => function () {
            return factory('App\Commission')->create()->id;
        },
        'institution_id' => function () {
            return factory('App\Institution')->create()->id;
        },
    ];
});


$factory->define(App\Language::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->languageCode,
    ];
});