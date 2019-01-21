<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AppointmentsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
