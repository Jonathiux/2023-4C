<?php

include_once 'conexion.php';

class carrito {
    private $id;
    private $cliente_id;
    private $libro_id;
    private $cantidad;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getClienteId()
    {
        return $this->cliente_id;
    }

    public function setClienteId($cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    public function getLibroId()
    {
        return $this->libro_id;
    }

    /**
     * @param mixed $IdLibro
     */
    public function setLibroId($libro_id)
    {
        $this->libro_id = $libro_id;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function altaCarrito(){
        $pdo = new Conexion();
        $query = $pdo->prepare('INSERT INTO carrito(cliente_id, libro_id, cantidad) VALUES (:ClienteId, :LibroId, :cantidad);');
        $query->bindValue(':ClienteId', $this->getClienteId());
        $query->bindValue(':LibroId', $this->getLibroId());
        $query->bindValue(':cantidad', $this->getCantidad());
        $query->execute();

        $pdo = null;
    }
    public function bajaCarrito(){
        $pdo = new Conexion();
        $query = $pdo->prepare('UPDATE carrito SET activo=:activo WHERE id=:carrito_id;');
        $query->bindValue(':activo', 0);
        $query->bindValue(':carrito_id', $this->getId());
        $query->execute();

        $pdo = null;
    }

}
