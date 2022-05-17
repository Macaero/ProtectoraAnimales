<?php
defined("BASEPATH") or die("No se permite la entrada directa a este script");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require ROOT.'app/assets/libs/PHPMailer/src/Exception.php';
require ROOT.'app/assets/libs/PHPMailer/src/PHPMailer.php';
require ROOT.'app/assets/libs/PHPMailer/src/SMTP.php';
class Animal extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $menu="plantilla/menu";
        if (isset($_SESSION['usuario'])){
            if($_SESSION['usuario']['tipo']=="A"){
                $menu="admin/menu_v";
            }
        }
        $animales_m=$this->load_model("Animales_m");
        $datos['animales']=$animales_m->verAnimales();
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view("animal_v",$datos);
        $this->load_view("plantilla/pie");
    }
    public function verFicha($animal){
        $animales_m=$this->load_model("Animales_m");
        $datos['animales']=$animales_m->mostrarAnimal($animal[0]);
        $this->load_view("plantilla/cabecera");
        $this->load_view("plantilla/menu");
        $this->load_view("ficha_v",$datos);
        $this->load_view("plantilla/pie");
    }
    public function verBusqueda(){
        $tipo=isset($_POST['tipo']) ? $_POST['tipo'] : "%%";
        $raza=isset($_POST['raza']) ? $_POST['raza'] : "%%";
        $sexo=isset($_POST['sexo']) ? $_POST['sexo'] : "%%";
        $edad=isset($_POST['edad']) ? $_POST['edad'] : 20;
        $animales_m=$this->load_model("Animales_m");
        $animales=$animales_m->busqueda($tipo,$raza,$sexo,$edad);
        foreach ($animales as $animal): ?>
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
        
        <?php endforeach;
    }
    public function verAdopciones(){
        $menu="plantilla/menu";
        if (isset($_SESSION['usuario'])){
            if($_SESSION['usuario']['tipo']=="A"){
                $menu="admin/menu_v";
            }
        }
        $adopciones_m=$this->load_model("Adopciones_m");
        $usuarios_m=$this->load_model("Usuarios_m");
        $datos['adopciones']=$adopciones_m->datosAdopciones();
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view("adopciones_v",$datos);
        $this->load_view("plantilla/pie");
    }
    public function adoptar($idanim){
        $usuarios_m=$this->load_model("Usuarios_m");
        $adopciones_m=$this->load_model("Adopciones_m");
        $animales_m=$this->load_model("Animales_m");
        $datos['usu']=$usuarios_m->comprobarDatos($_SESSION['usuario']['id']);
        if($datos['usu']){
            $datos['perfil']=$usuarios_m->leerUsuario($_SESSION['usuario']['nusuario']);
            $datos['mensaje']="Antes de realizar la adopción debes rellenar todos tus datos.";
            $this->load_view("plantilla/cabecera");
            $this->load_view("plantilla/menu");
            $this->load_view("miPerfil_v",$datos);
            $this->load_view("plantilla/pie");
        }else{
            $nombre=$animales_m->verNombre($idanim[0]);
            $adopciones_m->insertar(date("Y-m-d"),$_SESSION['usuario']['id'],$idanim[0]);
            $animales_m->adoptar($idanim[0]);
            $this->mensajeAdopcion($nombre['nombre']);
            $datos['adopciones']=$adopciones_m->verAdopciones();

            $datos['mensaje']="Te hemos enviado un correo para formalizar la adopción.";
            $this->load_view("plantilla/cabecera");
            $this->load_view("plantilla/menu");
            $this->load_view("adopciones_v",$datos);
            $this->load_view("plantilla/pie"); 
        }
    }
    public function mensajeAdopcion($nombre){
        //Creamos una instancia del PHPMailer; pasando `true` habilitamos las excepciones
        $mail = new PHPMailer(true);
        try {
            // Poner en Español
            $mail->setLanguage("es");
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'protectorasol@gmail.com';                     //SMTP username
            $mail->Password   = 'abcd-1234*';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('protectorasol@gmail.com', 'Alejandro Paz');
            $mail->addAddress($_SESSION['usuario']['email'], $_SESSION['usuario']['nusuario']);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Protectora de animales Sol';
            $mail->Body    = '<h2>¡Enhorabuena '.$_SESSION['usuario']['nusuario'].'!</h2><p>Muchas gracias por darle un hogar a '.$nombre.'.</p><p>¡Esperamos que seais muy felices! ¡Pásate por nuestras oficinas para formalizar la adopción y recoger a tu mascota!</p>';
            $mail->AltBody = '¡Muchas gracias por apoyar a nuestra asociación! Que seais muy felices.';
        
            $mail->send();
            return false;   //Retornamos falso. No hay error
        } catch (Exception $e) {
            return "{$mail->ErrorInfo}"; // Hay error.
        }
    }
    public function seguimiento(){
        $menu="plantilla/menu";
        if (isset($_SESSION['usuario'])){
            if($_SESSION['usuario']['tipo']=="A"){
                $menu="admin/menu_v";
            }
        }
        $adopciones_m=$this->load_model("Adopciones_m");
        $incidencias_m=$this->load_model("Incidencias_m");
        $datos['adopciones']=$adopciones_m->datosAdopciones();
        $datos['incidencias']=$incidencias_m->mostrarTodo();
        
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view("seguimiento_v",$datos);
        $this->load_view("plantilla/pie"); 
    }
    public function incidencias(){
        $incidencias_m=$this->load_model("Incidencias_m");
        $mensaje=$_POST['mensaje'];
        $idAd=$_POST['idAdopcion'];
        if($mensaje!=""){
            $incidencias_m->insertar($idAd,date("Y-m-d"),$mensaje);
        }
        $incidencias=$incidencias_m->mostrar($idAd);
        ?>
        <?php 
        foreach($incidencias as $incidencia){
            if($incidencia['idadopcion']==$idAd){?>                     
        <li class="list-group-item text-center border border-warning rounded m-3 p-2"><i class="bi bi-patch-exclamation"></i> <div class="col fs-5 fw-bold fst-italic m-1"><?php echo $incidencia['incidencia']; ?></div><div class="col-3 fs-6 fst-italic"><?php echo $incidencia['fecha']; ?></div></li>
        <?php } } ?>

        <?php
}
}
?>