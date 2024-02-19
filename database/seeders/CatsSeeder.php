<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cat;

class CatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cat::create([
            'nome' => 'Dog',
            'raca' => 'brasil',
            'idade' => '3',

        ]);
    }
}
