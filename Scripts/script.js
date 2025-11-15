// Mantiene el carrito oculto
var carritoVisible = false;

//Esperamos que todos los elementos de la página se carguen para continuar con el script
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready())
} else {
    ready();
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.queryselector(".purchase-items")) {
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

    document.getElementsByClassName('btn-pagar')[0].addEventListener('click', pagarClicked);

    var CarritoLogo = document.getElementById('carrito-icon');
    CarritoLogo.addEventListener('click', ocultarCarrito);

}

function eliminarItemCarrito(event) {
    var buttonClicked = event.target;
    // Busca el contenedor .carrito-item más cercano y lo elimina
    var item = buttonClicked.closest('.carrito-item');
    if (item) item.remove();

    // var carrito = document.getElementById('carrito');

    var nombreItemCarrito = document.getElementsByClassName('carrito-item-titulo');
    var check = document.getElementsByClassName('see-more');

    if (nombreItemCarrito.length < 3 && check.length == 1) {
        console.log('hay menos de 3 en casho y check existe');
        var item = document.getElementsByClassName('see-more')[0];
        console.log('obtenemos see more');
        item.remove();
        console.log('removimos en teoria (?');
        return;
    }

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
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    console.log(cantidadActual);
    cantidadActual++;
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
    actualizarTotalCarrito();
}

function restarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    console.log(cantidadActual);
    cantidadActual--;
    var botonesRestarItem = document.getElementsByClassName('restar-cantidad');
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
    if (cantidadActual == 0) {
        eliminarItemCarrito(event);
    } else {
        actualizarTotalCarrito();
    }
}

function agregarAlCarritoClicked(event) {
    var button = event.target;
    var item = button.parentElement;
    var titulo = item.getElementsByClassName('nombre')[0].innerText;
    var precio = item.getElementsByClassName('precio')[0].innerText;
    var imagenSrc = item.getElementsByClassName('img-item')[0].src;
    agregarItemAlCarrito(titulo, precio, imagenSrc);
}

function agregarItemAlCarrito(titulo, precio, imagenSrc) {
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
    <div class="carrito-item">
        <img src="${imagenSrc}" width="80px" class="img-carrito">
        <div class="carrito-item-detalles">
            <h3 class="carrito-item-titulo">${titulo}</h3>
            <div style="display: flex;">
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i>
                    <input type="text" value="1" class="carrito-item-cantidad" disabled>
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

function cargarProductos() { 
}