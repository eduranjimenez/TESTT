<?php

use Illuminate\Database\Seeder;
use App\Language;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'Español',
        ]);

        Language::create([
            'name' => 'Ingles',
        ]);

        Language::create([
            'name' => 'Frances',
        ]);
    }
}
