<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('es_ES');

        for ($i = 1; $i <= 1000; $i++) {

            Cliente::create([

                'nombre' => $faker->name(),

                'email' => $faker->unique()->safeEmail(),

                'telefono' => $faker->numerify('5#######'),

                'direccion' => $faker->address()

            ]);

        }
    }
}