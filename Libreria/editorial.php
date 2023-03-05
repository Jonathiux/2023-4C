<?php

include_once 'conexion.php';

class editorial {
    
    private $id;
    private $nombre;
    private $direccion;
    private $rfc;
    private $telefono;
    private $activo;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getRFC() {
        return $this->rfc;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setRFC($rfc) {
        $this->rfc = $rfc;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

       
    
    function editorialAlta() {

        try {

        $pdo = new Conexion();
        $query = $pdo->prepare("INSERT INTO editorial (nombre,
        direccion, rfc, telefono) VALUES ('".$this->getNombre()."',
        '".$this->getDireccion()."',
        '".$this->getRFC()."',
        '".$this->getTelefono()."');");

        $query->execute();

           }
        catch(PDOException $e)
        {
            echo $query . "<br>" . $e->getMessage();
        }

        $pdo = null;

    }
    function editorialModificar() {

        try {

        $pdo = new Conexion();
        $query = $pdo->prepare("SELECT * FROM editorial WHERE id=".$this->getId().";");
        $query->execute();
        $resultado = $query->fetchAll();
        foreach ($resultado as $value) {
            $this->setId($value['id']);
            $this->setNombre($value['nombre']);
            $this->setDireccion($value['direccion']);
            $this->setRFC($value['rfc']);
            $this->setTelefono($value['telefono']);
            $this->setActivo($value['activo']);
        }

        }
        catch(PDOException $e)
        {
            echo $query . "<br>" . $e->getMessage();
        }

        $pdo = null;

    }
    function editorialModificarGuardar() {

        try {
        
        $pdo = new Conexion();
        $query = $pdo->prepare("UPDATE editorial"
                . " SET nombre = :nombre,"
                . " direccion = :direccion,"
                . " rfc = :rfc,"
                . " telefono = :telefono,"
                . " activo = :activo WHERE id = :id;");
        $query->bindValue(':nombre', $this->getNombre());
        $query->bindValue(':direccion', $this->getDireccion());
        $query->bindValue(':rfc', $this->getRFC());
        $query->bindValue(':telefono', $this->getTelefono());
        $query->bindValue(':activo', $this->getActivo());
        $query->bindValue(':id', $this->getId());
        $query->execute();
        
        }
        catch(PDOException $e)
        {
            echo $query . "<br>" . $e->getMessage();
        }

        $pdo = null;

    }
    function editorialConsulta() {

        $pdo = new Conexion();
        $query = $pdo->prepare('SELECT * FROM editorial WHERE activo=1;');
        $query->execute();
        
        
        $resultado = $query->fetchAll();
        
        foreach ($resultado as $key => $value) {
        $modificar='<a href="editorialModificar.php?id='.$value['id'].'" class="btn btn-primary">Modificar</a>';
          $editorial[$key] = array(
                $value['id'],
                $value['nombre'],  
                $value['direccion'],
                $value['telefono'],
                $value['rfc'],
                $modificar
            );
        }
 
        return $editorial;

    }


    

}//Fin de la clase Editorial

