<section class="row d-flex justify-content-center">
    <div class="col ">
        <table class="table table-success table-striped table-hover">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Raza</th>
                <th>Color</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Tamaño</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            <?php
            if(isset($animales)){
                if(count($animales)>0){
                    foreach($animales as $animal){
                        $tipo=$animal['tipo']=="P" ? "Perro" : "Gato";
                        $sexo=$animal['sexo']=="M" ? "Macho" : "Hembra";
                        echo "<tr>
                        <td>$animal[nombre]</td>
                        <td>$tipo</td>
                        <td>$animal[raza]</td>
                        <td>$animal[color]</td>
                        <td>$animal[edad] años</td>
                        <td>$sexo</td>
                        <td>$animal[size]</td>
                        <td class='text-center'><button data-bs-toggle='modal' data-bs-target='#modalEditar' class='btn btnEditar btn-warning' data-animal='$animal[id]'><i class='bi bi-pencil-square'></i></button></td>
                        <td class='text-center'><button class='btn btnBorrar btn-danger' data-id='$animal[id]'><i class='bi bi-dash-circle'></i></button></td>
                        </tr>";
                    }
                }
            }
            ?>
        </table>
        <div class="text-end">
            <button data-bs-toggle="modal" data-bs-target="#modalAgregar" class="btn btnAgregar btn-secondary m-1"><i class="bi bi-person-plus"></i> Añadir nuevo animal</button>
        </div>
    </div>
    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info opacity-75">
                    <h3 class="modal-title">Editar animal</h3>
                    <button type="button" class="btn-close" aria-label="Cerrar" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?php echo BASE_URL; ?>Admin/editarAnimal" method="post" name="frmEditar" autocomplete="off">
                <div class="border-bot p-3 modal-body">
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                        <input value="<?php echo $animal['nombre']; ?>" type="text" class="form-control" autocomplete="new-password" name="nombre" class="form-control" placeholder="Nombre" maxlength="20" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tipo" class="col-sm-3 col-form-label">Perro o Gato</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="tipo" id="tipoE" required>
                                <option value="">Elija el tipo de animal</option>
                                <option value="P">Perro</option>
                                <option value="G">Gato</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sexo" class="col-sm-3 col-form-label">Sexo</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="sexo" required>
                                <option value="">Elija el sexo</option>
                                <option value="M">Macho</option>
                                <option value="H">Hembra</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="raza" class="col-sm-3 col-form-label">Raza</label>
                        <div class="col-sm-9">
                        <select class="form-select raza" id="razaE" name="raza"></select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="size" class="col-sm-3 col-form-label">Tamaño</label>
                        <div class="col-sm-9">
                        <input value="<?php echo $animal['size']; ?>" type="text" class="form-control" autocomplete="new-password" name="size" class="form-control" placeholder="Tamaño" maxlength="50">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="color" class="col-sm-3 col-form-label">Color</label>
                        <div class="col-sm-9">
                        <input value="<?php echo $animal['color']; ?>" type="text" class="form-control" autocomplete="new-password" name="color" class="form-control" placeholder="Color" maxlength="9">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="edad" class="col-sm-3 col-form-label">Edad</label>
                        <div class="col-sm-9">
                        <input value="<?php echo $animal['edad']; ?>" type="number" class="form-control" autocomplete="new-password" name="edad" class="form-control" placeholder="edad" maxlength="9">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="descrip" class="col-sm-3 col-form-label">Descripción</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" autocomplete="new-password" name="descrip" class="form-control" placeholder="Descripción"><?php echo $animal['descrip']; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="observaciones" class="col-sm-3 col-form-label">Observaciones</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" autocomplete="new-password" name="observaciones" class="form-control" placeholder="Descripción"><?php echo $animal['observaciones']; ?></textarea>
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
                    <h3 class="modal-title">Añadir nuevo animal</h3>
                    <button type="button" class="btn-close" aria-label="Cerrar" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?php echo BASE_URL; ?>Admin/insertarAnimal" method="post" name="frmAgregar" autocomplete="off" enctype="multipart/form-data">
                <div class="border-bot p-3 modal-body">
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                        <input required type="text" class="form-control" autocomplete="new-password" name="nombre" class="form-control" placeholder="Nombre" maxlength="20">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tipo" class="col-sm-3 col-form-label">Perro o Gato</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="tipo" id="tipoA" required>
                                <option value="">Elija el tipo de animal</option>
                                <option value="P">Perro</option>
                                <option value="G">Gato</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sexo" class="col-sm-3 col-form-label">Sexo</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="sexo" required>
                                <option value="">Elija el sexo</option>
                                <option value="M">Macho</option>
                                <option value="H">Hembra</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="raza" class="col-sm-3 col-form-label">Raza</label>
                        <div class="col-sm-9">
                        <select class="form-select raza" name="raza" id="razaA"></select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="size" class="col-sm-3 col-form-label">Tamaño</label>
                        <div class="col-sm-9">
                        <input required type="text" class="form-control" autocomplete="new-password" name="size"class="form-control" placeholder="Tamaño" maxlength="50">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="color" class="col-sm-3 col-form-label">Color</label>
                        <div class="col-sm-9">
                        <input required type="text" class="form-control" autocomplete="new-password" name="color" class="form-control" placeholder="Color" maxlength="9">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="edadA" class="col-sm-3 col-form-label">Edad</label>
                        <div class="col-sm-9">
                        <input required type="number" class="form-control" autocomplete="new-password" name="edad"class="form-control" placeholder="edad" maxlength="9">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="descrip" class="col-sm-3 col-form-label">Descripción</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" autocomplete="new-password" name="descrip" class="form-control" placeholder="Descripción"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="observaciones" class="col-sm-3 col-form-label">Observaciones</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" autocomplete="new-password" name="observaciones" class="form-control" placeholder="Observaciones"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="imagenes" class="col-sm-3 col-form-label">Subir imágenes</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" multiple name="imagenes[]">
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
</section>
<script src="<?php echo BASE_URL; ?>app/views/admin/mananim.js"></script>