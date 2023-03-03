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
        <title>BPEJ. Sistema Integral de Gestión</title>
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Valentín Camacho Veloz, Daniel Flores Rodriguez, Brian Valentín Franco, Nancy García Mesillas">
        <!--bootstrap-->
        <link rel="stylesheet" href="css/bootstrap.css"><!-- Editado para el menu -->
        <!--jquery-->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!--bootstrap-js-->
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body>
        <?php
        /*
        include 'barraMenu.php';
        $menu = new menu();
        $menu ->barraMenu();
        */
        include_once 'editorial.php';
        $editorial = new editorial();
        $editorial->setId($_GET['id']);
        $editorial->editorialModificar();
        ?>
        <div class="container">
          <div class="page-header">
              <h3 style="text-align: center">Modificar Editorial</h3>
          </div>
            <form class="form-horizontal" action="aplicarMovimiento.php" method="post" onsubmit="return confirm('¿Seguro que quieres guardar este formulario?');">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">Id Editorial:</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="id" name="id" value="<?php echo $editorial->getId() ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="nombre">Nombre:</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $editorial->getNombre(); ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="direccion">Dirección:</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $editorial->getDireccion() ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="RFC">RFC:</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="RFC" name="RFC" value="<?php echo $editorial->getRFC(); ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="telefono">Tipo:</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $editorial->getTelefono(); ?>" required>
              </div>
            </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="estatus">Estatus:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="activo">
                            <?php
                                if($editorial->getActivo()==1){
                                    echo '<option value="1" selected>Activo</option>';
                                    echo '<option disabled>Cambiar Estatus</option>';
                                    echo '<option value="0">Eliminar</option>';
                                } else{
                                    echo '<option value="0" selected>Eliminado</option>';
                                    echo '<option disabled>Cambiar Estatus</option>';
                                    echo '<option value="1">Restaurar</option>';
                                }
                                ?>


                        </select>


                    </div>
                </div>
  
              <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" name="editorialModificarGuardar">Guardar</button>
                <a href="editorialConsulta.php" class="btn btn-default">Regresar</a>
              </div>
            </div>
          </form>
        </div>  
    </body>
</html>

