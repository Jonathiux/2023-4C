<?php

include_once 'conexion.php';

class carrito {
    private $idProducto;
    private $idUsuario;
    private $cantidad;


    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

  
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function altaCarrito(){
        $pdo = new Conexion();
        $query = $pdo->prepare('INSERT INTO carrito(idProducto, idUsuario, cantidad) VALUES (:idProducto, :idUsuario, :cantidad);');
        $query->bindValue(':idProducto', $this->getIdProducto());
        $query->bindValue(':idUsuario', $this->getIdUsuario());
        $query->bindValue(':cantidad', $this->getCantidad());
        $query->execute();

        $pdo = null;
    }
    public function bajaCarrito(){
        $pdo = new Conexion();
        $query = $pdo->prepare('UPDATE carrito SET activo=:activo WHERE idCarrito=:idCarrito;');
        $query->bindValue(':activo', 0);
        $query->bindValue(':idCarrito', $this->getIdCarrito());
        $query->execute();

        $pdo = null;
    }

}
