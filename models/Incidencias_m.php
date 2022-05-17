<?php
Class Incidencias_m extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function mostrar($id){
        $cadSQL="SELECT * FROM incidencias WHERE idadopcion=$id ORDER BY id DESC";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function insertar($idAdop,$fecha,$incidencia){
        $cadSQL="INSERT INTO incidencias (idadopcion, fecha, incidencia) VALUES ($idAdop, '$fecha', '$incidencia')";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function mostrarTodo(){
        $cadSQL="SELECT * FROM incidencias ORDER BY id DESC";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
}
?>