<?php
class menu {
    function barraMenu() {
        ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CafeLibro</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Recomendaciones</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Editoriales
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="editorialAlta.php">Editorial Alta</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="editorialConsulta.php">Editorial Consulta</a></li>
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
                    <!--<form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    -->
                </div>
            </div>
        </nav>

            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-7"><img class="img-responsive" src="images/cafelibro.jpg"  width="250"  style="padding-top: 8%"></div>
                    <div class="col-lg-5"><img class="img-responsive" src="images/libreria.jpg"  width="300" style="padding-top: 8%"></div>

                </div>
            </div>
    <?php           
    }

}
 
