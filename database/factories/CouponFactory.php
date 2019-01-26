<?php

use Faker\Generator as Faker;
use App\Models\Client;
use App\Models\User;

$factory->define(App\Models\Coupon::class, function (Faker $faker) {
    return [
        'descricao' => $faker->text(20),
        'valor' => $faker->randomNumber(2),
        'codigo' => $faker->text(10),
        'pontos' => $faker->numberBetween($min = 50, $max = 500),
        'validade' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'client_id' => function () {
            return factory(Client::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
