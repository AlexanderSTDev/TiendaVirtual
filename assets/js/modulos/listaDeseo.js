const tableListaDeseo = document.querySelector('#tableListaDeseo tbody');

document.addEventListener('DOMContentLoaded', () => {
    getListaDeseo();
});

function getListaDeseo() {
    const url = base_url + 'principal/listaProductos';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaDeseo));

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.productos.forEach(producto => {
                html += `
                <tr>
                    <td><img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="100"></td>
                    <td>${producto.nombre}</td>
                    <td><span class="badge bg-success">${res.moneda} ${producto.precio}</span></td>
                    <td><span class="badge bg-primary">${producto.cantidad}</span></td>
                    <td>
                    <button class="btn btn-danger btnEliminarDeseo" type="button" data-id="${producto.id}"><i class="far fa-trash-alt"></i></button>
                    <button class="btn btn-info btnAddCart" type="button" data-id="${producto.id}"><i class="fas fa-cart-plus"></i></button>
                    </td>
                </tr>
                `;
            });
            tableListaDeseo.innerHTML = html;
            btnEliminarDeseo();
            btnAgregarProducto();
        }
    }
}

function btnEliminarDeseo() {
    let listaEliminar = document.querySelectorAll('.btnEliminarDeseo');
    for (let i = 0; i < listaEliminar.length; i++) {
        listaEliminar[i].addEventListener('click', function () {
            let idProducto = listaEliminar[i].getAttribute('data-id');
            eliminarListaDeseo(idProducto);
        })
    }
}
function eliminarListaDeseo(idProducto) {
    for (let i = 0; i < listaDeseo.length; i++) {
        if (listaDeseo[i].idProducto == idProducto) {
            listaDeseo.splice(i, 1);
            break;
        }
    }
    localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo));
    getListaDeseo();
    cantidadDeseo();
    swal.fire({
        title: "Aviso",
        text: "Producto eliminado de la lista de deseos",
        icon: "success",
    })
}
// Agregar productos desde la lista de deseos al carrito
function btnAgregarProducto() {
    let listaAgregar = document.querySelectorAll('.btnAddCart');
    for (let i = 0; i < listaAgregar.length; i++) {
        listaAgregar[i].addEventListener('click', function () {
            let idProducto = listaAgregar[i].getAttribute('data-id');
            agregarCarrito(idProducto, 1, true);
        })
    }
}