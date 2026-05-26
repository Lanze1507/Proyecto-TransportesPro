<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camion;

class CamionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $modelos = [

            'Volvo FH16',
            'Freightliner Cascadia',
            'Kenworth T680',
            'Scania R500',
            'Mercedes Actros',
            'International LT',
            'Peterbilt 579',
            'Mack Anthem'

        ];

        for ($i = 1; $i <= 200; $i++) {

            Camion::create([

                'placa' =>
                    strtoupper($faker->bothify('???###')),

                'modelo' =>
                    $faker->randomElement($modelos),

                'capacidad' =>
                    rand(5000, 30000)

            ]);

        }
    }
}