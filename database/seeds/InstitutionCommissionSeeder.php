<?php

use Illuminate\Database\Seeder;
use App\Institution;
class InstitutionCommissionSeeder extends Seeder
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
            factory('App\InstitutionCommission', 3)->create([
                'commission_id' => rand(1,10),
                'institution_id' => $institution->id
            ]);
        }
    }
}
