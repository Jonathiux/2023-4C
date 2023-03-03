<!DOCTYPE html>
<?php
include 'loginSecurity.php';
/*if ($_SESSION['privilegios'] != 'admin') {
    header('location: index.php');
}*/



?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Consulta Librería</title>
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Equipo de Desarrollo BPEJ">
        <!--bootstrap-->
        <link rel="stylesheet" href="css/bootstrap.css"><!-- Editado para el menu -->
        <!--jquery-->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!--bootstrap-js-->
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body>
        <?php
        include 'barraMenu.php';
        $menu = new menu();
        $menu->barraMenu();

        include_once 'libro.php';
        $libros = new libro();
        $listado = $libros->libroConsulta();
        ?>

        <div class="container">
            <div class="row">
                <h3>Elegir Productos</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Comprar</th>
                </tr>
                </thead>
                <tbody>
            <?php
            foreach ($listado as $fila){
                echo '<tr>';
                foreach ($fila as $campo) {
                    echo '<td>'.$campo.'</td>';
                }
                echo '</tr>';
            }
            ?>
                </tbody>
        </table>
        </div>
        </div>
        <br>
    </body>
</html>
