<?php

include_once 'conexion.php';

class pago{
    private $cliente_id;
    private $libro_id;
    private $titulo;
    private $nombre;
    private $descripcion;
    private $precio;
    private $cantidad;

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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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
    public function procesarPago(){
        $pdo = new Conexion();
        $query = $pdo->prepare('SELECT * FROM vs_pago WHERE activo=1 AND cliente_id=:cliente_id');
        $query->bindValue(':cliente_id', $this->getClienteId());
        $query->execute();
        $resultado = $query->fetchAll();
        foreach($resultado as $key => $value) {
        $subtotal = $value['precio'] * $value['cantidad'];

        $eliminar = '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal'.$value['id'].'">
                Quitar</button>';
        $precio = number_format($value['precio'], 2, '.',',');
        $subtotalFormato = number_format($subtotal, 2, '.',',');
        $items[$key] = array(
                $value['id'],
                $value['libro_id'],
                $value['titulo'],
                $value['nombre'],
                $value['descripcion'],
                '$ '.$precio,
                $value['cantidad'],
            $subtotalFormato,
                $eliminar
            );
        }

        return $items;
    }

}

