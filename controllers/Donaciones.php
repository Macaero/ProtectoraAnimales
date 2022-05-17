<?php
class Donaciones extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load_view("plantilla/cabecera");
        $this->load_view("plantilla/menu");
        $this->load_view("donaciones_v");
        $this->load_view("plantilla/pie");
    }
    public function nuevaDonacion(){
        $donaciones_m=$this->load_model("Donaciones_m");
        $importe=$_POST['donacion'];
        $donaciones_m->insertar($_SESSION['usuario']['id'],date("Y-m-d"),$importe);
        $datos=$donaciones_m->verDonaciones($_SESSION['usuario']['id']);
        ?>
        <p class="fw-bold">Tu historial de donaciones</p>
        <table class="table">
        <thead>
            <tr>
                <th>Importe</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <?php
        foreach($datos as $dato){ ?>
        <tbody>
            <tr>
                <td><?php echo $dato['importe']; ?> €</td>
                <td><?php echo $dato['fecha']; ?></td>
            </tr>
        </tbody>
    <?php
        } ?>
        </table>
        <?php
    }
}
?>