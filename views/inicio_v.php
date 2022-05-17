<section class="row d-flex justify-content-center" style="background-image: url('<?php echo BASE_URL; ?>app/assets/img/fondo.jpg'); opacity:.8;">
<div class="col-4 fs-5 bg-light m-5 p-5 border border-info rounded">
    <h3> Así somos...</h3>
    Protectora Sol es una entidad sin ánimo de lucro que se dedica desde hace 5 años a luchar contra el maltrato y el abandono animal, y a buscar una familia responsable para darles una segunda vida... Nos ayudas? Es muy fácil...
    <?php if(!isset($_SESSION['usuario'])){ ?>
        <a class="btn btn-primary d-flex m-3 p-2 fs-5 justify-content-around" href="<?php echo BASE_URL; ?>Inicio/registro"><i class="bi bi-award"></i>¡Regístrate!<i class="bi bi-award"></i></a>
   <?php } else{ ?>
    <a class="btn btn-primary d-flex m-3 p-2 fs-5 justify-content-around" href="<?php echo BASE_URL; ?>Donaciones/index"><i class="bi bi-award"></i>¡Haz una donación!<i class="bi bi-award"></i></a>
  <?php } ?>
</div>
<div class="col-8">
    <div class="mx-auto fs-1 fst-italic fw-bold mt-3 text-primary bg-light opacity-50 col-7 border border-info rounded p-1 text-center">Animales en el refugio</div>
    <div id="carousel" class="carousel slide border border-dark rounded p-3 bg-secondary mt-3 mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($animales as $ind=>$animal){ 
                $activo=$ind==0 ? "active" : ""; ?>
                <div class="carousel-item <?php echo $activo; ?>">
                    <a href="<?php echo BASE_URL; ?>Animal/verFicha/<?php echo $animal['id']; ?>" data-id="<?php echo $animal['id']; ?>"><img height="500px" src="<?php echo BASE_URL.$animal['ruta']; ?>" class="b-block w-100"></a>
                    <div class="carousel-caption bg-secondary border border-dark rounded opacity-60 p-2 fs-2 fw-bold fst-italic bg-gradient opacity-50"><?php echo $animal['nombre']; ?></div>
                </div>
        <?php } ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    </div>
</div>
</section>