<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OperadorUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([

            'name' => 'Cristal',

            'email' => 'cristal@gmail.com',

            'password' => Hash::make('12345678'),

            'role' => 'operador'

        ]);
    }
}