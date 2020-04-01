<?php

use Illuminate\Database\Seeder;
use App\Representation;
class RepresentationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Representation', 20)->create();
    }
}
