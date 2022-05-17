<section class="row mb-5 d-flex justify-content-center bg-light">
<div class="col" id="cuerpo">
        <?php 
        foreach ($adopciones as $adopcion){
                    if($_SESSION['usuario']['tipo']=='A' || $adopcion['nusuario']==$_SESSION['usuario']['nusuario']){?>
                        <div class="row d-flex justify-content-center accordion accordion-flush m-3" id="<?php echo $_SESSION['usuario']['nusuario'].$adopcion['idanim']; ?>">
                        <div class="col-10 accordion-item">
                            <div class="card border-success m-3 accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target=".<?php echo $_SESSION['usuario']['nusuario'].$adopcion['idanim']; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                            <h3 class="d-flex justify-content-around"><?php echo '<div class="mx-5">'.$adopcion['nombre'].'</div>'; ?><i class="bi bi-heart-arrow mx-5"></i><i class="bi bi-heart-arrow mx-5"></i><i class="bi bi-heart-arrow mx-5"></i><i class="bi bi-heart-arrow mx-5"></i><i class="bi bi-heart-arrow mx-5"></i><?php echo '<div class="mx-5">'.$adopcion['nusuario'].'</div>'; ?></h3>
                            </button>
                                </div>
                                <div class="card-body align-items-center accordion-collapse collapse flush-collapseOne <?php echo $_SESSION['usuario']['nusuario'].$adopcion['idanim']; ?>" data-bs-parent="#<?php echo $_SESSION['usuario']['nusuario'].$adopcion['idanim']; ?>">
                                    <img src="<?php echo BASE_URL.$adopcion['ruta']; ?>" alt="" height="600px" class="card-img">
                                        <ul class="list-group list-group-flush d-flex align-items-center">
                                            <li class="list-group-item text-center fs-2 fw-bold">Incidencias</li>
                                            <div class="col-8 d-flex justify-content-center">
                                                <div class="row">
                                                            <div class="<?php echo $adopcion['id'].$_SESSION['usuario']['nusuario']; ?>">
                                                                <?php 
                                                                foreach($incidencias as $incidencia){
                                                                    if($incidencia['idadopcion']==$adopcion['id']){?>
                                                                        
                                                                <li class="list-group-item text-center border border-warning rounded m-3 p-2"><i class="bi bi-patch-exclamation"></i> <div class="col fs-5 fw-bold fst-italic m-1"><?php echo $incidencia['incidencia']; ?></div><div class="col-3 fs-6 fst-italic"><?php echo $incidencia['fecha']; ?></div></li>
                                                                <?php } } ?>
                                                            </div>
                                                    <div class="input-group mx-auto mt-5 input-group">
                                                        <textarea class="form-control <?php echo $adopcion['id']; ?>" name="incidencia" cols="50" rows="3" placeholder="Escriba la incidencia..."></textarea>
                                                        <button class="btn btn-info btnEnviar" data-dest="<?php echo $adopcion['id'].$_SESSION['usuario']['nusuario']; ?>" data-id="<?php echo $adopcion['id']; ?>" ><i class="bi bi-patch-exclamation"></i> Enviar incidencia</button>
                                                    </div>
                                                </div>
                                        </ul>
                                                
                                            </div>
                                </div>
                                                
                            </div>
                            
                        </div>
                    </div>
                    <?php } } 
    
         ?>
        </div>
</section>
<script src="<?php echo BASE_URL; ?>app/views/seguimiento_v.js"></script>