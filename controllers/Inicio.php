<?php
defined("BASEPATH") or die("No se permite la entrada directa a este script");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require ROOT.'app/assets/libs/PHPMailer/src/Exception.php';
require ROOT.'app/assets/libs/PHPMailer/src/PHPMailer.php';
require ROOT.'app/assets/libs/PHPMailer/src/SMTP.php';

class Inicio extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $vista="inicio_v";
        $menu="plantilla/menu";
        if (isset($_SESSION['usuario'])){
            if($_SESSION['usuario']['tipo']=="A"){
                $vista="admin/inicio_v";
                $menu="admin/menu_v";
            }
        }
        $animales_m=$this->load_model("Animales_m");
        $datos['animales']=$animales_m->verAnimales();
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view($vista,$datos);
        $this->load_view("plantilla/pie");
    }
    public function login(){
        $this->load_view("plantilla/cabecera");
        $this->load_view("plantilla/menu");
        $this->load_view("login_v");
        $this->load_view("plantilla/pie");
    }
    public function comprobarLogin(){
        $usuarios_m=$this->load_model("Usuarios_m");
        $usuario=$usuarios_m->comprobarUsuario($_POST['nusuario']);
        if ($usuario){
            if (!$usuario['activo']){
                $datos['mensaje']="Usuario No activo. Ve a tu correo y haz click en el link de activación";
            } else {
            // Comprobar la contraseña
                if (password_verify($_POST['clave'],$usuario['clave'])){
                    // Crear una variable de session con los datos del usuario que nos convengan para usar en cualquier sitio de la aplicacion
                    $_SESSION['usuario']=["id"=>$usuario['id'],
                                        "nusuario"=>$usuario['nusuario'],
                                        "email"=>$usuario['email'],
                                        "tipo"=>$usuario["tipo"]];
                    // redirigimos de nuevo a Inicio/index o Admin/index
                    if ($usuario['tipo']=="C"){
                        if ($_SERVER['HTTP_REFERER']==BASE_URL."Inicio/login"){
                            header("location:".BASE_URL."Inicio/index");
                        } else {
                            header("location:".$_SERVER['HTTP_REFERER']);
                        }
                    } else {
                        header("location:".BASE_URL."Admin/index");
                    }
                } else {
                //Cargar de nuevo la vista de login e injectar datos con mensaje de error
                $datos['mensaje']="Error. Contraseña no válida";
                }
            } 
        } else {
            $datos['mensaje']="Error. Usuario no encontrado";
        }
            $this->load_view("plantilla/cabecera");
            $this->load_view("plantilla/menu");
            $this->load_view("login_v",$datos);
            $this->load_view("plantilla/pie");
    }
    public function registro(){
        $this->load_view("plantilla/cabecera");
        $this->load_view("plantilla/menu");
        $this->load_view("registro_v");
        $this->load_view("plantilla/pie");
    }
    public function comprobarRegistro(){
        $usuarios_m=$this->load_model("Usuarios_m");
        $usuario=$usuarios_m->comprobarUsuario($_POST['nusuemail']);
        if($usuario){
            echo "1";
        }else{
            echo "0";
        }
    }
    public function insertarUsuario(){
        $usuarios_m=$this->load_model("Usuarios_m");
        $_POST['clave']=password_hash($_POST['clave'],PASSWORD_DEFAULT);
        ;
        $_POST['token']=hash("md5",$_POST['email']);
        $_POST['tipo']="C";
        $usuarios_m->insertar($_POST);
        $mensaje=$this->enviarCorreo($_POST['token']);
        if ($mensaje){
           echo "Error al enviar mensaje. Error $mensaje. Pulse <a href='".BASE_URL."Inicio/index'>aquí</a> para seguir";
        } else {
            // Volver al inicio y dar mensaje de que le hemos enviado un correo
            $datos['mensaje']="Le hemos enviado un correo con un enlace para activar su cuenta";
            $this->load_view("plantilla/cabecera");
            $this->load_view("plantilla/menu");
            $this->load_view("login_v",$datos);
            $this->load_view("plantilla/pie");
        }
    }
    public function logout(){
        session_destroy();
        header("location:".BASE_URL."Inicio/index");
    }
    private function enviarCorreo($token=""){
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
            $mail->addAddress($_POST['email'], $_POST['nusuario']);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Protectora de animales Sol';
            $mail->Body    = '<h2>¡Bienvenido '.$_POST['nusuario'].'!</h2><p>Muchas gracias por registrarte en nuestra web.</p><p>Haz click <a href="'.BASE_URL.'Inicio/activarUsuario/'.$token.'">en este enlace</a> para activar tu usuario.</p>';
            $mail->AltBody = '¡Bienvenido! Muchas gracias por apoyar a nuestra asociación.';
        
            $mail->send();
            return false;   //Retornamos falso. No hay error
        } catch (Exception $e) {
            return "{$mail->ErrorInfo}"; // Hay error.
        }
    }
    public function activarUsuario($token){
        $usuarios_m=$this->load_model("Usuarios_m");
        $activo=$usuarios_m->activarUsuario($token[0]);
        if ($activo){
            header("location:".BASE_URL."Inicio/login");
        } else {
            echo "Error al activar usuario.<a href='".BASE_URL."'>Ir al Inicio</a>";
        }
    }
    
}
?>