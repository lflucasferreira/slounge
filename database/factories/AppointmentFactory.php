<?php

use App\Models\Client;
use App\Models\Service;
use Faker\Generator as Faker;

$factory->define(App\Models\Appointment::class, function (Faker $faker) {
    return [
        'preco' => $faker->randomNumber(2),
        'data' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'inicio' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
        'fim' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
        'observacao' => $faker->text(50),
        'client_id' => function () {
            return factory(Client::class)->create()->id;
        },
        'service_id' => function () {
            return factory(Service::class)->create()->id;
        }
    ];
});
