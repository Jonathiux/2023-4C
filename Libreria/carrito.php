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

    /**
     * @param mixed $IdCliente
     */
    public function setClienteId($cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    /**
     * @return mixed
     */
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
        $query = $pdo->prepare('INSERT INTO carrito(cliente_id, libro_id, cantidad) VALUES (:cliente_id, :libro_id, :cantidad);');
        $query->bindValue(':cliente_id', $this->getClienteId());
        $query->bindValue(':libro_id', $this->getLibroId());
        $query->bindValue(':cantidad', $this->getCantidad());
        $query->execute();

        $pdo = null;
    }
    public function bajaCarrito(){
        $pdo = new Conexion();
        $query = $pdo->prepare('UPDATE carrito SET activo=:activo WHERE id=:IdCarrito;');
        $query->bindValue(':activo', 0);
        $query->bindValue(':IdCarrito', $this->getId());
        $query->execute();

        $pdo = null;
    }

}
