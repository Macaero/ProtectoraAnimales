<?php
defined("BASEPATH") or die("No se permite la entrada directa a este script");
class Admin extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load_view("plantilla/cabecera");
        $this->load_view("admin/menu_v");
        $this->load_view("admin/inicio_v");
        $this->load_view("plantilla/pie");
    }
    public function manusu(){
        $usuarios_m=$this->load_model("Usuarios_m");
        $datos['usuarios']=$usuarios_m->mostrar();
        $this->load_view("plantilla/cabecera");
        $this->load_view("admin/menu_v");
        $this->load_view("admin/manusu_v",$datos);
        $this->load_view("plantilla/pie");
    }
    public function leerUsuario($usuario){
        $usuarios_m=$this->load_model("Usuarios_m");
        echo json_encode($usuarios_m->leerUsuario($usuario[0]));
    }
    public function leerEmail($email){
        $usuarios_m=$this->load_model("Usuarios_m");
        echo json_encode($usuarios_m->leerEmail($email[0]));
    }
    public function editarUsuario(){
        $usuarios_m=$this->load_model("Usuarios_m");
        $usuarios_m->editarUsuario($_POST);
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    public function insertarUsuario(){
        $usuarios_m=$this->load_model("Usuarios_m");
        $_POST['clave']=password_hash($_POST['clave'],PASSWORD_DEFAULT);
        $usuarios_m->insertar($_POST);
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    public function borrarUsuario($usuario){
        $usuarios_m=$this->load_model("Usuarios_m");
        $usuarios_m->borrar($usuario[0]);
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    public function mananim(){
        $animales_m=$this->load_model("Animales_m");
        $datos['animales']=$animales_m->mostrar();
        $this->load_view("plantilla/cabecera");
        $this->load_view("admin/menu_v");
        $this->load_view("admin/mananim_v",$datos);
        $this->load_view("plantilla/pie");
    }
    public function editarAnimal(){
        $animales_m=$this->load_model("Animales_m");
        $animales_m->editarAnimal($_POST);
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    public function insertarAnimal(){
        $animales_m=$this->load_model("Animales_m");
        // Enviar al modelo los datos para insertarlos
        $animales_m->insertar($_POST);
        // Obtenemos la última id
        $idanim=$animales_m->verUltId();
        if (isset($_FILES['imagenes'])){    
            // Subir las imagenes a la carpeta de imagenes
            $files = array(); // Array nuevo adaptado
            foreach ($_FILES['imagenes'] as $clave => $fichero) {
                foreach ($fichero as $indice => $valor) {
                    if (!array_key_exists($indice, $files))
                        $files[$indice] = array();
                        $files[$indice][$clave] = $valor;
                }
            } 
            $datos['mensaje']=array();
            $nimage=0;  
            foreach ($files as $file) {
                $uploader=new Uploader();
                $camino=ROOT.'app/assets/img/fotosAnimales/';
                $uploader->setDir($camino);
                $uploader->setExtensions(array('jpg','jpeg','png','gif'));  //lista de extensiones permitidas//
                $uploader->setMaxSize(3);//Poner tamaño maximo permitido//

                if($uploader->uploadFile($file)){   //$file es cada fichero subido //     
                    // Guardar un registro en la tabla articulos_imagenes
                    $animales_m->insertarImagen($idanim[0]['MAX(id)'],'app/assets/img/fotosAnimales/'.$uploader->getUploadName(),$nimage==0 ? 1 : 0);
                    $nimage++;
                } else {//upload failed
                    $datos['mensaje'][]=$uploader->getMessage(); //Obtener el error si lo hay   
                }
            }
        }
        //Volver al mantenimiento de articulos
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    public function leerAnimal($animal){
        $animales_m=$this->load_model("Animales_m");
        echo json_encode($animales_m->leerAnimal($animal[0]));
    }
    public function borrarAnimal($animal){
        $animales_m=$this->load_model("Animales_m");
        $animales_m->borrar($animal[0]);
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    public function miPerfil(){
        $usuarios_m=$this->load_model("Usuarios_m");
        $datos['perfil']=$usuarios_m->leerUsuario($_SESSION['usuario']['nusuario']);
        $this->load_view("plantilla/cabecera");
        $this->load_view("plantilla/menu");
        $this->load_view("miPerfil_v",$datos);
        $this->load_view("plantilla/pie");
    }
    public function avisos(){
        $menu="plantilla/menu";
        if (isset($_SESSION['usuario'])){
            if($_SESSION['usuario']['tipo']=="A"){
                $menu="admin/menu_v";
            }
        }
        $avisos_m=$this->load_model("Avisos_m");
        $usuarios_m=$this->load_model("Usuarios_m");
        $datos['avisos']=$avisos_m->mostrar();
        $this->load_view("plantilla/cabecera");
        $this->load_view($menu);
        $this->load_view("avisos_v",$datos);
        $this->load_view("plantilla/pie");
    }
    public function darAviso(){
        $avisos_m=$this->load_model("Avisos_m");
        $usuarios_m=$this->load_model("Usuarios_m");
        if(isset($_POST['mensaje'])){
            $mensaje=$_POST['mensaje'];
            if($mensaje!=""){
                $avisos_m->insertar($_SESSION['usuario']['id'],date("Y-m-d"),$mensaje);
            }
        }
        $avisos=$avisos_m->mostrar();
            foreach($avisos as $aviso){ ?> 
            <div class="alert alert-info d-flex justify-content-between" role="alert"><i class="bi bi-info-circle fs-3"></i><div class="fw-bolder"><?php echo $aviso['mensaje']; ?></div><div class="col-3 text-end fs-6 fst-italic"><?php echo $aviso['nusuario']."    ".$aviso['fecha']; ?></div><?php if($_SESSION['usuario']['tipo']=="A"){echo '<button class="btnResolver btn fw-bold fs-5 text-danger col-2" data-id="'.$aviso['id'].'"><i class="bi bi-shield-exclamation "></i> Resolver aviso</button>';} ?></div>
        <?php    }
        ?>
        <?php
    }
    public function resolverAviso(){
        $avisos_m=$this->load_model("Avisos_m");
        $id=$_POST['id'];
        $avisos_m->resolver($id);
    }
}
?>