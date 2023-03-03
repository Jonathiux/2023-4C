<!DOCTYPE html>

<?php
//include 'loginSecurity.php';
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GamesPro</title>
    <link rel="shortcut icon" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>

</head>
<body>
<?php
/*
        include 'barraMenu.php';
        $menu = new menu();
        $menu ->barraMenu();
*/
date_default_timezone_set("America/Mexico_City");

if (isset($_POST['ProductoAlta']))//Valida si se envía el formulario
{
    //print_r($_POST);
    include_once 'Producto.php';
    $producto = new Producto();
    $producto->setNombre($_POST['Nombre']);
    $producto->setDescripcion($_POST['Descripcion']);
    $producto->setPrecio($_POST['Precio']);
    $producto->setCantidad($_POST['Cantidad']);
    $producto->setIdCat($_POST['idCat']);
    $producto->ProductoAlta();
    ?>

    <div class="container">
        <br>
        <a href="areaAlta.php" class="btn btn-default">Crear nuevo Registro</a>
        <a href="index.php" class="btn btn-default">Salir</a></center>
    </div>
    <?php
}
elseif (isset($_POST['ProductoModificarGuardar']))//Valida si se envía el formulario
{
print_r($_POST);
include_once 'Producto.php';
$producto = new Producto();
$producto->setIdProducto($_POST['idProducto']);
$producto->setNombre($_POST['Nombre']);
$producto->setDescripcion($_POST['Descripcion']);
$producto->setPrecio($_POST['Precio']);
$producto->setCantidad($_POST['Cantidad']);
$producto->setIdCat($_POST['idCat']);
$producto->ProductoModificarGuardar();


?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-2"></div>
        <div class="col-md-auto">
            <img src="imgs/mario.jpg" height="80px" width="40px">El registro se actualizó correctamente</div>
        <div class="col col-lg-2"></div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col col-lg-2">

        </div>
        <div class="col-md-auto">
            <a href="editorialConsulta.php" class="btn btn-primary">Regresar</a>
            <a href="index.php" class="btn btn-danger">Salir</a>
        </div>
        <div class="col col-lg-2">

        </div>
    </div>
    <br>
    <center><a href="areaConsulta.php?m=M" class="btn btn-default">Regresar</a>
        <a href="index.php" class="btn btn-default">Salir</a></center>
</div>
<?php
}
