<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Models\Municipio;
use App\Http\Controllers\Authcontroller;

// Rutas de autenticación (públicas)
Route::get('/login', [Authcontroller::class, 'mostrarLogin'])->name('login');
Route::post('/login', [Authcontroller::class, 'login']);

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    // Rutas de pacientes
    Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
    Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
    Route::post('/pacientes/store', [PacienteController::class, 'store'])->name('pacientes.store');
    Route::get('/pacientes/{id}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::put('/pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');
    Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

    // Ruta para obtener municipios por departamento (AJAX)
    Route::get('/municipios/{departamento_id}', function ($departamento_id) {
        return Municipio::where('departamento_id', $departamento_id)->get();
    });

    // Ruta de logout
    Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout');
});

