<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-shopping-cart"></i> Carrito</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle" id="tableListaCarrito">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <a href="<?php echo BASE_URL . 'clientes'; ?>" class="btn btn-outline-dark">Procesar Compra</a>
                <h3 id="totalGeneral"></h3>
            </div>
        </div>
    </div>
</div>

<!-- Login directo -->
<!-- Modal -->
<div id="modalLogin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleLogin">Iniciar Sesión</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body m-3">
                <form action="<?php echo BASE_URL . 'login'; ?>" method="POST">
                    <div class="text-center">
                        <img src="<?php echo BASE_URL; ?>assets/img/apple-icon.png" alt="" width="100" class="mb-4 rounded rounded-circle img-thumbnail">
                    </div>
                    <div class="row">
                        <!-- Formulario de login -->
                        <div class="col-md-12" id="formLogin">
                            <div class="form-group mb-3">
                                <label for="correoLogin"><i class="fas fa-envelope"></i> Email</label>
                                <input type="email" class="form-control" id="correoLogin" name="correoLogin" placeholder="Ingrese su correo electronico">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveLogin"><i class="fas fa-key"></i> Contraseña</label>
                                <input type="password" class="form-control" id="claveLogin" name="claveLogin" placeholder="Ingrese su contraseña">
                            </div>
                            <a href="#" id="btnRegistrarse">Todavía no tienes una cuenta?</a>
                            <div class="float-end">
                                <button type="button" class="btn btn-outline-dark" id="login">Login</button>
                            </div>
                        </div>
                        <!-- Formulario de registro -->
                        <div class="col-md-12 d-none" id="formRegistro">
                            <div class="form-group mb-3">
                                <label for="nombreRegistro"><i class="fas fa-list"></i> Nombres</label>
                                <input type="email" class="form-control" id="nombreRegistro" name="correoCliente" placeholder="Ingrese su nombre completo">
                            </div>
                            <div class="form-group mb-3">
                                <label for="correoRegistro"><i class="fas fa-envelope"></i> Email</label>
                                <input type="email" class="form-control" id="correoRegistro" name="correoRegistro" placeholder="Ingrese su correo electronico">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveRegistro"><i class="fas fa-key"></i> Contraseña</label>
                                <input type="password" class="form-control" id="claveRegistro" name="claveRegistro" placeholder="Ingrese su contraseña">
                            </div>
                            <a href="#" id="btnLogin">Ya tienes una cuenta?</a>
                            <div class="float-end">
                                <button type="button" class="btn btn-outline-dark" id="registrarse">Registrarse</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        123 Consectetur at ligula 10660
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Luxury</a></li>
                    <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                    <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                    <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                    <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                    <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                    <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Home</a></li>
                    <li><a class="text-decoration-none" href="#">About Us</a></li>
                    <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                    <li><a class="text-decoration-none" href="#">FAQs</a></li>
                    <li><a class="text-decoration-none" href="#">Contact</a></li>
                </ul>
            </div>

        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">Email address</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                    <div class="input-group-text btn-success text-light">Subscribe</div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; 2021 Company Name
                        | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<!-- Start Script -->
<script src="<?PHP echo BASE_URL; ?>assets/js/jquery-1.11.0.min.js"></script>
<script src="<?PHP echo BASE_URL; ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?PHP echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?PHP echo BASE_URL; ?>assets/js/templatemo.js"></script>
<script src="<?PHP echo BASE_URL; ?>assets/js/custom.js"></script>
<script>
    const base_url = "<?PHP echo BASE_URL; ?>";
</script>
<script src="<?PHP echo BASE_URL; ?>assets/js/carrito.js"></script>
<script src="<?PHP echo BASE_URL; ?>assets/js/login.js"></script>
<script src="<?PHP echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>
<!-- End Script -->