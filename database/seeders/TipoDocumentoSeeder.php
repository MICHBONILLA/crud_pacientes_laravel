<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Cedula'],
            ['nombre' => 'Tarjeta de identidad'],
        ];

        foreach ($tipos as $tipo) {
            TipoDocumento::create($tipo);
        }
    }
}
