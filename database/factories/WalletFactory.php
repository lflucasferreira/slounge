<?php

use Faker\Generator as Faker;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Coupon;

$factory->define(App\Models\Wallet::class, function (Faker $faker) {
    return [
        'valor' => $faker->randomNumber(2),
        'desconto' => $faker->randomNumber(2),
        'pago' => $faker->randomNumber(2),
        'saldo' => $faker->randomNumber(2),
        'custos' => $faker->randomNumber(2),
        'data_pagamento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'appointment_id' => function () {
            return factory(Appointment::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'coupon_id' => function () {
            return factory(Coupon::class)->create()->id;
        }
    ];
});
