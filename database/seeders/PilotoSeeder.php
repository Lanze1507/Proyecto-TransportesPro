<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Piloto;

class PilotoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('es_ES');

        for ($i = 1; $i <= 40; $i++) {

            Piloto::create([

                'nombre' => $faker->name(),

                'telefono' => $faker->numerify('5#######'),

                'licencia' =>
                    'LIC-' .
                    strtoupper($faker->bothify('??###')),

                'dpi' =>
                    $faker->numerify('#############'),

                'user_id' => null

            ]);

        }
    }
}