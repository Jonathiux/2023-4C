<?php

include_once 'conexion.php';

class carrito {
    private $idProd;
    private $idUsuario;
    private $cantidad;


    public function getIdProd()
    {
        return $this->idProd;
    }

    public function setId($idProd)
    {
        $this->idProd = $idProd;
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
        $query = $pdo->prepare('INSERT INTO carrito(idProd, idUsuario, cantidad) VALUES (:idProd, :idUsuario, :cantidad);');
        $query->bindValue(':idProd', $this->getIdProd());
        $query->bindValue(':idUsuario', $this->getIdUsuario());
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
