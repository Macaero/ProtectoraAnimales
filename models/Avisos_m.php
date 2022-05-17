<?php
class Avisos_m extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function mostrar(){
        $cadSQL="SELECT * FROM vista_avisosusuarios WHERE resuelta=0 ORDER BY id DESC";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function insertar($idusu,$fecha,$mensaje){
        $cadSQL="INSERT INTO avisos (idusu, fecha, mensaje) VALUES ($idusu, '$fecha', '$mensaje')";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function resolver($id){
        $cadSQL="UPDATE avisos SET resuelta=1 WHERE id=$id";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
}
?>