<?php
class menu {
    function barraMenu() {
        ?>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="imgs/Pacman.png" alt="Logo" width="35" height="45" class="d-inline-block">
                    GamesPro
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Recomendaciones</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Productos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="ProductoAlta.php">Producto Alta</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="">Producto Consulta</a></li>
                                <?php
                                /* if ($_SESSION['privilegios'] == 'Administrador')
                                 {
                                     echo '<li><a href="#">Opción</a></li>';
                                     echo '<li><a href="#">Opción</a></li>';
                                 }*/
                                ?>
                            </ul>
                        </li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
    <?php           
    }

}
 
