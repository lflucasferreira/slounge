<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,20) as $index) {
	        DB::table('clients')->insert([
                'nome' => $faker->firstName,
                'sobrenome' => $faker->lastName,
                'email' => $faker->email,
                'bairro' => $faker->city,
	        ]);
	}
    }
}
