<?php

include 'php/conexion.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>E-commerce de Postres</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/Style.css?v=1.5s"> <!-- el "?v=1.1" es para que al entrar por xampp a la página en php se actualice el style.css y no se use el style.css guardado en la caché de la página y así visualizar los cambios al recargar -->
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
</head>

<!-- Alt + Shift + f (Arreglar indentación) -->
<!-- Ctrl + Shift + p (Abrir buscador, word wrapp) -->
<!-- Alt + left click (Escribir varias lineas a la vez) -->
<!-- Ctrl + k + c (Comentar código) -->
<!-- Pantalla al 75% en notebook -->
<!-- https://cssunitconverter.vercel.app/px-to-vw -->

<body>
    <div class="grid">

        <header>
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

            <nav class="header-nav">

                <a href="index.html">
                    <img src="Sources/logo.png" class="logo" alt="Logo">
                </a>

                <ul class="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#about-me">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <a id='carrito-icon'>
                    <svg class='carrito-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z" />
                    </svg></a>

            </nav>

        </header>

        <main>
            <div class="hero-section">
                <div class="info">
                    <h2 class="welcome2">¡Delicious cake for everyone!</h2>
                    <div class="fruti">
                        <div>
                            <p>¡You can pre-order it now!</p>
                            <button>Pre-order</button>
                        </div>
                        <div>
                            <img src="Sources/frutilla.png">
                        </div>
                    </div>
                </div>
                <div class="prueba">
                    <img src="Sources/hero-section-2.jpg">
                </div>
            </div>

            <!-- <h2 class="pre-tittle" id="shop">Most popular</h2>
            <h2 class="welcome">¡Our Products!</h2>

            <section class="carrito" id="carrito">
                <div id="agregar-carrito">
                    <div class="header-carrito">
                        <svg style='fill: white;' width="3rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z" />
                        </svg>
                        <h2>Tu Carrito</h2>
                    </div>

                    <div class="carrito-item">
                        <img src="Sources/cheesecake.jpg" width="80px" class="img-carrito">
                        <div class="carrito-item-detalles">
                            <h3 class="carrito-item-titulo">Cheesecake de frutilla</h3>
                            <div style="display: flex;">
                                <div class="selector-cantidad">
                                    <i class="fa-solid fa-minus restar-cantidad"></i>
                                    <input type="text" value="1" class="carrito-item-cantidad" disabled>
                                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                                </div>
                                <span class="carrito-item-precio">$12,00</span>
                            </div>
                        </div>
                        <span class="btn-eliminar">
                            <i class="fa-solid fa-trash boton-eliminar"></i>
                        </span>
                    </div>
                </div>

                <div class="carrito-total">
                    <div class="fila">
                        <strong>Tu total</strong>
                        <span class="carrito-precio-total">
                            $12,00
                        </span>
                    </div>
                    <button class="btn-pagar">Confirmar compra <i class="fa-solid fa-bag-shopping fa-lg"></i></button>
                    <div class="imagen-pago">
                        <img src="Sources/LogoPago.png" alt="">
                    </div>

                </div> 

            </section>  -->

            <!-- <section class="products">
                <?php

                // $sql = "SELECT nombre, precio, imgURL FROM products";
                // $resultado = $conection->query($sql);

                // if ($resultado->num_rows > 0) {
                //     while ($row = $resultado->fetch_assoc()) {
                //         echo '<div class="card">';
                //         echo '  <div class="img-container">';
                //         echo '      <img class="img-item" src="' . $row['imgURL'] . '" alt="' . $row['nombre'] . '">';
                //         echo '  </div>';
                //         echo '  <h3 class="nombre">' . $row['nombre'] . '</h3>';
                //         echo '  <p class="precio">$' . $row['precio'] . '</p>';
                //         echo '  <button class="boton-item">Agregar al carrito</button>';
                //         echo '</div>';
                //     }
                // } else {
                //     echo "<p>No hay productos disponibles</p>";
                // }
                ?>
            </section> 

            <!--About me-->
            <!-- <section class="about-me" id="about-me">
                <h2 class="h2">About me</h2>
                <article class="bio">
                    <div>
                        <h3>Lorem Ipsum</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos amet, omnis fuga
                            accusamus nihil soluta explicabo reprehenderit in dolorem accusantium dolorum eligendi ab
                            illum quibusdam et? Dolore explicabo tenetur expedita? Lorem ipsum dolor sit, amet
                            consectetur adipisicing elit. Tempore asperiores dolore mollitia adipisci harum impedit nam
                            magni! Numquam natus sint sapiente dolore magni officiis impedit quidem? Quis nam minus
                            sequi?</p>
                    </div>
                    <img src="Sources/Perfil.jpg">
                </article>
            </section> -->

            <!-- <section class="Blog" id="Blog">
                <div class="fondo">
                    <h2 style="color: white; text-align: center; padding-top: 60px; font-size: 50px;">Reseñas</h2>
                    <div class="comentario-fondo">
                        
                    </div>
                </div>
            </section> -->

            <!--Contact me-->
            <!-- <section class="Contact me" id="Contact">
                <h2 class="h2">Contact me</h2>
                <div class="centrar2">
                    <img src="Sources/contact-me.jpg" style="border-radius: 20px;">
                    <form class="contact-form">
                        <input type="text" placeholder="Your name">
                        <input type="email" placeholder="Your email">
                        <input type="text" placeholder="Subject">
                        <input type="text" placeholder="Message...">
                        <button>Send Message</button>
                    </form>
                </div>
            </section> -->

        </main>

        <footer>
            <p>&copy; 2025 Dulces Juliana | Todos los derechos reservados</p>
        </footer>
    </div>

    <script src="Scripts/script.js"></script>
</body>

</html>