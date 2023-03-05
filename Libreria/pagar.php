<!DOCTYPE html>
<?php
include 'loginSecurity.php';
?>
<html lang="es">
<head>
        <meta charset="UTF-8">
        <title>Consulta Librería</title>
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Equipo de Desarrollo BPEJ">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>


        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<?php
include_once 'barraMenu.php';
$menu = new menu();
$menu->barraMenu();

include_once 'pago.php';
$pago = new pago();
$pago->setClienteId($_SESSION['usuario_id']);
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
                                <div class="modal fade" id="modal'.$campo.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Elemento del Carrito</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        ¿Seguro que quieres quitar el elemento?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
