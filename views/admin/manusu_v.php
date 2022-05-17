<section class="row d-flex justify-content-center">
    <div class="col ">
        <table class="table table-success table-striped table-hover">
            <tr>
                <th>Nombre de usuario</th>
                <th>Email</th>
                <th>Apellidos y nombre</th>
                <th>NIF</th>
                <th>Teléfono</th>
                <th>Tipo</th>
                <th>Dirección Postal</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            <?php
            if(isset($usuarios)){
                if(count($usuarios)>0){
                    foreach($usuarios as $usuario){
                        echo "<tr>
                        <td>$usuario[nusuario]</td>
                        <td>$usuario[email]</td>
                        <td>$usuario[apenom]</td>
                        <td>$usuario[nif]</td>
                        <td>$usuario[tel]</td>
                        <td>$usuario[tipo]</td>
                        <td>$usuario[dirPostal]</td>
                        <td class='text-center'><button data-bs-toggle='modal' data-bs-target='#modalEditar' class='btn btnEditar btn-warning' data-nusuario='$usuario[nusuario]'><i class='bi bi-pencil-square'></i></button></td>
                        <td class='text-center'><button class='btn btnBorrar btn-danger' data-id='$usuario[id]'><i class='bi bi-dash-circle'></i></button></td>
                        </tr>";
                    }
                }
            }
            ?>
        </table>
        <div class="text-end">
            <button data-bs-toggle="modal" data-bs-target="#modalAgregar" class="btn btnAgregar btn-secondary m-1"><i class="bi bi-person-plus"></i> Añadir nuevo usuario</button>
        </div>
    </div>
    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info opacity-75">
                    <h3 class="modal-title">Editar usuario</h3>
                    <button type="button" class="btn-close" aria-label="Cerrar" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?php echo BASE_URL; ?>Admin/editarUsuario" method="post" name="frmEditar" autocomplete="off">
                <div class="border-bot p-3 modal-body">
                    <div class="mb-3 row">
                        <label for="nusuario" class="col-sm-3 col-form-label">Nombre de usuario</label>
                        <div class="col-sm-9">
                        <input readonly value="<?php echo $usuario['nusuario']; ?>" type="text" class="form-control" autocomplete="new-password" name="nusuario" class="form-control" placeholder="Nombre de usuario" maxlength="20">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="apenom" class="col-sm-3 col-form-label">Apellidos y Nombre</label>
                        <div class="col-sm-9">
                        <input value="<?php echo $usuario['apenom']; ?>" type="text" class="form-control" autocomplete="new-password" name="apenom" class="form-control" placeholder="Apellidos Nombre" maxlength="50">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nif" class="col-sm-3 col-form-label">NIF</label>
                        <div class="col-sm-9">
                        <input value="<?php echo $usuario['nif']; ?>" type="text" pattern="[0-9]{8}[A-Za-z]{1}" class="form-control" autocomplete="new-password" name="nif" class="form-control" placeholder="12345678A" maxlength="9">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dirPostal" class="col-sm-3 col-form-label">Dirección Postal</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" autocomplete="new-password" name="dirPostal" class="form-control" placeholder="Dirección postal"><?php echo $usuario['dirPostal']; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tel" class="col-sm-3 col-form-label">Teléfono</label>
                        <div class="col-sm-9">
                        <input value="<?php echo $usuario['tel']; ?>" type="tel" pattern="[0-9]{9}" class="form-control" autocomplete="new-password" name="tel" class="form-control" placeholder="Teléfono" maxlength="9">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Agregar -->
    <div class="modal fade" id="modalAgregar" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info opacity-75">
                    <h3 class="modal-title">Añadir nuevo usuario</h3>
                    <button type="button" class="btn-close" aria-label="Cerrar" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?php echo BASE_URL; ?>Admin/insertarUsuario" method="post" name="frmAgregar" autocomplete="off">
                <div class="border-bot p-3 modal-body">
                    <div class="mb-3 row">
                        <label for="nusuario" class="col-sm-3 col-form-label">Nombre de usuario</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" autocomplete="new-password" name="nusuario" class="form-control" placeholder="Nombre de usuario" required autofocus maxlength="20">
                        </div>
                        <div id="mensajeAgregarN" class="col-sm-10 alert alert-warning m-1"><i class="bi bi-exclamation"></i> El nombre de usuario introducido ya está en uso</div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" autocomplete="new-password" name="email" class="form-control" placeholder="Email" required autofocus maxlength="50">
                        </div>
                        <div id="mensajeAgregarE" class="col-sm-10 alert alert-warning m-1"><i class="bi bi-exclamation"></i> El email introducido ya está en uso</div>
                    </div>
                    <div class="mb-3 row">
                        <label for="clave" class="col-sm-3 col-form-label">Contraseña</label>
                        <div class="col-sm-9">
                        <input type="password" class="form-control" autocomplete="new-password" name="clave" class="form-control" placeholder="Contraseña" required autofocus maxlength="20">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="apenom" class="col-sm-3 col-form-label">Apellidos y Nombre</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" autocomplete="new-password" name="apenom" class="form-control" placeholder="Apellidos Nombre" maxlength="50">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nif" class="col-sm-3 col-form-label">NIF</label>
                        <div class="col-sm-9">
                        <input type="text" pattern="[0-9]{8}[A-Za-z]{1}" class="form-control" autocomplete="new-password" name="nif" class="form-control" placeholder="12345678A" maxlength="9">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dirPostal" class="col-sm-3 col-form-label">Dirección Postal</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" autocomplete="new-password" name="dirPostal" class="form-control" placeholder="Dirección postal"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tel" class="col-sm-3 col-form-label">Teléfono</label>
                        <div class="col-sm-9">
                        <input type="tel" pattern="[0-9]{9}" class="form-control" autocomplete="new-password" name="tel" class="form-control" placeholder="Teléfono" maxlength="9">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tipo" class="col-sm-3 col-form-label">Tipo de cuenta</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="tipo" >
                                <option selected value="C">Cliente</option>
                                <option value="A">Administrador</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo BASE_URL; ?>app/views/admin/manusu.js"></script>