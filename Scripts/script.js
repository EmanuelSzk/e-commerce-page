// Mantiene el carrito oculto
var carritoVisible = false;

//Esperamos que todos los elementos de la página se carguen para continuar con el script
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready();
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector(".purchase-items")) {
        cargarProductos();
    }
});

function ready() {
    //agregamos funcionalidad al boton eliminar del carrito    
    var botonesEliminarItem = document.getElementsByClassName('btn-eliminar');
    for (var i = 0; i < botonesEliminarItem.length; i++) {
        var button = botonesEliminarItem[i];
        button.addEventListener('click', eliminarItemCarrito);
    }

    var botonesSumarItem = document.getElementsByClassName('sumar-cantidad');
    for (var i = 0; i < botonesSumarItem.length; i++) {
        var button = botonesSumarItem[i];
        button.addEventListener('click', sumarCantidad);
    }

    var botonesRestarItem = document.getElementsByClassName('restar-cantidad');
    for (var i = 0; i < botonesRestarItem.length; i++) {
        var button = botonesRestarItem[i];
        button.addEventListener('click', restarCantidad);
    }

    var botonesAgregarAlCarrito = document.getElementsByClassName('boton-item');
    for (var i = 0; i < botonesAgregarAlCarrito.length; i++) {
        var button = botonesAgregarAlCarrito[i];
        button.addEventListener('click', agregarAlCarritoClicked);
    }
    const btnPagar = document.querySelector('.btn-pagar');
    if (btnPagar) {
        btnPagar.addEventListener('click', pagarClicked);
    }

    var CarritoLogo = document.getElementById('carrito-icon');
    CarritoLogo.addEventListener('click', ocultarCarrito);

}

function eliminarItemCarrito(event) {
    var buttonClicked = event.target;
    // Busca el contenedor .carrito-item más cercano y lo elimina
    var item = buttonClicked.closest('.carrito-item');
    var idProduct = item.getAttribute("data-id");
    if (item) item.remove();
    // var carrito = document.getElementById('carrito');
    var nombreItemCarrito = document.getElementsByClassName('carrito-item-titulo');
    var check = document.getElementsByClassName('see-more');

    if (nombreItemCarrito.length < 3 && check.length == 1) {
        console.log('hay menos de tres elementos en carrito');
        var item = document.getElementsByClassName('see-more')[0];
        console.log('obtenemos see more');
        item.remove();
        console.log('removimos en teoria (?');
        return;
    }

    console.log("enviando id de producto a eliminar", {
        ID_Producto: idProduct,
    });

    fetch("pages/borrar_item.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `id_product=${idProduct}`
    })
        .then(res => res.text())
        .then(texto => {
            console.log("Respuesta RAW del php:", texto);
        })
        .catch(err => console.error("Error"))

    //Actualizamos el total del carrito una vez eliminado el item
    actualizarTotalCarrito();
    ocultarCarrito();
}

function actualizarTotalCarrito() {
    var carritoDeCompras = document.getElementsByClassName('carrito')[0];
    var carritoItems = carritoDeCompras.getElementsByClassName('carrito-item');
    var total = 0;

    for (var i = 0; i < carritoItems.length; i++) {
        //variable util dentro de la función
        var item = carritoItems[i];
        var precioItem = item.getElementsByClassName('carrito-item-precio')[0];
        //sacamos signo peso y reemplazamos coma para poder hacer operaciones con los precios.
        var precio = parseFloat(precioItem.innerText.replace('$', '').replace(',', '.'));
        var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0];
        var cantidad = cantidadItem.value;
        total = total + (precio * cantidad);
    }
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toLocaleString("es") + ',00';
}

function ocultarCarrito() {
    var carritoItems = document.getElementsByClassName('carrito-item');
    if (carritoItems.length == 0) {
        var carrito = document.getElementsByClassName('carrito')[0];
        carrito.style.opacity = '0';
        carritoVisible = false;
    }
}

function sumarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;

    var cantidadInput = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    var cantidadActual = parseInt(cantidadInput);
    cantidadActual++;
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
    cantidadInput.value = cantidadActual;

    // Obtener id del producto desde el <div class="item-carrito" data-id="">
    var carritoItem = buttonClicked.closest(".carrito-item");
    var idProduct = carritoItem.getAttribute("data-id");

    console.log("Enviando a PHP:", {
        id_product: idProduct,
        cantidad: cantidadActual
    });

    // Enviar actualización a la base de datos
    fetch("pages/actualizar_cantidad.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `id_product=${idProduct}&cantidad=${cantidadActual}`
    })
        .then(res => res.text()) // <-- leer como texto para ver errores ocultos
        .then(texto => {
            console.log("Respuesta RAW del PHP:", texto);
        })
        .catch(err => console.error("Error fetch:", err));

    actualizarTotalCarrito();

}

function restarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;

    var cantidadInput = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    var cantidadActual = parseInt(cantidadInput);
    cantidadActual--;
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
    cantidadInput.value = cantidadActual;

    if (cantidadActual == 0) {
        eliminarItemCarrito(event);
    } else {
        actualizarTotalCarrito();
    }

    // Obtener id del producto desde el <div class="item-carrito" data-id="">
    var carritoItem = buttonClicked.closest(".carrito-item");
    var idProduct = carritoItem.getAttribute("data-id");

    console.log("Enviando a PHP:", {
        id_product: idProduct,
        cantidad: cantidadActual
    });

    // Enviar actualización a la base de datos
    fetch("pages/actualizar_cantidad.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `id_product=${idProduct}&cantidad=${cantidadActual}`
    })
        .then(res => res.text()) // <-- leer como texto para ver errores ocultos
        .then(texto => {
            console.log("Respuesta RAW del PHP:", texto);
        })
        .catch(err => console.error("Error fetch:", err));

    actualizarTotalCarrito();
}

function agregarAlCarritoClicked(event) {
    var button = event.target;
    var item = button.parentElement;

    var idProduct = button.dataset.id;
    var titulo = item.getElementsByClassName('nombre')[0].innerText;
    var precio = item.getElementsByClassName('precio')[0].innerText;
    var imagenSrc = item.getElementsByClassName('img-item')[0].src;
    agregarItemAlCarrito(idProduct, titulo, precio, imagenSrc);
    agregarItemBD(idProduct);
}

function agregarItemAlCarrito(idProduct, titulo, precio, imagenSrc) {
    var carrito = document.getElementById('carrito');
    var item = document.createElement('div');

    // Verifica si el producto ya está en el carrito
    var nombreItemCarrito = carrito.getElementsByClassName('carrito-item-titulo');
    var check = document.getElementsByClassName('see-more');

    if (nombreItemCarrito.length == 3 && check.length == 0) {
        console.log('check vale 0');
        var item = document.createElement('div');
        console.log("If alcanzado");
        item.innerHTML = `
        <div class="see-more">
        </div>`;
        var carrito = document.getElementById('agregar-carrito');
        carrito.appendChild(item);
        return;
    }

    if (nombreItemCarrito.length == 3 && check.length == 1) {
        return;
    }

    for (var i = 0; i < nombreItemCarrito.length; i++) {
        console.log("estos son los elementos del carro: ", [i], "Item:", nombreItemCarrito[i]);
        console.log("este es el titulo", titulo);
        var tituloActual = nombreItemCarrito[i].innerText;
        console.log("se realizó la comparación de ", tituloActual, " con ", titulo);
        if (tituloActual == titulo) {
            alert("Ya está ese item en el carrito");
            return;
        }
    }

    item.innerHTML = `
    <div class="carrito-item" data-id="${idProduct}">
        <img src="${imagenSrc}" width="80px" class="img-carrito">
        <div class="carrito-item-detalles">
            <h3 class="carrito-item-titulo">${titulo}</h3>
            <div style="display: flex;">
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i>
                    <input type="text" value="1" class="carrito-item-cantidad">
                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                </div>
                <span class="carrito-item-precio">${precio}</span>
            </div>
        </div>
        <span class="btn-eliminar">
            <i class="fa-solid fa-trash boton-eliminar"></i>
        </span>
    </div>`;

    var carrito = document.getElementById('agregar-carrito');
    carrito.appendChild(item);

    var carritoItems = document.getElementsByClassName('carrito-item');
    if (carritoItems.length == 1) {
        var carrito = document.getElementsByClassName('carrito')[0];
        carrito.style.opacity = '100';
        carritoVisible = true;
    }

    item.getElementsByClassName('btn-eliminar')[0].addEventListener('click', eliminarItemCarrito);

    var botonesSumarCantidad = item.getElementsByClassName('sumar-cantidad')[0];
    botonesSumarCantidad.addEventListener('click', sumarCantidad);

    var botonesRestarCantidad = item.getElementsByClassName('restar-cantidad')[0];
    botonesRestarCantidad.addEventListener('click', restarCantidad);

    actualizarTotalCarrito();
}

function pagarClicked(event) {
}

function agregarItemBD(idProduct) {
    fetch("pages/agregar_al_carrito.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id_product=" + encodeURIComponent(idProduct)
    })
        .then(res => res.text())
        .then(res => {
            console.log("Respuesta del servidor:", res);
        })
        .catch(err => console.error("Error:", err));
}

function cargarProductos() {
    fetch("obtener_productos.php")
        .then(res => res.json())
        .then(data => {

            console.log("Json entregado correctamente", data);

            const contenedor = document.getElementById("purchase-items");

            var total = 0;

            if (data.length) {
                for (let i = 0; i < data.length; i++) {
                    var rutaImagen = "../" + data[i].imgURL;
                    contenedor.innerHTML += `
        <div class="item-carrito">
            <div class="contenedorUno">
                <img src="${rutaImagen}" class="img-item-pago">
            </div>
            <div class="contenedorDos">
                <h3>${data[i].nombre}</h3>
                <p>Cantidad: ${data[i].cantidad}, Precio Total: ${data[i].precio * data[i].cantidad}$</p>
            </div>
        </div>`;
                    total += (data[i].precio * data[i].cantidad);
                }
                document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toLocaleString("es") + ',00';
            } else {
                var item = document.createElement('div');
                item.innerHTML = `
        <div class="no-products">
        No hay productos en el carrito
        </div>`;
                var noProducts = document.getElementById('purchase-items');
                noProducts.appendChild(item);
            }
        })
    const btnPagar = document.querySelector(".btn-pagar");

    if (btnPagar) {
        btnPagar.addEventListener("click", confirmarCompra);

    }
}

function confirmarCompra() {

    let nombre = document.getElementById("nombre").value.trim();
    let direccion = document.getElementById("direccion").value.trim();
    let telefono = document.getElementById("telefono").value.trim();
    let email = document.getElementById("email").value.trim();
    let pago = document.getElementById("pago").value;

    if (!nombre || !direccion || !telefono || !email || !pago) {
        alert("Completa todos los campos antes de confirmar la compra.");
        return;
    }

    // 3) Confirmación visual
    if (!confirm("¿Confirmar compra?")) return;

    // 4) Ejecutar el TRUNCATE por FETCH
    fetch("vaciar_carrito.php", {
        method: "POST",
    })
    .then(res => res.text())
    .then(res => {
        console.log("Respuesta del servidor:", res);

        alert("Compra confirmada. Gracias por tu compra!");

        actualizarTotalCarrito();
    })
    .catch(err => console.error("Error:", err));
}
