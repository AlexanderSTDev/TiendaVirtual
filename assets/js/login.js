const btnRegister = document.getElementById('btnRegistrarse');
const formLogin = document.getElementById('formLogin');
const formRegistro = document.getElementById('formRegistro');
const loginBtn = document.getElementById('login');
const registrarseBtn = document.getElementById('registrarse');
// registrarse
const nombreRegistro = document.getElementById('nombreRegistro');
const correoRegistro = document.getElementById('correoRegistro');
const claveRegistro = document.getElementById('claveRegistro');
// const tableLista = document.querySelector('#tableListaProductos tbody');
const btnLogin = document.getElementById('btnLogin');

document.addEventListener('DOMContentLoaded', () => {
    btnRegister.addEventListener('click', () => {
        formLogin.classList.add('d-none');
        formRegistro.classList.remove('d-none');
    });

    btnLogin.addEventListener('click', () => {
        formLogin.classList.remove('d-none');
        formRegistro.classList.add('d-none');
    });

    // Registrar
    registrarseBtn.addEventListener('click', () => {
        let formData = new FormData();
        formData.append('nombre', nombreRegistro.value);
        formData.append('correo', correoRegistro.value);
        formData.append('clave', claveRegistro.value);

        const url = base_url + 'clientes/registroDirecto';
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(formData);

        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                // const res = JSON.parse(this.responseText);
            }
        }
    });

});