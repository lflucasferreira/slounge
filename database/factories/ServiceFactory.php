<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Service::class, function (Faker $faker) {
    return [
        'nome' => substr($faker->text(10), 0, -1),
        'descricao' => $faker->text(50),
        'preco' => $faker->randomNumber(2),
        'duracao' => $faker->time($format = 'H:i:s', $max = 'now'),
        'inicio' => $faker->dateTime($max = 'now', $timezone = null),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
