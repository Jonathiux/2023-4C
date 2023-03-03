<!DOCTYPE html>
<?php
include 'loginSecurity.php';
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

include_once 'pago.php';
$pago = new pago();
$pago->setIdCliente($_SESSION['IdUsuario']);
$listado = $pago->procesarPago();
?>
<div class="container">
    <div class="row">
        <h3 align="center">Pagar</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">IdCarrito</th>
                        <th scope="col">Código Libro</th>
                        <th scope="col">Título</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Eliminar del Carrito</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $subtotal=0;
                    $cont=0;
                    foreach ($listado as $fila){
                        echo '<tr>';
                        $cont=0;
                        foreach ($fila as $campo) {
                            if($cont==7){
                                $subtotal+=$campo;
                            }
                            if($cont==0){
                                echo '
                                        <!-- Modal / ventana / Overlay en HTML -->
                                    <div id="modal'.$campo.'" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Eliminar Elemento del Carrito </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Seguro que quieres quitar el elemento?</p>
                                                    <p class="text-warning"><small><?php echo "poner un texto 1"?></small></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Cancelar</button>
                                    <a href="quitarElemento.php?IdCarrito='.$campo.'" type="button" class="btn btn-danger">Quitar</a>
                                </div>
                            </div>
                            </div>
                            </div>';
                            }

                            $cont++;
                            echo '<td>'.$campo.'</td>';
                        }
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
        <br>
        <h3 align="right"><?php echo "Subtotal: ".$subtotal; ?></h3>
        <h3 align="right"><?php echo "IVA: ".$subtotal*0.16; ?></h3>
        <h3 align="right"><?php echo "Total: ".$subtotal*1.16; ?></h3>

    </div>
</div>
</body>
</html>
