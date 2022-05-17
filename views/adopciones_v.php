<section class="row mb-5 d-flex justify-content-center">
<div class="col" id="cuerpo">
<?php
   if(isset($mensaje)){
       ?>
       <div class="col p-1">
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <i class="bi bi-check-circle"></i> <?php echo $mensaje; ?>
           <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
           </div>
       </div>
       <?php
   }
   ?>
        <?php foreach ($adopciones as $adopcion){
            if($adopcion['principal']==1){ ?>
            <div class="row d-flex justify-content-center">
                <div class="col-8">
                    <div class="card border-success m-3">
                        <h3 class="card-header"><?php echo $adopcion['nombre']; ?></h3>
                        <div class="card-body  align-items-center">
                            <img src="<?php echo BASE_URL.$adopcion['ruta']; ?>" alt="" height="500px" class="card-img">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <table class="table">
                                            <tr>
                                                <td class="text-center"><h5>Raza</h5> <?php echo $adopcion['raza']; ?></td>
                                                <td class="text-center"><h5>Sexo</h5> <?php echo $adopcion['sexo']=='H' ? "Hembra" : "Macho"; ?></td>
                                                <td class="text-center"><h5>Edad</h5> <?php echo $adopcion['edad']; ?> años</td>
                                                <td class="text-center"><h5>Color</h5> <?php echo $adopcion['color']; ?></td>
                                            </tr>
                                        </table>
                                    </li>
                                        <li class="list-group-item"><h5><?php echo $adopcion['tipo']=='P' ? ($adopcion['sexo']=='H' ? "Esta preciosa perrita" : "Este precioso perrito") : ($adopcion['sexo']=='H' ? "Esta preciosa gatita" : "Este precioso gatito"); ?> ha encontrado su familia con <?php echo $adopcion['nusuario']; ?>. ¡Que seais muy felices! <i class="bi bi-balloon-heart"></i></h5></li>
                                </ul>
                                <?php if(isset($_SESSION['usuario'])){

                                    if($_SESSION['usuario']['id']==$adopcion['idusu']){ ?>
                                <div class="col d-flex justify-content-center">
                                    <a href="<?php echo BASE_URL; ?>Animal/seguimiento" class='btn btn-success mt-2 btnFicha'><i class="bi bi-heart-pulse"></i> Ir a mis adopciones</a>
                                </div>
                                <?php } if($_SESSION['usuario']['tipo']=='A'){ ?>
                                    <div class="col d-flex justify-content-center">
                                        <a href="<?php echo BASE_URL; ?>Animal/seguimiento" class='btn btn-success mt-2 btnFicha'><i class="bi bi-heart-pulse"></i> Ir a seguimientos</a>
                                    </div>
                                    <?php } 
                                }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php   }
        } ?>
        </div>
</section>