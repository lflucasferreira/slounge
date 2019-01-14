<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Client::class, function (Faker $faker) {
    return [
        'nome' => $faker->firstName,
        'sobrenome' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'cidade' => $faker->city,
        'telefone_celular' => $faker->phoneNumber
    ];
});
