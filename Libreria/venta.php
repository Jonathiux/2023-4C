<!DOCTYPE html>
<?php


//include 'loginSecurity.php';
/*
if ($_SESSION['privilegios'] != 'Administrador' and $_SESSION['privilegios'] != 'Finanzas' and $_SESSION['privilegios'] != 'Dirección') {
    header('location: index.php');
}*/
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BPEJ. Sistema Integral de Gestión</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="YO">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css"><!-- Editado para el menu -->
    <!--jquery-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!--bootstrap-js-->
    <script src="js/bootstrap.min.js"></script>

</head>
<body>
<?php
include_once 'barraMenu.php';
$menu = new menu();
$menu->barraMenu();

include_once 'libro.php';
$libro = new libro();
$arreglo = $libro->libroConsultaCarrito();
?>
<div class="container">
    <div class="row">
        <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Código Libro</th>
            <th scope="col">Título</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col" colspan="2">Precio</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($arreglo as $fila){
                echo '<tr>';
                foreach ($fila as $campo){
                    echo '<td>'.$campo.'</td>';
                }
                echo '</tr>';
            }

        ?>
        </tbody>
    </div>
</div>
</body>
