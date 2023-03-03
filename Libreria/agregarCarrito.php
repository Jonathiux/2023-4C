<!DOCTYPE html>
<?php

include 'loginSecurity.php';
/*if ($_SESSION['privilegios'] != 'admin') {
    header('location: index.php');
}*/
include_once 'libro.php';
$libro = new libro();
$libro->setId($_GET['art']);
$libro->libroInformacion();


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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

        ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12"><h3 align="center">Agregar Libro al Carrito</h3></div>
                <div class="col-sm-6 col-sm-offset-3">
            <form action="aplicarMovimiento.php" method="post">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong><?php echo $libro->getTitulo(); ?></strong></h3>
                    </div>
                    <div class="panel-body">
                        <input class="form-control" name="libro_id" type="hidden" value="<?php echo $libro->getId();?>">
                        <input class="form-control" name="usuario_id" type="hidden" value="<?php echo $_SESSION['usuario_id']; ?>">
                        <?php
                        echo '<strong>Código: </strong>'.$libro->getId();
                        echo '<br><strong>Descripción: </strong>'.$libro->getDescripcion();
                        echo '<br><strong>Editorial: </strong>'.$libro->getEditorial();
                        echo '<br><strong>Precio: </strong>'.$libro->getPrecio();
                        ?>
                        <div class="form-group">
                            <label class="control-label" for="id">Cantidad:</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Escriba Cantidad" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="agregarCarrito">Agregar</button>
                        <a href="venta.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>

            </form>
                </div>


        </div>
        </div>
        <br>
    </body>
</html>
