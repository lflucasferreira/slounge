<?php

use Faker\Generator as Faker;
use App\Models\Appointment;
use App\Models\User;

$factory->define(App\Models\Reward::class, function (Faker $faker) {
    return [
        'pontos' => $faker->numberBetween($min = 50, $max = 500),
        'validade' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'appointment_id' => function () {
            return factory(Appointment::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
