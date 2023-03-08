<?php
//include 'loginSecurity.php';
?>
<!Doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestion de carrito</title>
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

echo 'idCarrito '.$_GET['idCarrito'];
include_once 'carrito.php';
$carrito = new carrito();
$carrito->setIdCarrito($_GET['idCarrito']);
$carrito->bajaCarrito();
header('Location: CarritoCons.php');
?>
<h1>El objeto se ha quitado del carrito</h1>

<a href="CarritoCons.php" class="btn btn-success">Regresar al Carrito</a>
</body>
</html>
