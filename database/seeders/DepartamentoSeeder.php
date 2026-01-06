<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{

    public function run(): void
    {
        $departamentos = [
            ['nombre' => 'Tolima'],
            ['nombre' => 'Antioquia'],
            ['nombre' => 'Quindío'],
            ['nombre' => 'Valle del Cauca'],
            ['nombre' => 'Cundinamarca'],
        ];

        foreach ($departamentos as $departamento) {
            Departamento::create($departamento);
        }
    }
}
