let carrito = [];
const contadorCarrito = document.getElementById('contador-carrito');

function agregarAlCarrito(producto) {
    carrito.push(producto);
    localStorage.setItem('carrito', JSON.stringify(carrito));
    actualizarContadorCarrito();
}

function actualizarContadorCarrito() {
    const totalItems = carrito.length;
    contadorCarrito.innerText = totalItems;
}

window.onload = function() {
    carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    actualizarContadorCarrito();
};
