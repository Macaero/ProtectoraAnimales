<nav class="row navbar bg-light"> <!-- Menu principal -->
<ul class="nav nav-tabs d-flex justify-content-center col-4">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="<?php echo BASE_URL; ?>Inicio/index">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo BASE_URL; ?>Animal/index">Nuestros animales</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo BASE_URL; ?>Animal/verAdopciones">Adoptados</a>
  </li>
  </ul>
    <?php
      if(isset($_SESSION['usuario'])){
        ?>
        <ul class="nav nav-tabs d-flex justify-content-center col-6">
          <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>Admin/miPerfil"><i class="bi bi-person-lines-fill"></i> Mi perfil</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>Donaciones/index"><i class="bi bi-paypal"></i> Donaciones</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>Admin/avisos"><i class="bi bi-exclamation-diamond"></i> Avisos</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>Animal/seguimiento"><i class="bi bi-hearts"></i> Mis adopciones</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>Chat/index"><i class="bi bi-chat-dots"></i> Chat</a></li>
        </ul>
  <div class="col-2">
    <div class="btn-group">
      <button type="button" class="btn btn-light text-primary"><i class="bi bi-house-door"></i> <?php echo $_SESSION['usuario']['nusuario']; ?></button>
      <button type="button" class="btn btn-light text-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
      </button>
      <ul class="dropdown-menu p-3 text-center">
        <li><strong>¡Bienvenido <?php echo $_SESSION['usuario']['nusuario']; ?>!</strong></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="nav-link dropdown-item" href="<?php echo BASE_URL; ?>Admin/miPerfil"><i class="bi bi-person-lines-fill"></i> Mi perfil</a></li>
        <li><a class="nav-link dropdown-item" href="<?php echo BASE_URL; ?>Donaciones/index"><i class="bi bi-paypal"></i> Donaciones</a></li>
        <li><a class="nav-link dropdown-item" href="<?php echo BASE_URL; ?>Admin/avisos"><i class="bi bi-exclamation-diamond"></i> Avisos</a></li>
        <li><a class="nav-link dropdown-item" href="<?php echo BASE_URL; ?>Animal/seguimiento"><i class="bi bi-hearts"></i> Mis adopciones</a></li>
        <li><a class="nav-link dropdown-item" href="<?php echo BASE_URL; ?>Chat/index"><i class="bi bi-chat-dots"></i> Chat</a><span id="badgeChat" class="position-absolute top-100 start-100 translate-middle badge rounded-pill bg-danger"></span></li>
      </ul>
    </div>
  </div>
        <?php
    }
    ?>
</nav> <!-- Fin menu -->
<script src="<?php echo BASE_URL; ?>app/views/plantilla/menu.js"></script>