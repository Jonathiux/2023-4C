<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <?php
    include_once('barraMenu.php');
    $menu = new menu();
    $menu ->barraMenu();
    ?>
  <div class="container">
    <div class="row">
      <div class="col text-center">
      <br>
      <h3>Alta producto</h3>
      <br>
      </div>
        </div>
          <div class="row">
            <div class="col">
            <form class="row g-3">
  <div class="col-md-4">
    <label for="marca" class="form-label">Marca</label>
    <input type="text" class="form-control" id="marca">
  </div>
  <div class="col-md-4">
    <label for="modelo" class="form-label">Modelo</label>
    <input type="text" class="form-control" id="modelo">
  </div>
  <div class="col-md-4">
    <label for="categoria" class="form-label">Categoría</label>
    <select class="form-select" aria-label="Default select example" name="categoria">
      <option selected>Seleccione una opción</option>
      <option value="1">Videojuego</option>
      <option value="2">Consolas</option>
      <option value="3">Accesorios</option>
    </select>
  </div>
    <div class="col-md-3">
      <br>
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Default checkbox
      </label>
  </div>
    <div class="col-md-3">
      <br>
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
      Default checkbox
      </label>
  </div>
    <div class="col-md-3">
      <br>
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
        Default radio
      </label>
  </div>
    <div class="col-md-3">
      <br>
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
          Default radio
        </label>
    </div>
  </form>
                </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>