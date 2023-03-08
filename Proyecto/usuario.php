<?php

include_once 'conexion.php';

class usuario
{
private $idUsuario;
private $nombre;
private $usuario;
private $contraseña;
private $privilegios;
private $telefono;
private $direccion;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setId($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }

    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    public function getPrivilegios()
    {
        return $this->privilegios;
    }

    public function setPrivilegios($privilegios)
    {
        $this->privilegios = $privilegios;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }


    function usuarioAlta() {

        try {

            $pdo = new Conexion();
            $query = $pdo->prepare("INSERT INTO usuario ("
                . " nombre, usuario, contraseña, privilegios, telefono, direccion) values("
                . " :nombre, :usuario, :contraseña, :privilegios, :telefono, :direccion);");
            $query->bindValue(':nombre', $this->getNombre());
            $query->bindValue(':usuario', $this->getUsuario());
            $query->bindValue(':contraseña', $this->getContraseña());
            $query->bindValue(':privilegios', $this->getPrivilegios());
            $query->bindValue(':telefono', $this->getTelefono());
            $query->bindValue(':direccion', $this->getDireccion());
            $query->execute();

        }
        catch(PDOException $e)
        {
            echo $query . "<br>" . $e->getMessage();
        }

        $pdo = null;

    }
}

