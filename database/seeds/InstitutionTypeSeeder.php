<?php

use Illuminate\Database\Seeder;
use App\InstitutionType;
class InstitutionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InstitutionType::create([
            'name' => 'Educación Media y Básica'
        ]);

        InstitutionType::create([
            'name' => 'Educación Superior'
        ]);

        InstitutionType::create([
            'name' => 'Auspiciadora de Participantes'
        ]);

        InstitutionType::create([
            'name' => 'Secretaría'
        ]);

        InstitutionType::create([
            'name' => 'Comité Organizador'
        ]);

        InstitutionType::create([
            'name' => 'Invitada'
        ]);
    }
}
