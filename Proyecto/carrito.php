<?php

include_once 'conexion.php';

class carrito {
    private $idCarrito;
    private $idProducto;
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

    function Consulta() {

        $pdo = new Conexion();
        $query = $pdo->prepare('SELECT p.nombre, p.precio, c.idCarrito, c.cantidad FROM Carrito c 
        Join producto p on c.idProducto = p.idProducto WHERE activo=1;');
        $query->execute();
        
        
        $resultado = $query->fetchAll();
        
        foreach ($resultado as $key => $value) {
        $Eliminar='<a href="quitarElemento.php?idCarrito='.$value['idCarrito'].'" class="btn btn-danger m-2">Eliminar</a>';
          $Producto[$key] = array(
                $value['idCarrito'],
                $value['nombre'],   
                $value['precio'],
                $value['cantidad'],
                $Eliminar
            );
        }
 
        return $Producto;

    }

}
