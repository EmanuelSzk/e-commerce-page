if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', mostrarProductos)
} else {
    mostrarProductos();
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector(".purchase-items")) {
        cargarProductos();
    }
});

function IncluirCarrito(id, nombre, ruta, cantidad, precio) {
    var item = document.createElement('div');
    item.innerHTML = `
                <div class="carrito-item" data-id="${id}">
        <img src="${ruta}" width="80px" class="img-carrito">
        <div class="carrito-item-detalles">
            <h3 class="carrito-item-titulo">${nombre}</h3>
            <div style="display: flex;">
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i>
                    <input type="text" value="${cantidad}" class="carrito-item-cantidad">
                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                </div>
                <span class="carrito-item-precio">${precio}</span>
            </div>
        </div>
        <span class="btn-eliminar">
            <i class="fa-solid fa-trash boton-eliminar"></i>
        </span>
    </div>`;
    let contenedor = document.getElementById('agregar-carrito');
    contenedor.appendChild(item);


    var totalElement = document.getElementsByClassName('carrito-precio-total')[0].innerText.replace(/[^0-9,.-]/g, '').replace(',', '.');
    var totalNum = parseFloat(totalElement);
    var total = parseFloat(totalNum) + (parseFloat(precio) * parseInt(cantidad));

    document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toLocaleString("es") + ',00';

    ready();
}

function mostrarProductos() {

    fetch("pages/carrito_usuario.php")
        .then(res => res.json())
        .then(data => {
            console.log('este es el id che: ' + data.id);
            var id_usuario = data.id;


            fetch("pages/obtener_productos.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: `id_usuario=${id_usuario}`
            })
                .then(res => res.json())
                .then(data => {
                    console.log("Json entregado: ", data);

                    if (data.length) {
                        for (let i = 0; i < data.length; i++) {
                            var id = data[i].id;
                            var nombre = data[i].nombre;
                            var ruta = data[i].imgURL;
                            var cantidad = data[i].cantidad;
                            var precio = data[i].precio;
                            IncluirCarrito(id, nombre, ruta, cantidad, precio);
                        }
                    }
                })
            ready();


        });

}

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
}

function eliminarItemCarrito(event) {
    var buttonClicked = event.target;
    var item = buttonClicked.closest('.carrito-item');
    var idProduct = item.getAttribute('data-id');
    // Me sale que le idProduct es undefined. (Solucionado - no había extraido id de la base de datos en obtener_productos.php)
    console.log("El id product es: ", idProduct);
    item.remove();

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

    var totalElement = document.getElementsByClassName('carrito-precio-total')[0].innerText.replace(/[^0-9,.-]/g, '').replace(',', '.');
    var totalNum = totalElement;
    var precioItem = item.getElementsByClassName('carrito-item-precio')[0].innerText;
    console.log("precio a sumar es", precioItem);
    var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0].value;
    var total = parseFloat(totalNum) - (parseFloat(precioItem) * parseInt(cantidadItem));
    document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toLocaleString("es") + ',00';
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

    var totalElement = document.getElementsByClassName('carrito-precio-total')[0].innerText.replace(/[^0-9,.-]/g, '').replace(',', '.');
    var totalNum = totalElement;
    var precioItem = carritoItem.getElementsByClassName('carrito-item-precio')[0].innerText;
    console.log("precio a sumar es", precioItem);
    var total = parseFloat(totalNum) + parseFloat(precioItem);
    document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toLocaleString("es") + ',00';

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
        // actualizarTotalCarrito();
    }

    // Obtener id del producto desde el <div class="item-carrito" data-id="">
    var carritoItem = buttonClicked.closest(".carrito-item");
    var idProduct = carritoItem.getAttribute("data-id");

    var totalElement = document.getElementsByClassName('carrito-precio-total')[0].innerText.replace(/[^0-9,.-]/g, '').replace(',', '.');
    var totalNum = totalElement;
    var precioItem = carritoItem.getElementsByClassName('carrito-item-precio')[0].innerText;
    console.log("precio a sumar es", precioItem);
    var total = parseFloat(totalNum) - parseFloat(precioItem);
    document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toLocaleString("es") + ',00';

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
}

function agregarAlCarritoClicked(event) {
    // event es un objeto que pasamos como atributo que contiene información del sobre el "click", como puede ser: en qué elemento hice click.
    // Lo que hace target es que selecciona el ELEMENTO exacto sobre el que hiciste el click, es decir, extrae esa información del event.
    var button = event.target;
    // parentElement = el elemento que envuelve al botón, o sea, el “padre” en el HTML, es decir, estoy seleccionando "<div class="card">"
    var item = button.parentElement; // No lo usé, pero sirve dejarlo por la teoría.

    // Y acá viene el problema, porque antes extraía la información del HTML que me pasaba el objeto "event". Lo debo extraer de la base de datos. O no necesariamente, sencillamente extraigo la info del html, para esa info ponerla (ojalá) en la base de datos y de ahí imprimo lo extraido de la base de datos y no del HTML.
    var idProduct = button.dataset.id;
    fetch("pages/carrito_usuario.php")
        .then(res => res.json())
        .then(data => {
            let idCarrito = data.id;
            console.log("paso por acá che");
            agregarItemBD(idProduct, idCarrito);
        });
}

function agregarItemBD(idProduct, idCarrito) {
    const contenedor = document.getElementById('agregar-carrito');
    const productoRepetido = contenedor.querySelector(`.carrito-item[data-id="${idProduct}"]`);
    if (productoRepetido) {
        alert("Ya está ese producto en el cashito pue");
        return
    } else {
        fetch("pages/agregar_al_carrito.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `id_product=${encodeURIComponent(idProduct)}&id_carrito=${encodeURIComponent(idCarrito)}`
        })
            .then(res => res.json())
            .then(res => {
                if (res.success && res.producto) {
                    mostrarCambios(res.producto);
                } else {
                    console.error("error en la respuesta", res);
                }
            })
    }
}

function mostrarCambios(producto) {
    var id = producto.id;
    var nombre = producto.nombre;
    var ruta = producto.imgURL;
    var cantidad = 1;
    var precio = producto.precio;
    IncluirCarrito(id, nombre, ruta, cantidad, precio);
}

function cargarProductos() {
    fetch("carrito_usuario.php")
        .then(res => res.json())
        .then(data => {
            console.log('este es el id che: ' + data.id);
            var id_usuario = data.id;

            fetch("obtener_productos.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: `id_usuario=${id_usuario}`
            })
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
        })
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
