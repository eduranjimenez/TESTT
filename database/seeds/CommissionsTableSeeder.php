<?php

use Illuminate\Database\Seeder;

class CommissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('commissions')->delete();
        
        \DB::table('commissions')->insert(array (
            0 => 
            array (
                'id' => 1,
            'name' => 'Primera Comisión de la Asamblea General: Desarme y Seguridad Internacional (AG1)',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-04 21:18:01',
            ),
            1 => 
            array (
                'id' => 2,
            'name' => 'Comisión de la Condición Jurídica y Social de la Mujer (CSW)',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-04 21:18:01',
            ),
            2 => 
            array (
                'id' => 3,
            'name' => 'Conferencia Regional sobre Población y Desarrollo de América Latina y el Caribe (CRPD)',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-04 21:18:01',
            ),
            3 => 
            array (
                'id' => 4,
            'name' => 'Inter-American Development Bank (IADB)',
                'language_id' => 2,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-04 21:18:01',
            ),
            4 => 
            array (
                'id' => 5,
            'name' => 'Corte Internacional de Justicia (CIJ)',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-04 21:18:01',
            ),
            5 => 
            array (
                'id' => 6,
            'name' => 'Consejo de Seguridad (CS)',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-04 21:18:01',
            ),
            6 => 
            array (
                'id' => 7,
            'name' => 'Security Council (SC)',
                'language_id' => 2,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-04 21:18:01',
            ),
            7 => 
            array (
                'id' => 8,
            'name' => 'Consejo Económico y Social (ECOSOC)',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-04 21:18:01',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Cuerpo de Prensa',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-05 20:59:14',
            ),
            9 => 
            array (
                'id' => 10,
            'name' => 'Conferencia de las Naciones Unidas sobre Comercio y Desarrollo (UNCTAD)',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-04 21:18:01',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Seminario de Asesores Docentes',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-04 21:18:01',
                'updated_at' => '2018-10-04 21:18:01',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Observadores',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-05 20:32:12',
                'updated_at' => '2018-10-05 20:32:12',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Secretaría',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-05 21:05:59',
                'updated_at' => '2018-10-05 21:05:59',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'CILA 2018',
                'language_id' => 1,
                'description' => NULL,
                'created_at' => '2018-10-06 14:14:47',
                'updated_at' => '2018-10-06 14:14:47',
            ),
        ));
        
        
    }
}