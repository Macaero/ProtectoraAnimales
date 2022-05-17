<section class="row mb-5 d-flex justify-content-center">
    <div class="col-12 fs-2 fw-bold text-center m-3 d-flex justify-content-around"><i class="bi bi-exclamation-triangle"></i><div>Avisos</div><i class="bi bi-exclamation-triangle"></i></div>
    <div class="contenedor col m-1 p-1">
        <?php
            foreach($avisos as $aviso){ ?>
            <div class="alert alert-info d-flex justify-content-between" role="alert"><i class="bi bi-info-circle fs-3"></i><div class="fw-bolder"><?php echo $aviso['mensaje']; ?></div><div class="col-3 text-end fs-6 fst-italic"><?php echo $aviso['nusuario']."   ".$aviso['fecha']; ?></div><?php if($_SESSION['usuario']['tipo']=="A"){echo '<button class="btnResolver btn fw-bold fs-5 text-danger col-2" data-id="'.$aviso['id'].'"><i class="bi bi-shield-exclamation "></i> Resolver aviso</button>';} ?></div>
        <?php    }
        ?>
    </div>
    <div class="input-group mx-auto mt-5 input-group">
        <textarea class="form-control" name="aviso" id="aviso" cols="50" rows="3" placeholder="Escriba el aviso..."></textarea>
        <button class="btn btn-warning btnEnviar fs-4" data-id="<?php echo $idAdopcion['id']; ?>" ><i class="bi bi-patch-exclamation"></i> Dar aviso</button>
    </div>
</section>
<script src="<?php echo BASE_URL; ?>app/views/avisos_v.js"></script> 