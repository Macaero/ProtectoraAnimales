<section class="row"> <!-- Contenido -->
      <div class="col-4 mx-auto mt-5 mb-">
            <form action="<?php echo BASE_URL; ?>Inicio/comprobarLogin" method="post">
                   <fieldset class="border rounded p-3 bg-light mb-5">
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
                       <div class="p-3">
                           <div class="input-group mb-3">
                               <span class="input-group-text" id="basic-addon1"><i class="bi bi-at"></i></span>
                               <input type="text" id="nusuario" name="nusuario" class="form-control" placeholder="Nombre de usuario o email" aria-label="Nombre de usuario o email">
                           </div>
                           <div class="input-group mb-3">
                               <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                               <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" aria-label="Contraseña">
                           </div>
                           <div class="d-grid gap-2">
                             <button type="submit" name="btnLogin" id="btnLogin" class="btn btn-primary">Iniciar Sesion</button>
                           </div>
                       </div>
                       <span> No tienes cuenta? <a href="<?php echo BASE_URL; ?>Inicio/registro">Regístrate!</a></span>
                   </fieldset>
            </form>
        </div>
</section> <!-- Fin contenido -->