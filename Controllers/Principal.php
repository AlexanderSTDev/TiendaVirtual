<?php
class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
    }
    // Vista contacto
    public function about()
    {
        $data['title'] = 'Nuestro Equipo';
        $this->views->getView('principal', "about", $data);
    }
    // Vista tienda
    public function shop($page)
    {
        $pagina = empty($page) ? 1 : $page;
        $por_pagina = 8;
        $desde = ($pagina - 1) * $por_pagina;
        $data['title'] = 'Nuestros Productos';
        $data['productos'] = $this->model->getProductos($desde, $por_pagina);
        $data['paginacion'] = $pagina;
        $total = $this->model->getTotalProductos();
        $data['total'] = ceil($total['total'] / $por_pagina);
        /**
         * Para mostrar la paginación
         * print_r($data['total']);
         * exit;
         */
        $this->views->getView('principal', "shop", $data);
    }
    // Vista detalles
    public function detail($id_producto)
    {
        $data['producto'] = $this->model->getProducto($id_producto);
        $id_categoria = $data['producto']['id_categorias'];
        $data['relacionados'] = $this->model->getAleatorios($id_categoria, $data['producto']['id']);
        $data['title'] = $data['producto']['nombre'];
        $this->views->getView('principal', "detail", $data);
    }
    // Vista categorias
    public function categorias($datos)
    {
        $id_categoria = 1;
        $page = 1;
        $array = explode(",", $datos);
        if (isset($array[0])) {
            if (!empty($array[0] != "")) {
                $id_categoria = $array[0];
            }
        }

        if (isset($array[1])) {
            if (!empty($array[1] != "")) {
                $page = $array[1];
            }
        }

        $pagina = empty($page) ? 1 : $page;
        $por_pagina = 8;
        $desde = ($pagina - 1) * $por_pagina;

        $data['paginacion'] = $pagina;
        $total = $this->model->getTotalProductosCat($id_categoria);
        $data['total'] = ceil($total['total'] / $por_pagina);

        $data['productos'] = $this->model->getProductosCat($id_categoria, $desde, $por_pagina);
        $data['title'] = 'Categorias';
        $data['id_categoria'] = $id_categoria;
        $this->views->getView('principal', "categorias", $data);
    }
    // Vista detalles
    public function contactos()
    {
        $data['title'] = 'Contactos';
        $this->views->getView('principal', "contact", $data);
    }
    // Vista lista de deseos
    public function deseo()
    {
        $data['title'] = 'Tu lista de deseos';
        $this->views->getView('principal', "deseo", $data);
    }
    // Obtener productos a partir de la lista de deseos y carrito
    public function listaProductos()
    {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $array['productos'] = array();
        $total = 0.00;
        foreach ($json as $producto) {
            $result = $this->model->getProducto($producto['idProducto']);
            $data['id'] = $result['id'];
            $data['nombre'] = $result['nombre'];
            $data['precio'] = $result['precio'];
            $data['cantidad'] = $producto['cantidad'];
            $data['imagen'] = $result['imagen'];
            $subTotal = $data['precio'] * $data['cantidad'];
            $data['subTotal'] = number_format($subTotal, 2, '.', '');
            array_push($array['productos'], $data);
            $total += $subTotal;
        }
        $array['moneda'] = MONEDA;
        $array['total'] = number_format($total, 2);
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die;
    }
    // Obtener productos a partir de la lista de deseos
    /* public function listaDeseo()
    {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $array['productos'] = array();
        foreach ($json as $producto) {
            $result = $this->model->getProducto($producto['idProducto']);
            $data['id'] = $result['id'];
            $data['nombre'] = $result['nombre'];
            $data['precio'] = $result['precio'];
            $data['cantidad'] = $producto['cantidad'];
            $data['imagen'] = $result['imagen'];
            array_push($array['productos'], $data);
        }
        $array['moneda'] = MONEDA;
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die;
    } */
    // Obtener productos en el carrito
    /* public function listaCarrito()
    {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $array['productos'] = array();
        $total = 0.00;
        foreach ($json as $producto) {
            $result = $this->model->getProducto($producto['idProducto']);
            $data['id'] = $result['id'];
            $data['nombre'] = $result['nombre'];
            $data['precio'] = $result['precio'];
            $data['cantidad'] = $producto['cantidad'];
            $data['imagen'] = $result['imagen'];
            $subTotal = $data['precio'] * $data['cantidad'];
            $data['subTotal'] = number_format($subTotal, 2, '.', '');
            array_push($array['productos'], $data);
            $total += $subTotal;
        }
        $array['moneda'] = MONEDA;
        $array['total'] = number_format($total, 2);
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die;
    } */
}
