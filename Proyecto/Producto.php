<?php
include_once 'conexion.php';

class Producto
{
    private $idProducto;
    private $idCat;
    private $nombre;
    private $descripcion;
    private $precio;
    private $cantidad;

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function getIdCat()
    {
        return $this->idCat;
    }

    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    function ProductoAlta()
    {
        try {
            $pdo = new Conexion();
            $query = $pdo->prepare("INSERT INTO producto (nombre, descripcion, precio, cantidad, idCat) 
                VALUES (
                '" . $this->getNombre() . "',
                '" . $this->getDescripcion() . "',
                '" . $this->getPrecio() . "',
                '" . $this->getCantidad() . "',
               '" . $this->getIdCat() . "');");
            $query->execute();

            /* echo "INSERT INTO producto (idCat, nombre, descripcion, precio, cantidad)
                 VALUES (
                     '" . $this->getIdCat() . "',
                     '" . $this->getNombre() . "',
                     '" . $this->getDescripcion() . "',
                     '" . $this->getPrecio() . "',
                     '" . $this->getCantidad() . "');";
            */

        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
        $pdo = null;
    }

    function ProductoModificar()
    {
        try {
            $pdo = new Conexion();
            $query = $pdo->prepare("SELECT * FROM Producto WHERE idProducto=".$this->getidProducto().";");
            $query->execute();
            $result = $query->fetchAll();
            foreach ($result as $value) {
                $this->setidProducto($value['idProducto']);
                $this->setIdCat($value['idCat']);
                $this->setNombre($value['nombre']);
                $this->setDescripcion($value['descripcion']);
                $this->setCantidad($value['cantidad']);
                $this->setPrecio($value['precio']);
            }
        } catch (PDOException $e) {
           echo $query . "<br>" . $e->getMessage();
        }
        $pdo = null;
    }

    function ProductoModificarGuardar()
    {
        try {

            $pdo = new Conexion();
            $query = $pdo->prepare("UPDATE producto"
                . " SET Nombre  = :Nombre,"
                . " Descripcion = :Descripcion,"
                . " Precio = :Precio,"
                . " Cantidad = :Cantidad,"
                . " idCat = :idCat WHERE idProducto = :idProducto;");
            $query->bindValue(':Nombre', $this->getNombre());
            $query->bindValue(':Descripcion', $this->getDescripcion());
            $query->bindValue(':Precio', $this->getPrecio());
            $query->bindValue(':Cantidad', $this->getCantidad());
            $query->bindValue(':idCat', $this->getIdCat());
            $query->bindValue(':idProducto', $this->getIdProducto());
            $query->execute();

        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }

        $pdo = null;

    }

    function ProductoConsulta() {

        $pdo = new Conexion();
        $query = $pdo->prepare('SELECT * FROM Producto WHERE activo=1;');
        $query->execute();
        
        
        $resultado = $query->fetchAll();
        
        foreach ($resultado as $key => $value) {
        $modificar='<a href="ProductoModificar.php?idProducto='.$value['idProducto'].'" class="btn btn-primary">Modificar</a>'.
        '<a href="agregarCarrito.php?idProducto='.$value['idProducto'].'" class="btn btn-primary m-s-1">Agregar Carrito</a>';
          $Producto[$key] = array(
                $value['idProducto'],
                $value['idCat'],  
                $value['nombre'],
                $value['descripcion'],
                $value['precio'],
                $value['cantidad'],
                $modificar
            );
        }
 
        return $Producto;

    }

    function ProductoInfo()
    {
        $pdo = new Conexion();
        $query = $pdo->prepare("SELECT * FROM Producto WHERE idProducto=".$this->getId().";");
        $query->execute();
        
        
        $resultado = $query->fetchAll();
        
        foreach ($resultado as $key => $value) {
        $modificar='<a href="ProductoModificar.php?idProducto='.$value['idProducto'].'" class="btn btn-primary">Modificar</a>';
          $Producto[$key] = array(
                $value['idProducto'],
                $value['idCat'],  
                $value['nombre'],
                $value['descripcion'],
                $value['precio'],
                $value['cantidad'],
                $modificar
            );
        }
 
        return $Producto;
    }
}



?>