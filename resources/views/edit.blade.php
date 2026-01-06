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
            <label class="form-label">Tipo de Documento<span class="text-danger">*</span></label>
            <select name="tipo_documento_id" class="form-select" required>
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
            <label class="form-label">Número Documento <span class="text-danger">*</span></label>
            <input type="text" name="numero_documento" class="form-control" pattern="[0-9]{6,10}"
                minlength="6" maxlength="10"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                value="{{ $paciente->numero_documento }}" required>
            <small class="text-muted">Debe ingresar entre 6 y 10 dígitos</small>
        </div>

        <!-- Nombres -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Primer Nombre<span class="text-danger">*</span></label>
                <input type="text" name="nombre1" class="form-control" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+"
                    maxlength="25" oninput="this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ ]/g, '')"
                    value="{{ $paciente->nombre1 }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Segundo Nombre</label>
                <input type="text" name="nombre2" class="form-control" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+"
                    maxlength="25" oninput="this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ ]/g, '')"
                    value="{{ $paciente->nombre2 }}">
            </div>
        </div>

        <!-- Apellidos -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Primer Apellido<span class="text-danger">*</span></label>
                <input type="text" name="apellido1" class="form-control" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+"
                    maxlength="25" oninput="this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ ]/g, '')"
                    value="{{ $paciente->apellido1 }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Segundo Apellido</label>
                <input type="text" name="apellido2" class="form-control" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+"
                    maxlength="25" oninput="this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ ]/g, '')"
                    value="{{ $paciente->apellido2 }}">
            </div>
        </div>

        <!-- Género -->
        <div class="mb-3">
            <label class="form-label">Género<span class="text-danger">*</span></label>
            <select name="genero_id" class="form-select" required>
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}" {{ $paciente->genero_id == $genero->id ? 'selected' : '' }}>
                        {{ $genero->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Departamento -->
        <div class="mb-3">
            <label class="form-label">Departamento<span class="text-danger">*</span></label>
            <select name="departamento_id" id="departamento" class="form-select" required>
                @foreach ($departamentos as $dep)
                    <option value="{{ $dep->id }}" {{ $paciente->departamento_id == $dep->id ? 'selected' : '' }}>
                        {{ $dep->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Municipio -->
        <div class="mb-3">
            <label class="form-label">Municipio<span class="text-danger">*</span></label>
            <select name="municipio_id" id="municipio" class="form-select" required data-municipio-actual="{{ $paciente->municipio_id }}">
                @foreach ($municipios as $mun)
                    <option value="{{ $mun->id }}" {{ $paciente->municipio_id == $mun->id ? 'selected' : '' }}>
                        {{ $mun->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Foto -->
        <div class="mb-3">
            <label class="form-label">Foto</label>
            @if ($paciente->foto)
                <div class="mb-2">
                    <img id="previsualizacion-actual" src="{{ asset('storage/' . $paciente->foto) }}" width="120" class="img-thumbnail">
                </div>
            @endif
            <div class="mb-2">
                <img id="previsualizacion-nueva" style="display:none;" width="120" class="img-thumbnail">
            </div>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/jpeg,image/jpg,image/png,image/gif"
                onchange="previsualizacionImage(event)">
        </div>

        <button class="btn btn-success">Editar</button>
    </form>

    <script src="{{ asset('js/edit.js') }}"></script>
    <script src="{{ asset('js/municipios.js') }}"></script>

</body>

</html>
