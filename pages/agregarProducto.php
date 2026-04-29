<?php

include '../php/conexion.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>E-commerce de Postres</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/Style.css?v=8.9ens"> <!-- el "?v=1.1" es para que al entrar por xampp a la página en php se actualice el style.css y no se use el style.css guardado en la caché de la página y así visualizar los cambios al recargar -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Poppins:wght@600;800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> <!-- Libreria de Font Awesome - Para introducir iconos por medio del comando "fa-"-->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Plugin AOS (Animate On Scroll) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>

    <header>
        <div class="background-over-header">
            <div class="over-header">
                <span>
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6">
                        <path fill-rule="evenodd"
                            d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    3764-877341</span>
                <span>
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6">
                        <path
                            d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                        <path
                            d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                    </svg>
                    Emaszk1@gmail.com</span>
            </div>
        </div>

        <div class="background-header-nav" id="home">
            <nav class="header-nav">

                <a href="../index.php">
                    <img src="../Sources/logo.png" class="logo" alt="Logo">
                </a>

                <ul class="menu">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#about-me">About</a></li>
                    <li><a href="#Contact">Contact</a></li>
                    <li><a href="login/login.php">Login</a></li>
                </ul>

                <a id='carrito-icon' href="pages/comprar.php">
                    <svg class='carrito-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z" />
                    </svg></a>

            </nav>
        </div>

    </header>

    <main>
        <div class="admin-container">

            <h2 class="admin-title">Gestión de Productos</h2>

            <div class="productos-table-container">
                <table class="productos-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM productos";
                        $resultados = $conection->query($sql);

                        if ($resultados->num_rows > 0) {
                            while ($row = $resultados->fetch_assoc()) {
                                echo "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nombre']}</td>
                                    <td>
                                        <img src='../{$row['imgURL']}' class='producto-img' alt='{$row['nombre']}'>
                                    </td>
                                    <td class='descripcion-cell'>{$row['descripcion']}</td>
                                    <td>{$row['categoria']}</td>
                                    <td>$ {$row['precio']}</td>
                                    <td>{$row['stock']}</td>
                                    <td class='acciones-cell'>
                                        <a href='../CRUD/editar.php?id={$row['id']}' class='btn-editar'>
                                            <i class='fas fa-edit'></i> Editar
                                        </a>
                                        <a href='../CRUD/borrar.php?id={$row['id']}' class='btn-borrar' onclick='return confirm(\"¿Estás seguro de eliminar este producto?\")'>
                                            <i class='fas fa-trash'></i> Borrar
                                        </a>
                                    </td>
                                </tr>
                                ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="agregar-producto-section">
                <h3 class="agregar-title">
                    <i class='fas fa-plus-circle'></i> Añadir Producto Nuevo
                </h3>

                <form class="agregar-form" action="../CRUD/agregar_producto.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre">
                                <i class='fas fa-tag'></i> Nombre
                            </label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ej: Torta de Chocolate" required>
                        </div>

                        <div class="form-group">
                            <label for="categoria">
                                <i class='fas fa-list'></i> Categoría
                            </label>
                            <input type="text" id="categoria" name="categoria" placeholder="Ej: Tortas" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="descripcion">
                                <i class='fas fa-align-left'></i> Descripción
                            </label>
                            <input type="text" id="descripcion" name="descripcion" placeholder="Descripción del producto" required>
                        </div>

                        <div class="form-group">
                            <label for="imagen">
                                <i class='fas fa-image'></i> Imagen
                            </label>
                            <input type="file" id="imagen" name="imagen" accept="image/*" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="precio">
                                <i class='fas fa-dollar-sign'></i> Precio
                            </label>
                            <input type="number" id="precio" name="precio" step="0.01" placeholder="0.00" required>
                        </div>

                        <div class="form-group">
                            <label for="stock">
                                <i class='fas fa-box'></i> Stock
                            </label>
                            <input type="number" id="stock" name="stock" placeholder="0" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-agregar">
                        <i class='fas fa-plus'></i> Añadir Producto
                    </button>
                </form>
            </div>
        </div>
    </main>

    <script src="../Scripts/CRUD.js"> </script>

</body>