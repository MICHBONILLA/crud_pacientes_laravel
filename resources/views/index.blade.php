<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Listado de Pacientes</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">
        Nuevo Paciente
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tipo Documento</th>
                <th>Documento</th>
                <th>Nombre Completo</th>
                <th>Género</th>
                <th>Departamento</th>
                <th>Municipio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>
                        {{ $paciente->tipoDocumento->nombre ?? '' }}
                    </td>
                    <td>{{ $paciente->numero_documento }}</td>
                    <td>
                        {{ $paciente->nombre1 }}
                        {{ $paciente->nombre2 }}
                        {{ $paciente->apellido1 }}
                        {{ $paciente->apellido2 }}
                    </td>
                    <td>{{ $paciente->genero->nombre ?? '' }}</td>
                    <td>{{ $paciente->departamento->nombre ?? '' }}</td>
                    <td>{{ $paciente->municipio->nombre ?? '' }}</td>
                    <td>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST"
                            style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar paciente?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        No hay pacientes registrados
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
