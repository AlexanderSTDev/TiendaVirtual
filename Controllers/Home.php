<?php
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $data['categorias'] = $this->model->getCategorias();
        $data['nuevoProductos'] = $this->model->getNuevoProductos();
        // Prueba
        /* print_r($data);
        exit;*/
        $this->views->getView('home', "index", $data);
    }
}
