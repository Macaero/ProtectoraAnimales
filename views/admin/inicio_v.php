<section class="row d-flex flex-wrap" style="background-image: url('<?php echo BASE_URL; ?>app/assets/img/fondo.jpg'); opacity:.8;">
    <div class="col-12 fs-1 text-light fst-italic fw-bold m-3 ">Bienvenido <?php echo $_SESSION['usuario']['nusuario']; ?></div>
    <div class="col-5 m-4 p-3"><a class="btn btn-outline-info bg-light m-5 p-3 fs-1 rounded" href="<?php echo BASE_URL; ?>Admin/manusu"><i class="bi bi-person-lines-fill"></i> Usuarios</a></div>
    <div class="col-5 m-4 p-3"><a class="btn btn-outline-info bg-light m-5 p-3 fs-1 rounded" href="<?php echo BASE_URL; ?>Admin/mananim"><i class="bi bi-hearts"></i> Animales</a></div>
    <div class="col-5 m-4 p-3"><a class="btn btn-outline-info bg-light m-5 p-3 fs-1 rounded" href="<?php echo BASE_URL; ?>Animal/seguimiento"><i class="bi bi-card-checklist"></i> Seguimientos</a></div>
    <div class="col-5 m-4 p-3"><a class="btn btn-outline-info bg-light m-5 p-3 fs-1 rounded" href="<?php echo BASE_URL; ?>Admin/avisos"><i class="bi bi-exclamation-diamond"></i> Avisos</a></div>
    <div class="col-5 m-4 p-3"><a class="btn btn-outline-info bg-light m-5 p-3 fs-1 rounded" href="<?php echo BASE_URL; ?>Chat/index"><i class="bi bi-chat-dots"></i> Chat</a></div>
</section>