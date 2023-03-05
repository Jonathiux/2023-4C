<!DOCTYPE html>

<?php
 //include 'loginSecurity.php';
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Librería Cafe Libro</title>
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
        <script src="https://kit.fontawesome.com/1592869686.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <?php
/*
        include 'barraMenu.php';
        $menu = new menu();
        $menu ->barraMenu();
*/
        date_default_timezone_set("America/Mexico_City");
        
        if(isset($_POST['editorialAlta']))//Valida si se envía el formulario
        {
            //print_r($_POST);
            include_once 'editorial.php';
            $editorial = new editorial();
            $editorial->setNombre($_POST['nombre']);
            $editorial->setDireccion($_POST['direccion']);
            $editorial->setRFC($_POST['rfc']);
            $editorial->setTelefono($_POST['telefono']);
            $editorial->editorialAlta();
        ?>
            <div class="container">
                <br>
                <center><a href="areaAlta.php" class="btn btn-default">Crear nuevo Registro</a>
                    <a href="index.php" class="btn btn-default">Salir</a></center>
            </div>
        <?php
        }
        elseif (isset($_POST['editorialModificarGuardar']))//Valida si se envía el formulario
        {
            include_once 'editorial.php';
            $editorial = new editorial();
            $editorial->setId($_POST['id']);
            $editorial->setNombre($_POST['nombre']);
            $editorial->setDireccion($_POST['direccion']);
            $editorial->setRFC($_POST['rfc']);
            $editorial->setTelefono($_POST['telefono']);
            $editorial->setActivo(1);
            $editorial->editorialModificarGuardar();

        
        ?>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2"> </div>
                    <div class="col-md-auto"><h3><img src="images/success.png">El registro se actualizó correctamente</h3></div>
                    <div class="col col-lg-2"> </div>
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


            </div>
        <?php
        }
        elseif (isset($_POST['usuarioAlta']))//Valida si se envía el formulario
        {

            include_once 'usuario.php';
            $usuario = new usuario();
            $usuario->setNombre($_POST['firstname']." ".$_POST['lastname']);
            $usuario->setUsuario($_POST['usuario']);
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $usuario->setPassword($hashed_password);
            $usuario->setPrivilegios('General');
            $usuario->usuarioAlta();


            ?>
            <div class="container">
                <br>
                <center><a href="areaConsulta.php?m=M" class="btn btn-default">Regresar</a>
                    <a href="index.php" class="btn btn-default">Salir</a></center>
            </div>
            <?php
        }
        elseif (isset($_POST['agregarCarrito']))//Valida si se envía el formulario
        {

            include_once 'carrito.php';
            $carrito = new carrito();
            $carrito->setLibroId($_POST['libro_id']);
            $carrito->setClienteId($_POST['usuario_id']);
            $carrito->setCantidad($_POST['cantidad']);
            $carrito->altaCarrito();


            ?>
            <div class="container">
                <hr>
                <p><i class="far fa-check-circle"></i></p>
               <h3 align="center">El registro se guardo exitosamente</h3>
                <p align="center"><br>
                <a href="venta.php" class="btn btn-primary">Seleccionar otro Artículo</a>
                    <a href="pagar.php" class="btn btn-success">Pagar</a></center>
                </p>
            </div>
            <?php
        }
        ?>
    </body>
</html>
