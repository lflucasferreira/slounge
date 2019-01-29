<?php

use App\Models\User;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(App\Models\Service::class, function (Faker $faker) {
    return [
        'sku' => $faker->randomNumber(5),
        'nome' => substr($faker->unique()->text(10), 0, -1),
        'descricao' => $faker->text(50),
        'preco' => $faker->randomNumber(2),
        'duracao' => $faker->time($format = 'H:i', $max = 'now'),
        'inicio' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'category_id' => function () {
            return factory(Category::class)->create()->id;
        }
    ];
});
