<?php

use Illuminate\Database\Seeder;
use App\Models\Wallet;

class WalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Wallet::class, 20)->create();
    }
}
