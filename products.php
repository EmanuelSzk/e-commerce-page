<?php

include 'php/conexion.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>E-commerce de Postres</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/Style.css?v=2.6s"> <!-- el "?v=1.1" es para que al entrar por xampp a la página en php se actualice el style.css y no se use el style.css guardado en la caché de la página y así visualizar los cambios al recargar -->
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

<!-- Alt + Shift + f (Arreglar indentación) -->
<!-- Ctrl + Shift + p (Abrir buscador, word wrapp) -->
<!-- Alt + left click (Escribir varias lineas a la vez) -->
<!-- Ctrl + k + c (Comentar código) -->
<!-- Pantalla al 75% en notebook -->
<!-- https://cssunitconverter.vercel.app/px-to-vw -->

<body>

    <?php
    session_start();
    ?>

    <div class="grid">

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

                    <a href="index.php">
                        <img src="Sources/logo.png" class="logo" alt="Logo">
                    </a>

                    <ul class="menu">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#shop">Shop</a></li>
                        <li><a href="#about-me">About</a></li>
                        <li><a href="#Contact">Contact</a></li>
                        <li><a href="login/login.php">Login</a></li>
                    </ul>

                    <a id='carrito-icon'>
                        <svg class='carrito-icon' id="botonVerCarrito" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z" />
                        </svg></a>

                </nav>
            </div>

        </header>


        <main>
            <div class="background-hero-section">

                <div class="hero-section">

                    <div class="info">

                        <?php if (isset($_SESSION['user_name'])): ?>
                            <h2 class="user-greeting" style="display: flex; align-items:center; gap: 5px; max-width: 110px">
                                <img src="Sources\corazon user.png" width="20px">
                                Hi, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!
                            </h2>
                        <?php else: ?>
                            <h2 class="user-greeting" style="display: flex; align-items:center; gap: 5px; max-width: 120px">
                                <img src="Sources\corazon user.png" width="20px">
                                Hi, Sign In!
                            </h2>
                        <?php endif; ?>

                        <div style="display: flex;">
                            <h2 class="welcome2">Delicious <b>cakes</b> made for <b> you</b>
                                <img src="Sources\Pink heart.png" width="70px" height="auto">
                            </h2>
                        </div>
                        <img src="Sources\Subrayado.png" width="270px" style="margin-bottom: 10px;">
                        <div class="fruti">

                            <div>
                                <p class="Desc">Artisan desserts made with love, high-quality <br> ingredientes, and perfect for every special moment.</p>
                                <div style="display:flex; gap:20px;">
                                    <button class="button-hero" onclick="window.location.href='index.php'" style="display:flex; gap: 10px; align-items: center;">
                                        Main Page
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M4 12H20M4 12L8 8M4 12L8 16" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    <button class="button-hero" onclick="window.location.href='#recomendation'">Recomendations</button>
                                </div>

                                <div class="options" style="display: flex; margin-top:40px; gap: 30px;">

                                    <div class="item-menu">
                                        <svg fill="#ff65d9" height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 463.001 463.001" xml:space="preserve" stroke="#ff65d9">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path d="M388.909,272h-0.331c7.057-9.252,13.254-21.671,13.009-36.607c-0.331-20.188-12.399-39.939-35.868-58.705 c2.934-8.811,3.557-17.498,1.835-26.009c-6.824-33.717-43.412-47.183-76.987-54.669c1.193-3.964,1.842-8.162,1.842-12.51 c0-16.454-9.185-30.802-22.695-38.192C283.155,18.017,301.077,15,308.286,15c9.185,0,14.96,1.966,18.301,3.739 c2.599,1.379,5.749,1.157,8.091-0.623c4.361-3.315,3.799-10.016-1.037-12.589C328.261,2.663,320.085,0,308.286,0 c-14.379,0-27.865,6.616-39,19.132c-3.749,4.214-9.167,11.317-13.899,21.353C253.273,40.168,251.11,40,248.909,40 c-16.313,0-30.55,9.031-37.994,22.352c-2.725-3.011-5.735-6.95-7.856-11.408c-0.892-1.875-2.522-3.296-4.501-3.925 c-1.979-0.628-4.131-0.409-5.941,0.607c-22.422,12.578-38.793,29.335-48.66,49.806c-8.438,17.507-9.998,33.636-10.027,43.015 c-0.634,0.246-1.262,0.492-1.849,0.744c-19.413,8.32-30.607,24.159-32.375,45.804c-0.706,8.652,0.271,16.547,1.314,21.965 c-15.449,5.536-26.193,16.119-30.067,29.988c-3.058,10.948-1.48,22.826,3.939,33.053h-5.984c-2.281,0-4.438,1.038-5.862,2.821 c-1.423,1.783-1.957,4.116-1.452,6.341l37.169,163.546c2.448,10.77,11.871,18.292,22.916,18.292h214.457 c11.044,0,20.468-7.522,22.916-18.292l37.169-163.546c0.505-2.225-0.029-4.558-1.452-6.341 C393.348,273.038,391.191,272,388.909,272z M248.909,55c15.715,0,28.5,12.785,28.5,28.5c0,15.715-12.785,28.5-28.5,28.5 c-15.715,0-28.5-12.785-28.5-28.5C220.409,67.785,233.195,55,248.909,55z M121.681,448c-3.995,0-7.403-2.721-8.289-6.616 L78.305,287h24.274l26.813,157.306c0.218,1.28,0.525,2.51,0.898,3.694H121.681z M148.488,448c-1.362,0-3.617-2.16-4.308-6.214 L117.796,287h24.417l17.829,156.893c0.163,1.43,0.401,2.802,0.708,4.107H148.488z M176.651,448 c-0.522-0.849-1.352-2.701-1.704-5.801L157.31,287h24.513l8.891,156.471c0.091,1.608,0.231,3.117,0.417,4.529H176.651z M221.409,448h-15.078c-0.257-1.285-0.51-3.059-0.642-5.379L196.847,287h24.039c0.009,0,0.018,0.002,0.027,0.002 c0.013,0,0.025-0.002,0.038-0.002h0.458V448z M252.129,442.621c-0.132,2.32-0.385,4.095-0.642,5.379h-15.078V287h24.562 L252.129,442.621z M281.168,448h-14.481c0.187-1.411,0.326-2.92,0.417-4.529L275.995,287h24.514l-17.637,155.199 C282.52,445.299,281.691,447.151,281.168,448z M309.331,448h-12.263c0.308-1.305,0.546-2.677,0.709-4.107L315.605,287h24.417 l-26.384,154.786C312.948,445.84,310.693,448,309.331,448z M344.426,441.384c-0.885,3.896-4.294,6.616-8.289,6.616h-8.61 c0.373-1.184,0.68-2.414,0.898-3.694L355.239,287h15.896c0.006,0,0.012,0.001,0.019,0.001c0.008,0,0.015-0.001,0.023-0.001h8.337 L344.426,441.384z M368.307,272h-115c16.863-8.811,38.706-21.158,59.289-35.598c3.391-2.379,4.211-7.056,1.832-10.447 c-2.379-3.391-7.056-4.211-10.447-1.832c-35.726,25.065-76.633,44.199-84.689,47.877H93.137 c-7.453-8.047-10.489-19.156-7.735-29.018c3.118-11.165,13.188-18.983,28.355-22.017c14.246-2.849,51.915-10.78,93.934-22.862 c3.98-1.145,6.28-5.3,5.135-9.281c-1.145-3.98-5.296-6.282-9.281-5.135c-37.454,10.77-71.4,18.197-87.991,21.608 c-2.293-12.345-3.808-39.07,22.437-50.318c10.129-4.341,30.656-8.079,52.388-12.036l7.26-1.325 c4.074-0.748,6.771-4.656,6.023-8.73c-0.748-4.075-4.656-6.771-8.73-6.023l-7.24,1.322c-14.033,2.555-27.579,5.023-38.632,7.726 c1.02-17.477,8.423-48.343,44.532-71.394c2.71,4.048,5.623,7.382,7.938,9.769c1.616,1.666,2.995,2.971,4.2,4.019 c-0.204,1.706-0.321,3.437-0.321,5.197c0,23.986,19.514,43.5,43.5,43.5c14.095,0,26.641-6.744,34.595-17.169 c14.792,3.146,27.032,6.785,36.917,11.036c1.875,2.837,1.618,4.876,1.099,6.505c-1.863,5.837-13.482,21.888-80.971,44.791 c-3.922,1.331-6.023,5.59-4.692,9.512c1.06,3.124,3.976,5.092,7.102,5.092c0.799,0,1.612-0.129,2.411-0.4 c24.19-8.209,43.814-16.407,58.327-24.366c18.367-10.073,28.872-19.909,32.114-30.069c0.239-0.749,0.43-1.497,0.59-2.246 c9.221,6.697,14.555,14.593,16.453,23.969c2.759,13.63-3.437,28.679-18.414,44.729c-2.826,3.028-2.662,7.774,0.367,10.6 c1.446,1.349,3.282,2.017,5.115,2.017c2.006,0,4.008-0.8,5.485-2.383c5.602-6.003,10.184-11.979,13.753-17.912 c17.96,15.076,27.19,30.181,27.431,44.933C386.858,252.009,376.05,264.893,368.307,272z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <p>Made to order</p>
                                    </div>
                                    <div class="item-menu">
                                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#ff65d9" stroke="#ff65d9">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <path fill="#ff65d9" d="M34.929,7.629c-0.205-0.513-0.787-0.763-1.297-0.557c-0.513,0.203-0.764,0.784-0.562,1.297 c0.019,0.047,1.84,4.804-0.032,11.356c0,0-0.001,0.007-0.001,0.011c-1.215,1.103-2.459,2.271-3.744,3.557 c-1.357,1.357-2.591,2.671-3.745,3.948c0.998-9.183-0.498-16.128-0.571-16.458c-0.12-0.539-0.654-0.876-1.193-0.76 c-0.539,0.12-0.879,0.654-0.76,1.193c0.019,0.086,1.823,8.469,0.13,18.763c-2.26,2.695-4.05,5.14-5.464,7.261 c0.709-7.9-0.644-14.145-0.713-14.457c-0.12-0.539-0.65-0.886-1.193-0.759c-0.539,0.119-0.879,0.653-0.76,1.192 c0.02,0.087,1.885,8.75,0.048,18.297c-1.383,2.488-1.953,3.988-2.01,4.141c-0.19,0.518,0.074,1.092,0.592,1.283 C13.768,46.979,13.885,47,14,47c0.406,0,0.788-0.25,0.938-0.653c0.013-0.034,0.5-1.302,1.684-3.468 c10.438-2.726,19.995,0.051,20.092,0.079C36.809,42.986,36.905,43,37,43c0.431,0,0.828-0.28,0.958-0.714 c0.158-0.528-0.142-1.085-0.671-1.244C36.897,40.924,28.2,38.391,18,40.506c1.416-2.316,3.406-5.218,6.108-8.52 c0.052-0.006,0.104-0.008,0.154-0.021c10.595-2.889,21.367-0.029,21.475,0C45.825,31.988,45.913,32,46,32 c0.44,0,0.844-0.292,0.965-0.737c0.145-0.533-0.169-1.082-0.702-1.228c-0.425-0.116-9.801-2.598-20.012-0.576 c1.341-1.524,2.814-3.109,4.456-4.752c1.41-1.41,2.777-2.693,4.103-3.88c6.452-1.649,12.852,0.116,12.916,0.135 C47.817,20.987,47.909,21,48,21c0.436,0,0.836-0.287,0.961-0.727c0.151-0.53-0.155-1.083-0.687-1.235 c-0.239-0.067-4.9-1.367-10.473-0.779c8.531-7.021,14.472-9.294,14.545-9.321c0.518-0.191,0.782-0.767,0.591-1.284 c-0.191-0.519-0.766-0.779-1.283-0.592c-0.326,0.12-6.805,2.58-16.068,10.431C36.527,11.735,35.004,7.816,34.929,7.629z"></path>
                                                    <path fill="#ff65d9" d="M60.893,1.549c-0.136-0.269-0.386-0.462-0.679-0.525c-2.98-0.652-6.97-0.982-11.856-0.982 c-4.922,0-10.564,0.353-15.481,0.967C17.641,2.912,7,13.601,7,27v18.678L3.103,60.225c-0.428,1.598,0.523,3.244,2.122,3.674 c1.598,0.426,3.245-0.525,3.673-2.121L11.25,53H31c14.337,0,26-11.663,26-26c0-6.663,0-15.788,3.914-24.594 C61.036,2.132,61.028,1.816,60.893,1.549z M6.966,61.26c-0.143,0.532-0.691,0.849-1.224,0.707 c-0.534-0.145-0.851-0.691-0.708-1.225l2.552-9.686c0.405,0.672,0.998,1.212,1.712,1.55L6.966,61.26z M55,27 c0,13.233-10.767,24-24,24H11c-1.104,0-2-0.896-2-2v-1V27C9,14.641,18.92,4.769,33.124,2.992 c4.839-0.604,10.391-0.951,15.233-0.951c4.048,0,7.553,0.242,10.238,0.705C55,11.565,55,20.443,55,27z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        <p>Fresh ingredients</p>
                                    </div>
                                    <div class="item-menu">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ff65d9">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z" stroke="#ff65d9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        <p>Made with love</p>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="prueba">
                        <img src="Sources\helado-hero-section.jpg">
                    </div>

                </div>

            </div>

            <section class="carrito" id="carrito">
                <div class="header-carrito">
                    <svg style='fill: white;' width="3rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z" />
                    </svg>
                    <h2>Your cart</h2>
                </div>
                <div id="agregar-carrito">
                </div>

                <div class="carrito-total">
                    <div class="fila">
                        <strong>Order Total</strong>
                        <span class="carrito-precio-total">
                            $0,00
                        </span>
                    </div>
                    <button class="btn-pagar" onclick="window.location.href='pages/comprar.php'">Confirm purchase <i class="fa-solid fa-bag-shopping fa-lg"></i></button>
                    <div class="imagen-pago">
                        <img src="Sources/LogoPago.png" alt="">
                    </div>
                </div>
            </section>

            <h2 class="pre-tittle" id="shop">Welcome!</h2>
            <h2 class="welcome">¡Our Products!</h2>

            <section class="products" data-aos="fade-up">
                <?php

                $sql = "SELECT id, nombre, precio, imgURL, categoria FROM productos";
                $resultado = $conection->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo '<div class="card">';
                        echo '  <div class="img-container">';
                        echo '      <img class="img-item" src="' . $row['imgURL'] . '" alt="' . $row['nombre'] . '">';
                        echo '  </div>';
                        echo '  <h3 class="nombre">' . $row['nombre'] . '</h3>';
                        echo '  <p class="precio">$' . $row['precio'] . '</p>';
                        if (isset($_SESSION['user_name'])) {
                            echo '  <button class="boton-item" data-id="' . $row['id'] . '">Add to your cart</button>';
                        } else {
                            echo '  <a href="login/login.php"> <button class="boton-item2">Login to shop</button></a>';
                        }
                        echo '</div>';
                    }
                } else {
                    echo "<p>No hay productos disponibles</p>";
                }
                ?>

            </section>

            <h2 class="pre-tittle" id="shop">taste them!</h2>
            <h2 class="welcome">¡Latest!</h2>

            <section class="products" data-aos="fade-up">
                <?php

                $sql = "SELECT id, nombre, precio, imgURL, categoria FROM productos";
                $resultado = $conection->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        if ($row['categoria'] == "Galletas") {
                            echo '<div class="card">';
                            echo '  <div class="img-container">';
                            echo '      <img class="img-item" src="' . $row['imgURL'] . '" alt="' . $row['nombre'] . '">';
                            echo '  </div>';
                            echo '  <h3 class="nombre">' . $row['nombre'] . '</h3>';
                            echo '  <p class="precio">$' . $row['precio'] . '</p>';
                            if (isset($_SESSION['user_name'])) {
                                echo '  <button class="boton-item" data-id="' . $row['id'] . '">Add to your cart</button>';
                            } else {
                                echo '  <a href="login/login.php"> <button class="boton-item2">Login to shop</button></a>';
                            }
                            echo '</div>';
                        }
                    }
                } else {
                    echo "<p>No hay productos disponibles</p>";
                }
                ?>

            </section>

            <h2 class="pre-tittle" id="shop">Only for today!</h2>
            <h2 class="welcome">¡Exclusive!</h2>

            <section class="products" data-aos="fade-up">
                <?php

                $sql = "SELECT id, nombre, precio, imgURL, categoria FROM productos";
                $resultado = $conection->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        if ($row['categoria'] == "Postres") {
                            echo '<div class="card">';
                            echo '  <div class="img-container">';
                            echo '      <img class="img-item" src="' . $row['imgURL'] . '" alt="' . $row['nombre'] . '">';
                            echo '  </div>';
                            echo '  <h3 class="nombre">' . $row['nombre'] . '</h3>';
                            echo '  <p class="precio">$' . $row['precio'] . '</p>';
                            if (isset($_SESSION['user_name'])) {
                                echo '  <button class="boton-item" data-id="' . $row['id'] . '">Add to your cart</button>';
                            } else {
                                echo '  <a href="login/login.php"> <button class="boton-item2">Login to shop</button></a>';
                            }
                            echo '</div>';
                        }
                    }
                } else {
                    echo "<p>No hay productos disponibles</p>";
                }
                ?>

            </section>

            <section class="Recomendations-section" id="recomendation">

                <h2 class="pre-tittle" id="shop">Let us know!</h2>
                <h2 class="welcome">you have any recomendation?</h2>
                <div class="centrar2">
                    <form class="contact-form">
                        <input type="text" name="" placeholder="What dessert would you like us to make?" required>
                        <input type="text" name="" placeholder="Any details on how you’d like it prepared?">
                        <input type="text" name="" placeholder="What price would you consider fair?" required>
                        <button type="submit">Send Message</button>
                    </form>
                    <img src="Sources/contact-me.jpg" style="border-radius: 20px;">
                </div>

            </section>

        </main>

        <footer>
            <p>&copy; 2025 Dulces Juliana | Todos los derechos reservados</p>
        </footer>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init({
                duration: 1000,
                once: true
            });
        });
    </script>

    <script src="Scripts/script.js"></script>
</body>

</html>