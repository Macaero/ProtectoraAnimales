<section class="row mb-5 d-flex justify-content-center">
    <div class="col-8 mt-5">
        <div class="row m-1 p-4 bg-light border border-secondary rounded" id="chat">
            <?php
            foreach($mensajes as $mensaje){
                if($mensaje['idusu']==$_SESSION['usuario']['id']){ ?>
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
            <input type="text" class="form-control p-2 fs-5" placeholder="Escriba su mensaje..." id="mensaje" >
            <button class="btn btn-outline-secondary btn-light p-2 fs-5" type="button" id="btnEnviar"><i class="bi bi-send"></i> Enviar</button>
        </div>
    </div>
</section>
<script src="<?php echo BASE_URL; ?>app/views/chat_v.js"></script>