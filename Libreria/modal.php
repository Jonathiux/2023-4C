<?php
/*
session_start();
include '../sige/loginSecurity.php';
if ($_SESSION['privilegios'] != 'Administrador' and $_SESSION['privilegios'] != 'Finanzas' and $_SESSION['privilegios'] != 'Dirección') {
    header('location: index.php');
}*/
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Integral de Gestión</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Equipo de Desarrolo">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css"><!-- Editado para el menu -->
    <!--jquery-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!--bootstrap-js-->
    <script src="js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <br>
        <br>
        <p align="center">
            <!-- Botón en HTML que lanza el modal en Bootstrap-->
            <a href="#modal1" role="button" class="btn btn-primary"
               data-toggle="modal">Eliminar</a>
            <!-- Modal / ventana / Overlay en HTML -->
            <div id="modal1" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <h4 class="modal-title">¿Estás seguro? </h4>
                        </div>
                        <div class="modal-body">
                            <p>¿Seguro que quieres borrar el Video?</p>
                            <p class="text-warning"><small><?php echo "poner un texto 1"?></small></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Cancelar</button>
                            <a href="eliminar.php?" type="button" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </p>
        <p align="center">
            <!-- Botón en HTML que lanza el modal en Bootstrap-->
            <a href="#modal2" role="button" class="btn btn-primary"
               data-toggle="modal">Eliminar</a>
            <!-- Modal / ventana / Overlay en HTML -->
            <div id="modal2" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <h4 class="modal-title">¿Estás seguro? </h4>
                        </div>
                        <div class="modal-body">
        <p>¿Seguro que quieres borrar el Video?</p>
        <p class="text-warning"><small><?php echo "poner un texto 2"?></small></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Cancelar</button>
            <a href="otro.php?" type="button" class="btn btn-danger">Otro</a>
        </div>
        </div>
        </div>
        </div>
        </p>
    </div>
</div>
<!-- Fin del modal -->
</body>
</html>
