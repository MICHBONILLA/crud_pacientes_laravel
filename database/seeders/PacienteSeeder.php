<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        $pacientes = [
            [
                'tipo_documento_id' => 1,
                'numero_documento' => '1234567890',
                'nombre1' => 'Juan',
                'nombre2' => 'Carlos',
                'apellido1' => 'García',
                'apellido2' => 'López',
                'genero_id' => 1,
                'departamento_id' => 1, // Tolima
                'municipio_id' => 1, // Ibague
                'foto' => null,
            ],
            [
                'tipo_documento_id' => 1,
                'numero_documento' => '9876543210',
                'nombre1' => 'María',
                'nombre2' => 'Fernanda',
                'apellido1' => 'Rodríguez',
                'apellido2' => 'Martínez',
                'genero_id' => 2,
                'departamento_id' => 2, // Antioquia
                'municipio_id' => 3, // Medellín
                'foto' => null,
            ],
            [
                'tipo_documento_id' => 2,
                'numero_documento' => '1122334455',
                'nombre1' => 'Andrés',
                'nombre2' => null,
                'apellido1' => 'Pérez',
                'apellido2' => 'Sánchez',
                'genero_id' => 1,
                'departamento_id' => 3, // Quindío
                'municipio_id' => 5, // Armenia
                'foto' => null,
            ],
            [
                'tipo_documento_id' => 1,
                'numero_documento' => '5544332211',
                'nombre1' => 'Laura',
                'nombre2' => 'Sofía',
                'apellido1' => 'Hernández',
                'apellido2' => 'Gómez',
                'genero_id' => 2,
                'departamento_id' => 4, // Valle del Cauca
                'municipio_id' => 7, // Cali
                'foto' => null,
            ],
            [
                'tipo_documento_id' => 2,
                'numero_documento' => '7788990011',
                'nombre1' => 'Carlos',
                'nombre2' => 'Alberto',
                'apellido1' => 'Ramírez',
                'apellido2' => 'Torres',
                'genero_id' => 1,
                'departamento_id' => 5, // Cundinamarca
                'municipio_id' => 9, // Bogotá D.C.
                'foto' => null,
            ],
        ];

        foreach ($pacientes as $paciente) {
            Paciente::create($paciente);
        }
    }
}
