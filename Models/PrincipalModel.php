<?php
class PrincipalModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProducto($id_producto)
    {
        $sql = "SELECT p.*, c.categoria FROM productos p INNER JOIN categorias c ON p.id_categorias = c.id WHERE p.id = $id_producto";
        return $this->select($sql);
        /* $data = $this->selectAll($sql);
        return $data; */
    }

    // Paginación
    public function getProductos($desde, $por_pagina)
    {
        $sql = "SELECT * FROM productos LIMIT $desde, $por_pagina";
        return $this->selectAll($sql);
    }

    // Obtener total de productos
    public function getTotalProductos()
    {
        $sql = "SELECT COUNT(*) AS total FROM productos";
        return $this->select($sql);
    }

    // Productos por categoria
    public function getProductosCat($id_categoria, $desde, $por_pagina)
    {
        $sql = "SELECT * FROM productos WHERE id_categorias = $id_categoria LIMIT $desde, $por_pagina";
        return $this->selectAll($sql);
    }

    // Obtener total de Productos por categoria
    public function getTotalProductosCat($id_categoria)
    {
        $sql = "SELECT COUNT(*) AS total FROM productos WHERE id_categorias = $id_categoria";
        return $this->select($sql);
    }

    // Productos Relacionados Aleatorios
    public function getAleatorios($id_categoria, $id_producto)
    {
        $sql = "SELECT * FROM productos WHERE id_categorias = $id_categoria AND id != $id_producto ORDER BY RAND() LIMIT 6";
        return $this->selectAll($sql);
    }

    // Productos en la lista de deseo
    /* public function getListaDeseo($id_producto)
    {
        $sql = "SELECT * FROM productos WHERE id = $id_producto";
        return $this->select($sql);
    } */
}
