<section class="row mt-5 mb-5 d-flex justify-content-center">
<div class="col-7">
    <form action="<?php echo BASE_URL; ?>Admin/editarUsuario" name="frmPerfil" method="post" autocomplete="off">
    <fieldset class="border rounded p-3 bg-light">
        <div class="mb-3 row">

            <div class="col">
                <p class="fs-3 bg-info bg-gradient opacity-60 border rounded p-1">Bienvenido <?php echo $_SESSION['usuario']['nusuario']; ?>!</p>
                <?php
                if(isset($mensaje)){ ?>
                        <div class="col p-1">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle"></i> <?php echo $mensaje; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                        <?php
                }?> 
                <p class="fst-italic">Estos son sus datos de usuario</p>
                <input type="hidden" name="nusuario" value="<?php echo $_SESSION['usuario']['nusuario']; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="apenom" class="col-sm-3 col-form-label">Apellidos y Nombre</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" autocomplete="new-password" name="apenom" id="apenom" class="form-control" placeholder="Apellidos Nombre" maxlength="50"  value="<?php echo $perfil['apenom']; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nif" class="col-sm-3 col-form-label">NIF</label>
            <div class="col-sm-9">
            <input type="text" pattern="[0-9]{8}[A-Za-z]{1}"  value="<?php echo $perfil['nif']; ?>" class="form-control" autocomplete="new-password" name="nif" id="nif" class="form-control" placeholder="12345678A" maxlength="9">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="dirPostal" class="col-sm-3 col-form-label">Dirección Postal</label>
            <div class="col-sm-9">
            <textarea class="form-control" autocomplete="new-password"  name="dirPostal" id="dirPostal" class="form-control" placeholder="Dirección postal"><?php echo $perfil['dirPostal']; ?></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tel" class="col-sm-3 col-form-label">Teléfono</label>
            <div class="col-sm-9">
            <input type="tel" pattern="[0-9]{9}" class="form-control" autocomplete="new-password"  value="<?php echo $perfil['tel']; ?>" name="tel" id="tel" class="form-control" placeholder="654321987" maxlength="9">
            </div>
        </div>
        <div class="row m-2 text-end">
            <div class="row">
                <div class="col form-switch">
                    <input type="checkbox" id="checkEditar" class="form-check-input">
                    <label for="chexkEditar" class="form-check-label m-2" ><i class="bi bi-clipboard2-check"></i> Editar</label>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success btnEnviar" ><i class="bi bi-card-checklist"></i> Aceptar cambios</button>
                </div>
            </div>
        </div>
    </fieldset>
    </form>
</div>
</section>
<script src="<?php echo BASE_URL; ?>app/views/miPerfil_v.js"></script>