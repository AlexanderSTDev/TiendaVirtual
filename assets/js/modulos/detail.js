const btnAddCart = document.getElementById('btnAddCart');
const cantidad = document.getElementById('product-quanity');
const idProducto = document.getElementById('idProducto');

document.addEventListener('DOMContentLoaded', () => {
    btnAddCart.addEventListener('click', function () {
        agregarCarrito(idProducto.value, cantidad.value);
    });
});