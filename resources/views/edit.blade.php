<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <h2>Editar Paciente</h2>

    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Tipo Documento -->
        <div class="mb-3">
            <label>Tipo Documento</label>
            <select name="tipo_documento_id" class="form-select">
                @foreach ($tiposDocumento as $tipo)
                    <option value="{{ $tipo->id }}"
                        {{ $paciente->tipo_documento_id == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Número Documento -->
        <div class="mb-3">
            <label>Número Documento</label>
            <input type="text" name="numero_documento" class="form-control"
                value="{{ $paciente->numero_documento }}">
        </div>

        <!-- Nombres y Apellidos -->
        <label>Primer Nombre</label>
        <input type="text" name="nombre1" class="form-control mb-2" value="{{ $paciente->nombre1 }}">
        <label>Segundo Nombre</label>
        <input type="text" name="nombre2" class="form-control mb-2" value="{{ $paciente->nombre2 }}">
        <label>Primer Apellido</label>
        <input type="text" name="apellido1" class="form-control mb-2" value="{{ $paciente->apellido1 }}">
        <label>Segundo Apellido</label>
        <input type="text" name="apellido2" class="form-control mb-2" value="{{ $paciente->apellido2 }}">

        <!-- Género -->
        <label>Género</label>
        <select name="genero_id" class="form-select mb-2">
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}" {{ $paciente->genero_id == $genero->id ? 'selected' : '' }}>
                    {{ $genero->nombre }}
                </option>
            @endforeach
        </select>

        <!-- Departamento -->
        <label>Departamento</label>
        <select name="departamento_id" id="departamento" class="form-select mb-2">
            @foreach ($departamentos as $dep)
                <option value="{{ $dep->id }}" {{ $paciente->departamento_id == $dep->id ? 'selected' : '' }}>
                    {{ $dep->nombre }}
                </option>
            @endforeach
        </select>

        <!-- Municipio -->
        <label>Municipio</label>
        <select name="municipio_id" id="municipio" class="form-select mb-2" data-municipio-actual="{{ $paciente->municipio_id }}">
            @foreach ($municipios as $mun)
                <option value="{{ $mun->id }}" {{ $paciente->municipio_id == $mun->id ? 'selected' : '' }}>
                    {{ $mun->nombre }}
                </option>
            @endforeach
        </select>

        <!-- Foto -->
        @if ($paciente->foto)
            <img src="{{ asset('storage/' . $paciente->foto) }}" width="120" class="mb-2">
        @endif

        <input type="file" name="foto" class="form-control mb-3">

        <button class="btn btn-success">Actualizar</button>
    </form>

    <script src="{{ asset('js/municipios.js') }}"></script>

</body>

</html>
