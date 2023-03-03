<?php
/*
include 'loginSecurity.php';
if ($_SESSION['privilegios'] != 'admin') {
    header('location: index.php');
}
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Librería Café Libro</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Equipo de Desarrollo BPEJ">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">


</head>
<body>
<?php
include_once 'barraMenu.php';
$menu = new menu();
$menu->barraMenu();
include_once 'editorial.php';
$editorial = new editorial();
$editorial->setId($_GET['id']);
$editorial->editorialModificar();
?>
<div class="container">
    <div class="page-header">
        <br>
        <h3 style="text-align: center">Editar Editorial</h3>
    </div>
    <form class="form-horizontal" action="aplicarMovimiento.php" method="post"
          onsubmit="return confirm('¿Seguro que quieres guardar este formulario?');">
        <div class="mb-3">
            <label for="id" class="form-label">Código</label>
            <input type="text" class="form-control" id="id" name="id" required
                   value="<?php echo $editorial->getId(); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="Nombre" placeholder="Nombre" required
                   value="<?php echo $editorial->getNombre(); ?>">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required
                   value="<?php echo $editorial->getDireccion(); ?>">
        </div>
        <div class="mb-3">
            <label for="rfc" class="form-label">RFC</label>
            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC" required
                   value="<?php echo $editorial->getRFC(); ?>">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required
                   value="<?php echo $editorial->getTelefono(); ?>">
        </div>
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" name="editorialModificarGuardar">Guardar</button>
            <a class="btn btn-danger" href="index.php" role="button">Regresar</a>
        </div>
</div>
</form>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

