<?php
class Chat_m extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function mostrar(){
        $cadSQL="SELECT * FROM chat";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function insertar($idusu,$fecha,$mensaje,$admin){
        $cadSQL="INSERT INTO chat (idusu, fecha, mensaje, admin) VALUES ($idusu, '$fecha', '$mensaje', $admin)";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function leerMensaje($idusu,$admin){
        $cadSQL="UPDATE chat SET leido=1 WHERE idusu=$idusu AND admin=$admin";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function notificaciones($idusu,$admin){
        $cadSQL="SELECT COUNT(id) AS suma FROM chat WHERE leido=0 AND idusu LIKE '$idusu' AND admin=$admin";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
}
?>