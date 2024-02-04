const tableLista = document.querySelector('#tableListaProductos tbody');

document.addEventListener('DOMContentLoaded', () => {
    getListaProductos();
});


function getListaProductos() {
    const url = base_url + 'principal/listaProductos';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaCarrito));

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
                    <td>${res.moneda} ${producto.subTotal}</td>
                </tr>
                `;
            });
            tableLista.innerHTML = html;
            document.querySelector('#totalProducto').textContent = 'Total a pagar: $' + res.total;
        }
    }
}