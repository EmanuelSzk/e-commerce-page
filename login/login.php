<?php
session_start();
?>
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
    <link rel="stylesheet" href="../Styles/Login.css?v=1.7s">
</head>

<body>

    <?php if (isset($_SESSION['user_name'])): ?>
        <div class="card-box">
            <h3>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h3>
            <p>You are already logged in.</p>
            <div class="centrar"></div>
            <a href="../pages/logout.php" class="btn-main" style="display:flex;justify-content: center">Log out</a>
        </div>
    <?php else: ?>
        <form class="card-box" id="login-form">

            <h3>Login</h3>

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
                    <input type="password" class="form-control" placeholder="*********" id="password" required>
                </div>
            </div>

            <button type="submit" class="btn-main">Sign in</button>

        </form>

        <p class="text-center mt-3" style="font-size: 14px;">
            Don't you have an account? <a href="register.php">Sign up</a>
        </p>

        <script src="../Scripts/login.js"></script>
    <?php endif; ?>

</body>

</html>