<section class="row mb-5 d-flex justify-content-center">
    <?php foreach($usuarios as $usuario){ 
        if($usuario['id']!=$_SESSION['usuario']['id']){ ?>
        <div class="accordion accordion-flush" id="<?php echo $usuario['nusuario']; ?>">
            <div class="accordion-item">
                <div class="accordion-header">
                <button class="accordion-button collapsed fs-4 m-1 btnAbrir" data-destino="<?php echo $usuario['nusuario'].$usuario['nusuario']; ?>" data-id="<?php echo $usuario['id']; ?>" type="button" data-bs-toggle="collapse" data-bs-target=".<?php echo $usuario['nusuario']; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                    <?php echo $usuario['nusuario']; ?>
                </button>
                </div>
                <div class="collapseOne accordion-collapse collapse <?php echo $usuario['nusuario']; ?>" data-bs-parent="#<?php echo $usuario['nusuario']; ?>">
                    <div class="accordion-body">
                        <div class="col-8 mx-auto mt-5">
                            <div class="row m-1 p-4 bg-light border border-secondary rounded <?php echo $usuario['nusuario'].$usuario['nusuario']; ?>">
                                <?php
                                foreach($mensajes as $mensaje){
                                    if($mensaje['idusu']==$usuario['id']){ ?>
                                    <div class="row m-2 d-flex <?php if($mensaje['admin']==1){echo "justify-content-end";} ?>">
                                        <div class="col-8 bg-light border <?php if($mensaje['admin']==1){echo "border-primary";}else{ echo "border-success";} ?> rounded d-flex justify-content-around p-2">
                                            <div class="col fs-4 p-1"><?php echo $mensaje['mensaje']; ?></div>
                                            <div class="col-3 fs-6 fst-italic"><?php echo $mensaje['fecha']; ?></div>
                                            <?php if($mensaje['leido']==1){ ?>
                                                <div class="col-3 fs-6 fst-italic"><i class="bi bi-check2-all"></i> </div>
                                                <?php
                                            } ?>
                                        </div>
                                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="input-group mb-3 p-2">
            <input type="text" class="form-control p-2 fs-5 <?php echo $usuario['nusuario'].$usuario['id']; ?>" placeholder="Escriba su mensaje...">
            <button class="btn btn-outline-secondary btn-light p-2 fs-5 btnEnviar" type="button" data-destino="<?php echo $usuario['nusuario'].$usuario['nusuario']; ?>" data-valor="<?php echo $usuario['nusuario'].$usuario['id']; ?>" data-id="<?php echo $usuario['id']; ?>"><i class="bi bi-send"></i> Enviar</button>
        </div>
    </div>
            </div>
            </div>
        </div>
    <?php
    }
} ?>
</section>
<script src="<?php echo BASE_URL; ?>app/views/admin/chat_v.js"></script>