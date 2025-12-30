<form method="POST" action="/login">
    @csrf

    <label>Documento</label>
    <input type="text" name="documento" required>

    <label>Clave</label>
    <input type="password" name="password" required>

    <button type="submit">Ingresar</button>

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif
</form>
