<?php

include_once 'conexion.php';

class usuario
{
private $id;
private $nombre;
private $usuario;
private $password;
private $privilegios;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
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

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPrivilegios()
    {
        return $this->privilegios;
    }

    public function setPrivilegios($privilegios)
    {
        $this->privilegios = $privilegios;
    }

    function usuarioAlta() {

        try {

            $pdo = new Conexion();
            $query = $pdo->prepare("INSERT INTO usuario ("
                . " nombre, usuario, password, privilegios) values("
                . " :nombre, :usuario, :password, :privilegios);");
            $query->bindValue(':nombre', $this->getNombre());
            $query->bindValue(':usuario', $this->getUsuario());
            $query->bindValue(':password', $this->getPassword());
            $query->bindValue(':privilegios', $this->getPrivilegios());
            $query->execute();

        }
        catch(PDOException $e)
        {
            echo $query . "<br>" . $e->getMessage();
        }

        $pdo = null;

    }
}

