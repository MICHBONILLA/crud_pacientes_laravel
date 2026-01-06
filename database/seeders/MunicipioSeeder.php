<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    public function run(): void
    {
        $municipios = [

            // Tolima (id: 1)
            ['nombre' => 'Ibague', 'departamento_id' => 1],
            ['nombre' => 'Libano', 'departamento_id' => 1],

            // Antioquia (id: 2)
            ['nombre' => 'Medellín', 'departamento_id' => 2],
            ['nombre' => 'Envigado', 'departamento_id' => 2],

            // Quindio (id: 3)
            ['nombre' => 'Armenia', 'departamento_id' => 3],
            ['nombre' => 'Pereira', 'departamento_id' => 3],

            // Valle del Cauca (id:4)
            ['nombre' => 'Cali', 'departamento_id' => 4],
            ['nombre' => 'Palmira', 'departamento_id' => 4],

            // Cundinamarca (id: 5)
            ['nombre' => 'Bogotá', 'departamento_id' => 5],
            ['nombre' => 'Soacha', 'departamento_id' => 5],

        ];

        foreach ($municipios as $municipio) {
            Municipio::create($municipio);
        }
    }
}

