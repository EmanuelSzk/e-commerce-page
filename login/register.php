<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Estilizado -->
    <link rel="stylesheet" href="../Styles/Login.css?v=1.2s">
</head>

<body>

    <form class="card-box" id="register-form">

        <h3>Crear Cuenta</h3>

        <div class="stack" style="display: flex; gap: 10px;">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nombre" id="first-name" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Apellido" id="last-name" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="tugatitosalvaje@gmail.com" id="email" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Crea una contraseña" id="password" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirmar contraseña</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Repite la contraseña" id="password-confirm" required>
            </div>
        </div>

        <button type="submit" class="btn-main">Registrarse</button>

    </form>

    <p class="text-center mt-3" style="font-size: 14px;">
        ¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a>
    </p>

    <script src="../Scripts/register.js"></script>
</body>

</html>