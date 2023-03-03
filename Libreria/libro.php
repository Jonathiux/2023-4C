<?php

include_once 'conexion.php';

class libro {
    
    private $id;
    private $editorial;
    private $titulo;
    private $descripcion;
    private $precio;

    /**
     * @return mixed
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * @param mixed $editorial
     */
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }


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

    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    
    function libroAlta() {
/*
        try {

        $pdo = new Conexion();
        $query = $pdo->prepare("INSERT INTO editorial (nombre,
        direccion, RFC, telefono) VALUES ('".$this->getNombre()."',
        '".$this->getDireccion()."',
        '".$this->getRFC()."',
        '".$this->getTelefono()."');");

        echo "INSERT INTO editorial (nombre,
        direccion, RFC, telefono) VALUES ('".$this->getNombre()."',
        '".$this->getDireccion()."',
        '".$this->getRFC()."',
        '".$this->getTelefono()."');";

        $query->execute();

           }
        catch(PDOException $e)
        {
            echo $query . "<br>" . $e->getMessage();
        }

        $pdo = null;
*/
    }
    function libroInformacion() {

        try {

        $pdo = new Conexion();
        $query = $pdo->prepare("SELECT * FROM vs_libros2 WHERE id=".$this->getId().";");
        $query->execute();
        $resultado = $query->fetchAll();
        foreach ($resultado as $value) {
            $this->setId($value['id']);
            $this->setTitulo($value['titulo']);
            $this->setDescripcion($value['descripcion']);
            $this->setEditorial($value['nombre']);
            $this->setPrecio($value['precio']);
        }

        }
        catch(PDOException $e)
        {
            echo $query . "<br>" . $e->getMessage();
        }

        $pdo = null;

    }
    function libroModificarGuardar() {
/*
        try {
        
        $pdo = new Conexion();
        $query = $pdo->prepare("UPDATE editorial"
                . " SET nombre = :nombre,"
                . " direccion = :direccion,"
                . " RFC = :RFC,"
                . " telefono = :telefono WHERE id = :id;");
        $query->bindValue(':nombre', $this->getNombre());
        $query->bindValue(':direccion', $this->getDireccion());
        $query->bindValue(':RFC', $this->getRFC());
        $query->bindValue(':telefono', $this->getTelefono());
        $query->bindValue(':id', $this->getId());
        $query->execute();
        
        }
        catch(PDOException $e)
        {
            echo $query . "<br>" . $e->getMessage();
        }

        $pdo = null;
*/
    }
    function libroConsultaCarrito() {
        $pdo = new Conexion();
        $query = $pdo->prepare('SELECT * FROM vs_libros2 ;');
        $query->execute();

        $resultado = $query->fetchAll();

        foreach($resultado as $key => $value) {
        $agregar = '<a href="agregarCarrito.php?art='.$value['id'].'" class="btn btn-primary btn-sm">Agregar a Carrito</a>';
            $librosCarrito[$key] = array(
                $value['id'],
                $value['titulo'],
                $value['descripcion'],
                $value['nombre'],
                $value['precio'],
                $agregar
            );
        }

        return $librosCarrito;
    }
    function agregarCarritoGuardar(){
        /*
        $pdo = new Conexion();
        $query = $pdo->prepare('INSERT INTO detalleventa(IdVenta, IdLibro, cantidad) VALUES (:IdVenta, :IdLibro, :cantidad');
        $query->bindValue(':nombre', $this->getNombre());

        $query->execute();
        */
    }


    

}//Fin de la clase Editorial

