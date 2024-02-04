<?php
class Clientes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Tu perfil';
        $this->views->getView('principal', "perfil", $data);
    }
    public function registroDirecto()
    {
        /* Para hacer pruebas
        print_r($_POST);
        exit; */
        if (isset($_POST['nombre']) && isset($_POST['clave'])) {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $data =  $this->model->registroDirecto($nombre, $correo, $clave);
            if ($data > 0) {
                $mensaje = array('msg' => 'ok', 'icono' => 'success');
            } else {
                $mensaje = array('msg' => 'error', 'icono' => 'error');
            }
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}
