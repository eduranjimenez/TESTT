<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User')->create(['email' => 'admin@admin.com','institution_id' => 1, 'role' => 1]);
    }
}
