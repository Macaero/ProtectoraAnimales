<?php
class Chat extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $chat_m=$this->load_model("Chat_m");
        $usuarios_m=$this->load_model("Usuarios_m");
        $datos['mensajes']=$chat_m->mostrar();
        $datos['usuarios']=$usuarios_m->mostrar();
        $vista="chat_v";
        $menu="plantilla/menu";
        if (isset($_SESSION['usuario'])){
            if($_SESSION['usuario']['tipo']=="A"){
                $vista="admin/chat_v";
                $menu="admin/menu_v";
            }
        }
            $this->load_view("plantilla/cabecera");
            $this->load_view($menu);
            $this->load_view($vista,$datos);
            $this->load_view("plantilla/pie");
        }
        public function enviarMensaje(){
            $chat_m=$this->load_model("Chat_m");
            if($_SESSION['usuario']['tipo']=="C"){
                $idusu=$_SESSION['usuario']['id'];
            }else{
                $idusu=$_POST['idusu'];
            }
            $admin=$idusu==$_SESSION['usuario']['id'] ? 0 : 1;
                $mensaje=$_POST['mensaje'];
                if($mensaje!=""){
                    $chat_m->insertar($idusu,date("Y-m-d"),$mensaje,$admin);
                }
            $mensajes=$chat_m->mostrar();
            ?>
            <?php
            foreach($mensajes as $mensaje){
                if($mensaje['idusu']==$idusu){ ?>
                    <div class="row m-2 d-flex <?php if($mensaje['admin']==1){echo "justify-content-end";} ?>">
                    <div class="col-8 bg-light border <?php if($mensaje['admin']==1){echo "border-primary";}else{ echo "border-success";} ?> rounded d-flex justify-content-around p-2">
                        <div class="col fs-4 p-1"><?php echo $mensaje['mensaje']; ?></div>
                        <div class="col-3 fs-6 fst-italic"><?php echo $mensaje['fecha']; ?></div>
                        <?php if($mensaje['leido']==1){ ?>
                            <div class="col-3 fs-6 fst-italic"><i class="bi bi-check2-all"></i> </div>
                            <?php
                        } ?>
                    </div>
                    </div>
                    <?php
                }
            }
            ?>
            <?php
        }
        public function leerMensajes(){
            $chat_m=$this->load_model("Chat_m");
            $idusu=isset($_POST['idusu']) ? $_POST['idusu'] : $_SESSION['usuario']['id'];
            $admin=$idusu==$_SESSION['usuario']['id'] ? 1 : 0;
            $chat_m->leerMensaje($idusu,$admin);
            $mensajes=$chat_m->mostrar();
            ?>
            <?php
            foreach($mensajes as $mensaje){
                if($mensaje['idusu']==$idusu){ ?>
                    <div class="row m-2 d-flex <?php if($mensaje['admin']==1){echo "justify-content-end";} ?>">
                    <div class="col-8 bg-light border <?php if($mensaje['admin']==1){echo "border-primary";}else{ echo "border-success";} ?> rounded d-flex justify-content-around p-2">
                        <div class="col fs-4 p-1"><?php echo $mensaje['mensaje']; ?></div>
                        <div class="col-3 fs-6 fst-italic"><?php echo $mensaje['fecha']; ?></div>
                        <?php if($mensaje['leido']==1){ ?>
                            <div class="col-3 fs-6 fst-italic"><i class="bi bi-check2-all"></i> </div>
                            <?php
                        } ?>
                    </div>
                    </div>
                    <?php
                }
            }
            ?>
            <?php
        }
        public function notificaciones(){
            $chat_m=$this->load_model("Chat_m");
            $idusu=$_SESSION['usuario']['tipo']=="A" ? "%%" : $_SESSION['usuario']['id'];
            $admin=$_SESSION['usuario']['tipo']=="A" ? 0 : 1;
            $notificaciones=$chat_m->notificaciones($idusu,$admin);
            if(!$notificaciones[0]['suma']==0){
                echo $notificaciones[0]['suma'];
            }
        }
}
?>