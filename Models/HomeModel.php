<?php
class HomeModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias()
    {
        $sql = "SELECT * FROM categorias ORDER BY id ASC LIMIT 6";
        return $this->selectAll($sql);
        /* $data = $this->selectAll($sql);
        return $data; */
    }

    public function getNuevoProductos()
    {

        $sql = "SELECT * FROM productos ORDER BY id ASC LIMIT 6";
        return $this->selectAll($sql);
    }
}
