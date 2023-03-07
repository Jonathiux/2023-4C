<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GamesPro</title>
    <link rel="shortcut icon" href="imgs/pacman.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jonathan Alberto López">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">


</head>
<body>
<?php
include_once 'barraMenu.php';
$menu = new menu();
$menu->barraMenu();
include_once 'Producto.php';
$producto = new Producto();
$producto->setIdProducto($_GET['idProducto']);
$producto->ProductoModificar();
?>
<div class="container">
    <div class="page-header">
        <br>
        <h3 style="text-align: center">Editar Producto</h3>
    </div>
    <form class="form-horizontal" action="aplicarMovimiento.php" method="post"
          onsubmit="return confirm('¿Seguro que quieres guardar este formulario?');">
        <div class="mb-3">
            <label for="idProducto" class="form-label">Codigo</label>
            <input type="text" class="form-control" id="idProducto" name="idProducto" required
                   value="<?php echo $producto->getIdProducto(); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="Nombre" required
                   value="<?php echo $producto->getNombre(); ?>">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="Descripcion" required
                   value="<?php echo $producto->getDescripcion(); ?>">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="precio" name="Precio" required
                   value="<?php echo $producto->getPrecio(); ?>">
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="text" class="form-control" id="cantidad" name="Cantidad" required
                   value="<?php echo $producto->getCantidad(); ?>">
        </div>
        <div class="col-md-4">
            <label for="idCat" class="form-label">Categoría</label>
            <select class="form-select" id="idCat" aria-label="Default select example" name="idCat" required>
                <option selected>Seleccione una opción</option>
                <option value="1">Videojuego</option>
                <option value="2">Consolas</option>
                <option value="3">Accesorios</option>
                <option value="4">Ropa</option>
            </select>
        </div>
        <br>
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" name="ProductoModificarGuardar">Guardar</button>
            <a class="btn btn-danger" href="index.php" role="button">Regresar</a>
        </div>

</div>
</form>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>