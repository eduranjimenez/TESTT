<?php

use Illuminate\Database\Seeder;
use App\Institution;
class ParticipantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $institutions = Institution::all();
        foreach($institutions as $institution) {
            factory('App\Participant', 10)->create(['institution_id' => $institution->id]);
        }
    }
}
