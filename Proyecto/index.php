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
<body Style="background-color: #fddc84;">
<?php
include_once 'barraMenu.php';
$menu = new menu();
$menu->barraMenu();
?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imgs/AT.png" class="d-block w-100" alt="..." height="500px">
    </div>
    <div class="carousel-item">
      <img src="imgs/tmb.jpg" class="d-block w-100" alt="" height="500px">
    </div>
    <div class="carousel-item">
      <img src="imgs/halo.jpg" class="d-block w-100" alt="..." height="500px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
