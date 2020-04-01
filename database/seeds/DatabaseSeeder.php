<?php

use Illuminate\Database\Seeder;
use App\InstitutionCommission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguageSeeder::class);
        $this->call(CommissionsTableSeeder::class);
        $this->call(InstitutionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(InstitutionTypeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RepresentationsTableSeeder::class);
        $this->call(InstitutionCommissionsTableSeeder::class);
        $this->call(CommissionRepresentationsTableSeeder::class);
        $this->call(ParticipantsTableSeeder::class);
        $this->call(ParticipantRepresentationsTableSeeder::class);
        
    }
}
