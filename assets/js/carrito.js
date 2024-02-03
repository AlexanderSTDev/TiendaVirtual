const btnAddDeseo = document.querySelectorAll('.btnAddDeseo');
const btnAddCarrito = document.querySelectorAll('.btnAddCarrito');
const btnDeseo = document.getElementById('btnCantidadDeseo');
const btnCarrito = document.getElementById('btnCantidadCarrito');
const verCarrito = document.getElementById('verCarrito');
const tableListaCarrito = document.querySelector('#tableListaCarrito tbody');
let listaDeseo, listaCarrito;

document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('listaDeseo') != null) {
        listaDeseo = JSON.parse(localStorage.getItem('listaDeseo'));
    }
    if (localStorage.getItem('listaCarrito') != null) {
        listaCarrito = JSON.parse(localStorage.getItem('listaCarrito'));
    }

    // Agregar productos a la lista de deseos
    for (let i = 0; i < btnAddDeseo.length; i++) {
        btnAddDeseo[i].addEventListener('click', function () {
            let idProducto = btnAddDeseo[i].getAttribute('data-id');
            agregarDeseo(idProducto);
        });
    }
    // Agregar productos al carrito
    for (let i = 0; i < btnAddCarrito.length; i++) {
        btnAddCarrito[i].addEventListener('click', function () {
            let idProducto = btnAddCarrito[i].getAttribute('data-id');
            agregarCarrito(idProducto, 1);
        });
    }
    // Cargar cantidad de deseos y carrito
    cantidadDeseo();
    cantidadCarrito();

    // Ver carrito
    const myModal = new bootstrap.Modal(document.getElementById('myModal'));
    verCarrito.addEventListener('click', function () {
        getListaCarrito();
        myModal.show();
    });
});

// Agregar productos a la lista de deseos
function agregarDeseo(idProducto) {
    if (localStorage.getItem('listaDeseo') == null) {
        listaDeseo = [];
    } else {
        let listaExiste = JSON.parse(localStorage.getItem('listaDeseo'));
        for (let i = 0; i < listaExiste.length; i++) {
            if (listaExiste[i].idProducto == idProducto) {
                Swal.fire({
                    title: "Aviso",
                    text: "El producto ya existe en la lista de deseos",
                    icon: "warning",
                });
                return;
            }
        }
        listaDeseo.concat(localStorage.getItem('listaDeseo'));
    }
    listaDeseo.push({
        "idProducto": idProducto,
        "cantidad": 1
    });
    localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo));
    Swal.fire({
        title: "Aviso",
        text: "Producto agregado a la lista de deseos",
        icon: "success",
    });
    cantidadDeseo();
}

// Agregar productos al carrito
function agregarCarrito(idProducto, cantidad) {
    if (localStorage.getItem('listaCarrito') == null) {
        listaCarrito = [];
    } else {
        let listaExiste = JSON.parse(localStorage.getItem('listaCarrito'));
        for (let i = 0; i < listaExiste.length; i++) {
            if (listaExiste[i].idProducto == idProducto) {
                Swal.fire({
                    title: "Aviso",
                    text: "El producto ya existe en el carrito",
                    icon: "warning",
                });
                return;
            }
        }
        listaCarrito.concat(localStorage.getItem('listaCarrito'));
    }
    listaCarrito.push({
        "idProducto": idProducto,
        "cantidad": cantidad
    });
    localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito));
    Swal.fire({
        title: "Aviso",
        text: "Producto agregado al carrito",
        icon: "success",
    });
    cantidadCarrito();
}

function cantidadDeseo() {
    let listas = JSON.parse(localStorage.getItem('listaDeseo'));
    if (listas != null) {
        btnDeseo.innerHTML = listas.length;
    } else {
        btnDeseo.innerHTML = 0;
    }
}

function cantidadCarrito() {
    let listas = JSON.parse(localStorage.getItem('listaCarrito'));
    if (listas != null) {
        btnCarrito.innerHTML = listas.length;
    } else {
        btnCarrito.innerHTML = 0;
    }
}

// ver carrito
function getListaCarrito() {
    const url = base_url + 'principal/listaCarrito';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaCarrito));

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.forEach(producto => {
                html += `
                <tr>
                    <td><img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="100"></td>
                    <td>${producto.nombre}</td>
                    <td><span class="badge bg-success">USD ${producto.precio}</span></td>
                    <td><span class="badge bg-primary">${producto.cantidad}</span></td>
                    <td>
                    <button class="btn btn-danger btnEliminarDeseo" type="button" data-id="${producto.id}"><i class="far fa-trash-alt"></i></button>
                    <button class="btn btn-info" type="button"><i class="fas fa-cart-plus"></i></button>
                    </td>
                </tr>
                `;
            });
            tableListaCarrito.innerHTML = html;
            // btnEliminarDeseo();
        }
    }
}