<?php

namespace App\Http\Controllers;
use App\Models\TipoDocumento;
use App\Models\Genero;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Paciente;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::with([
            'tipoDocumento',
            'genero',
            'departamento',
            'municipio'
        ])->get();
        return view('index', compact('pacientes'));
    }

    public function create()
    {
        $tiposDocumento = TipoDocumento::all();
        $generos = Genero::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        return view('create', compact('tiposDocumento', 'generos', 'departamentos', 'municipios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipos_documento,id',
            'numero_documento' => 'required|unique:pacientes,numero_documento',
            'nombre1' => 'required|string|max:100',
            'apellido1' => 'required|string|max:100',
            'genero_id' => 'required|exists:generos,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'municipio_id' => 'required|exists:municipios,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $rutaFoto = null;
        if ($request->hasFile('foto')) {
            $rutaFoto = $request->file('foto')->store('pacientes', 'public');
        }

        Paciente::create([
            'tipo_documento_id' => $request->tipo_documento_id,
            'numero_documento' => $request->numero_documento,
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'genero_id' => $request->genero_id,
            'departamento_id' => $request->departamento_id,
            'municipio_id' => $request->municipio_id,
            'foto' => $rutaFoto
        ]);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente registrado correctamente');
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);

        $tiposDocumento = TipoDocumento::all();
        $generos = Genero::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        return view('edit', compact(
            'paciente',
            'tiposDocumento',
            'generos',
            'departamentos',
            'municipios'
        ));
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);

        $request->validate([
            'tipo_documento_id' => 'required|exists:tipos_documento,id',
            'numero_documento' => 'required|unique:pacientes,numero_documento,' . $paciente->id,
            'nombre1' => 'required|string|max:100',
            'apellido1' => 'required|string|max:100',
            'genero_id' => 'required|exists:generos,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'municipio_id' => 'required|exists:municipios,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Foto nueva
        if ($request->hasFile('foto')) {
            $rutaFoto = $request->file('foto')->store('pacientes', 'public');
            $paciente->foto = $rutaFoto;
        }

        $paciente->update([
            'tipo_documento_id' => $request->tipo_documento_id,
            'numero_documento' => $request->numero_documento,
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'genero_id' => $request->genero_id,
            'departamento_id' => $request->departamento_id,
            'municipio_id' => $request->municipio_id
        ]);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente actualizado correctamente');
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);

        if ($paciente->foto && Storage::disk('public')->exists($paciente->foto)) {
            Storage::disk('public')->delete($paciente->foto);
        }
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente eliminado correctamente');
    }

}
