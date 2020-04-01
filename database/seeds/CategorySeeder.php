<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Delegado de Educación Básica'
        ]);

        Category::create([
            'name' => 'Delegado de Educación Media'
        ]);

        Category::create([
            'name' => 'Delegado de Educación Superior'
        ]);

        Category::create([
            'name' => 'Invitado Especial'
        ]);

        Category::create([
            'name' => 'Asesor Docente Responsable de Grupo (ADOR)'
        ]);

        Category::create([
            'name' => 'Asesor Docente Adicional (ADA)'
        ]);

        Category::create([
            'name' => 'Observador'
        ]);

        Category::create([
            'name' => 'Secretaría'
        ]);
    }
}
