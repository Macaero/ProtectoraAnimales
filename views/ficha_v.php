<section class="row mt-3 mb-5 d-flex justify-content-center">
    <div class="col-10">
        <div class="card border-success m-3">
            <div class="card-body">
                <div class="row m-1">
                    <?php foreach ($animales as $animal): ?>
                            <div class="col">
                                <img src="<?php echo BASE_URL.$animal['ruta']; ?>" alt="" class="card-img img-fluid m-1">
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item h1"><?php echo $animal['nombre']; ?></li>
                            <li class="list-group-item"><?php echo $animal['descrip']; ?></li>
                            <li class="list-group-item">
                                <table class="table">
                                    <tr>
                                        <td class="text-center"><h5>Raza</h5> <?php echo $animal['raza']; ?></td>
                                        <td class="text-center"><h5>Sexo</h5> <?php echo $animal['sexo']=='H' ? "Hembra" : "Macho"; ?></td>
                                        <td class="text-center"><h5>Edad</h5> <?php echo $animal['edad']; ?> años</td>
                                        <td class="text-center"><h5>Color</h5> <?php echo $animal['color']; ?></td>
                                    </tr>
                                </table>
                                <div class="col d-flex justify-content-between">
                                    <?php echo "<p class='fw-bold'>Observaciones:</p>".$animal['observaciones']; ?>
                                    <a class="btn btn-secondary mt-3" href="<?php echo BASE_URL; ?>Animal/index">Volver</a>
                                    <?php 
                                    if(isset($_SESSION['usuario'])){
                                        echo "<button class='btn btn-success mt-3 btnAdoptar' data-id='$animal[id]'><i class='bi bi-bookmark-heart'></i> Adoptar</button>";  
                                    }
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src="<?php echo BASE_URL; ?>app/views/ficha_v.js"></script>