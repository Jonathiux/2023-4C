<?php

include_once 'conexion.php';

class pago{
    private $IdCliente;
    private $IdLibro;
    private $titulo;
    private $nombre;
    private $descripcion;
    private $precio;
    private $cantidad;

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->IdCliente;
    }

    /**
     * @param mixed $IdCliente
     */
    public function setIdCliente($IdCliente)
    {
        $this->IdCliente = $IdCliente;
    }

    /**
     * @return mixed
     */
    public function getIdLibro()
    {
        return $this->IdLibro;
    }

    /**
     * @param mixed $IdLibro
     */
    public function setIdLibro($IdLibro)
    {
        $this->IdLibro = $IdLibro;
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
        $query = $pdo->prepare('SELECT * FROM vs_pago WHERE activo=1 AND IdCliente=:IdCliente');
        $query->bindValue(':IdCliente', $this->getIdCliente());
        $query->execute();
        $resultado = $query->fetchAll();
        foreach($resultado as $key => $value) {
        $subtotal = $value['precio'] * $value['cantidad'];
        $eliminar = '<a href="#modal'.$value['IdCarrito'].'" role="button" class="btn btn-danger"
               data-toggle="modal">Quitar</a>';
        $precio = number_format($value['precio'], 2, '.',',');
        $subtotalFormato = number_format($subtotal, 2, '.',',');
        $items[$key] = array(
                $value['IdCarrito'],
                $value['IdLibro'],
                $value['titulo'],
                $value['nombre'],
                $value['descripcion'],
                '$ '.$precio,
                $value['cantidad'],
                $subtotal,
                $eliminar
            );
        }

        return $items;
    }

}

