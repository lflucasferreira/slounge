<?php

use Faker\Generator as Faker;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Client;

$factory->define(App\Models\Reward::class, function (Faker $faker) {
    return [
        'pontos' => $faker->numberBetween($min = 50, $max = 500),
        'validade' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'client_id' => function () {
            return factory(Client::class)->create()->id;
        },
        'appointment_id' => function () {
            return factory(Appointment::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
