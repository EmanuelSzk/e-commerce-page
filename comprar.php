<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Comprar Producto</title>
    <link rel="stylesheet" href="Styles/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="grid">
        <header>
            <nav class="header-nav">
                <a href="index.html">
                    <img src="Sources/logo.png" class="logo" alt="Logo">
                </a>
                <ul class="menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <a href="listado_tabla.html">
                    <svg class="carrito" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6">
                        <path fill-rule="evenodd"
                            d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                            clip-rule="evenodd" />
                    </svg></a>
            </nav>
            <h1 class="title" style="text-align: center;">Finalizar Compra</h1>
            <p class="description" style="text-align: center; margin-bottom: 35px;">Completa tus datos para realizar la
                compra de tus postres favoritos.</p>
        </header>

        <main>
            <div class="centrar">


                <form class="purchase-form">
                    <div class="form-group">
                        <div>
                            <label class="dato" for="nombre">Nombre del Cliente: </label>
                        </div>
                        <input class="Rellenar" type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="direccion">Dirección: </label>
                        </div>
                        <input class="Rellenar" type="text" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="telefono">Teléfono: </label>
                        </div>
                        <input class="Rellenar" type="tel" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="email">E-mail: </label>
                        </div>
                        <input class="Rellenar" type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="pago">Medio de Pago: </label>
                        </div>
                        <select class="Rellenar" id="pago" name="pago" required>
                            <option value="">Selecciona una opción</option>
                            <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="transferencia">Transferencia Bancaria</option>
                            <option value="mercadopago">MercadoPago</option>
                        </select>
                    </div>
                    <div class="button">
                        <button type="submit">Confirmar compra</button>
                    </div>
                </form>
            </div>
        </main>
        <footer>
            <p>&copy; 2025 Dulces Juliana | Todos los derechos reservados</p>
        </footer>
    </div>

    <script src="Scripts/script.js"></script>

</body>

</html>