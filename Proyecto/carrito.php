<?php

include_once 'conexion.php';

class carrito {
    private $idCarrito;
    private $idProd;
    private $idUsuario;
    private $cantidad;
    private $activo;


    public function getIdCarrito()
    {
        return $this->idcarrito;
    }

    public function setIdCarrito($idCarrito)
    {
        $this->idcarrito = $idCarrito;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    public function setActivo($activo)
    {
        $this->activo = $Activo;
    }

    public function getIdProd()
    {
        return $this->idProd;
    }

    public function setIdProd($idProd)
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
        $query = $pdo->prepare('UPDATE carrito SET activo=:activo WHERE idCarrito=:idCarrito;');
        $query->bindValue(':activo', 0);
        $query->bindValue(':idCarrito', $this->getIdCarrito());
        $query->execute();

        $pdo = null;
    }

}
