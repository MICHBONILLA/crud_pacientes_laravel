<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <h2 class="mb-4 text-center">Inicio de sesión</h2>

            <form method="POST" action="/login">
                @csrf

                <div class="mb-3">
                    <label>Documento: </label>
                    <input type="text" name="documento" class="form-control" pattern="[0-9]{6,10}"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="10" required>
                        <small class="text-muted">Debe ingresar entre 6 y 10 dígitos</small>
                </div>

                <div class="mb-3">
                    <label>Clave: </label>
                    <div style="position: relative;">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <span onclick="togglePassword()" id="toggleIcon"
                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                </div>

                @if (session('error'))
                    <p class="text-danger">{{ session('error') }}</p>
                @endif

            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                toggleIcon.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>
</body>
</html>
