<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/assets/fonts/bootstrap-icons.css">
    <script src="<?php echo BASE_URL; ?>app/assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>app/assets/libs/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASE_URL; ?>app/assets/libs/swalert/sweetalert2.all.min.js"></script>
    <style>
      html{
        scroll-behavior: smooth;
      }
      body{
        background-color: rgb(255,222,164);
      }
    </style>
  </head>
  <body>
    <script>const BASE_URL="<?php echo BASE_URL; ?>";</script>
      <main class="container"> <!-- Contenedor principal -->
      <header class="row bg-info bg-gradient p-1 opacity-75 rounded "> <!-- Cabecera -->
      <div class="row">
				<div class="col d-flex justify-content-center">
					<a href="<?php echo BASE_URL; ?>Inicio/index"><img src="<?php echo BASE_URL; ?>app/assets/img/logo.png" width="150px" alt="" class="img-fluid"/></a>
        </div>
			</div>
      <div class="row mt-1">
				<div class="col d-flex justify-content-center">
          <h3>Protectora de animales Sol</h3>					
        </div>
        </div>
        <?php
      if(isset($_SESSION['usuario'])){
        ?>
        <div class="col d-flex justify-content-end"><a class="btn btn-secondary" href="<?php echo BASE_URL; ?>Inicio/logout"><i class="bi bi-person-x"></i> Cerrar sesión</a></div>
          <?php
    }else{
      ?>
        <div class="col d-flex justify-content-end"><a class="btn btn-primary" href="<?php echo BASE_URL; ?>Inicio/login"><i class="bi bi-people"></i> Login</a></div>
        <?php
    }
    ?>
      </header> <!-- Fin cabecera -->