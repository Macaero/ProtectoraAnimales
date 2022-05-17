<section class="row mb-5 d-flex justify-content-center">
    <button class="btn btn-light btnFiltros text-primary"><i class="bi bi-sort-down-alt"></i> Filtros</button>
    <div class="row bg-light border rounded p-3 filtros">
        <div class="col-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" id="perro" value="P">
                <label class="form-check-label" for="perro">
                    Perro
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo" id="gato" value="G">
                <label class="form-check-label" for="gato">
                    Gato
                </label>
            </div>
        </div>
        <div class="col-2 razas"></div>
        <div class="col-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="macho" value="M">
                <label class="form-check-label" for="macho">
                    Macho
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="hembra" value="H">
                <label class="form-check-label" for="hembra">
                    Hembra
                </label>
            </div>
        </div>
        <div class="col-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="edad" id="2" value="2">
                <label class="form-check-label" for="2">
                    < 2 años
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="edad" id="4" value="4">
                <label class="form-check-label" for="4">
                    < 4 años
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="edad" id="6" value="6">
                <label class="form-check-label" for="6">
                    < 6 años
                </label>
            </div>
        </div>
        <div class="col-2">
        <div class="form-check">
                <input class="form-check-input" type="radio" name="edad" id="8" value="8">
                <label class="form-check-label" for="8">
                    < 8 años
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="edad" id="10" value="10">
                <label class="form-check-label" for="10">
                    < 10 años
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="edad" id="15" value="15">
                <label class="form-check-label" for="15">
                    < 15 años
                </label>
            </div>
        </div>
        <div class="col-2">
            <button type="submit" id="btnReset" class="btn btn-success"><i class="bi bi-search"></i> Reestablecer filtros</button>
        </div>
    </div>
    <div class="col-12 d-inline-flex justify-content-center flex-wrap" id="cuerpo"> 
        <?php foreach ($animales as $animal): ?>
                <div class="col-6">
                    <div class="card border-success m-4">
                        <h3 class="card-header"><?php echo $animal['nombre']; ?></h3>
                        <div class="card-body  align-items-center">
                            <img src="<?php echo BASE_URL.$animal['ruta']; ?>" alt="" height="350px" class="card-img">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <table class="table">
                                            <tr>
                                                <td class="text-center"><h5>Raza</h5> <?php echo $animal['raza']; ?></td>
                                                <td class="text-center"><h5>Sexo</h5> <?php echo $animal['sexo']=='H' ? "Hembra" : "Macho"; ?></td>
                                                <td class="text-center"><h5>Edad</h5> <?php echo $animal['edad']; ?> años</td>
                                                <td class="text-center"><h5>Color</h5> <?php echo $animal['color']; ?></td>
                                            </tr>
                                        </table>
                                    </li>
                                </ul>
                                <div class="col d-flex justify-content-center">
                                    <button class='btn btn-success mt-2 btnFicha' data-id='<?php echo $animal['id']; ?>'><i class="bi bi-book"></i> Ver más</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <?php endforeach; ?>
        </div>
</section>
<script src="<?php echo BASE_URL; ?>app/views/animal_v.js"></script>