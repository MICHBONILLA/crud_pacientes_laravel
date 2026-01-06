<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{

    public function run(): void
    {
        Usuario::create([
            'documento' => '123456',
            'password' => Hash::make('1234567890'),
        ]);
    }
}
