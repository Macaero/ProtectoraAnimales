<section class="row mt-5 mb-5 d-flex justify-content-center">
<div class="col-7">
    <form action="<?php echo BASE_URL; ?>Inicio/insertarUsuario" name="frmRegistro" method="post" autocomplete="off">
    <fieldset class="border rounded p-3 bg-light">
        <div class="mb-3 row">
            <label for="nusuario" class="col-sm-3 col-form-label">Nombre de usuario</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" autocomplete="new-password" name="nusuario" id="nusuario" class="form-control" placeholder="Nombre de usuario" required autofocus maxlength="20">
            </div>
            <div id="mensajeN" class="col-sm-10 alert alert-warning m-1"><i class="bi bi-exclamation"></i> El nombre de usuario introducido ya está en uso</div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
            <input type="email" class="form-control" autocomplete="new-password" name="email" id="email" class="form-control" placeholder="Email" required maxlength="50">
            </div>
            <div id="mensajeE" class="col-sm-10 alert alert-warning m-1"><i class="bi bi-exclamation"></i> El email introducido ya está en uso</div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-9 input-group">
            <label for="clave" class="col-sm-3 col-form-label">Contraseña</label>
            <input type="password" class="form-control" autocomplete="new-password" name="clave" id="clave" class="form-control" placeholder="Contraseña" required maxlength="20">
            <div class="input-group-append"><button type="button" class="btn btn-outline-secondary" id="mostrar"><i class="bi bi-eye"></i></button></div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="apenom" class="col-sm-3 col-form-label">Apellidos y Nombre</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" autocomplete="new-password" name="apenom" id="apenom" class="form-control" placeholder="Apellidos Nombre" maxlength="50">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nif" class="col-sm-3 col-form-label">NIF</label>
            <div class="col-sm-9">
            <input type="text" pattern="[0-9]{8}[A-Za-z]{1}" class="form-control" autocomplete="new-password" name="nif" id="nif" class="form-control" placeholder="12345678A" maxlength="9">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="dirPostal" class="col-sm-3 col-form-label">Dirección Postal</label>
            <div class="col-sm-9">
            <textarea class="form-control" autocomplete="new-password" name="dirPostal" id="dirPostal" class="form-control" placeholder="Dirección postal"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tel" class="col-sm-3 col-form-label">Teléfono</label>
            <div class="col-sm-9">
            <input type="tel" pattern="[0-9]{9}" class="form-control" autocomplete="new-password" name="tel" id="tel" class="form-control" placeholder="654321987" maxlength="9">
            </div>
        </div>
        <input type="hidden" name="tipo" value="C">
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </fieldset>
    </form>
</div>
</section>
<script src="<?php echo BASE_URL; ?>app/views/registro_v.js"></script>