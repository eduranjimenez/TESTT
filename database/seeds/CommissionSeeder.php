<?php

use Illuminate\Database\Seeder;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Commission', 10)->create();
    }
}
