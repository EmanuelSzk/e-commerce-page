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

        <h3>Create account</h3>

        <div class="stack" style="display: flex; gap: 10px;">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Name" id="first-name" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Last name</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Last name" id="last-name" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="User123@gmail.com" id="email" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Create a password" id="password" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Repeate your password" id="password-confirm" required>
            </div>
        </div>

        <button type="submit" class="btn-main">Sign up</button>

    </form>

    <p class="text-center mt-3" style="font-size: 14px;">
        you already have an account? <a href="login.php">Log in</a>
    </p>

    <script src="../Scripts/register.js"></script>
</body>

</html>