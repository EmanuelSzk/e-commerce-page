<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Estilizado -->
    <link rel="stylesheet" href="../Styles/Login.css?v=1.6s">
</head>

<body>

    <form class="card-box" id="login-form">

        <h3>Iniciar Sesión</h3>

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
                <input type="password" class="form-control" placeholder="*********" id="password" required>
            </div>
        </div>

        <button type="submit" class="btn-main">Entrar</button>

    </form>

    <p class="text-center mt-3" style="font-size: 14px;">
        ¿no tienes cuenta? <a href="register.php">Registrate</a>
    </p>

    <script src="../Scripts/login.js"></script>

</body>

</html>