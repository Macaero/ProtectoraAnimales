<?php
Class Adopciones_m extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertar($fecha,$idusu,$idanim){
        $cadSQL="INSERT INTO adopciones (fecha, idusu, idanim) VALUES ('$fecha', $idusu, $idanim)";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function mostrar(){
        $cadSQL="SELECT * FROM adopciones";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function verAdopciones(){
        $cadSQL="SELECT * FROM vista_adopcionesanimales WHERE principal=1";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function verUsuarioAdopcion($idanim){
        $cadSQL="SELECT idusu FROM adopciones WHERE idanim=$idanim";
        $this->consultar($cadSQL);
        return $this->fila(); 
    }
    public function verId($idanim){
        $cadSQL="SELECT id FROM adopciones WHERE idanim=$idanim";
        $this->consultar($cadSQL);
        return $this->fila(); 
    }
    public function datosAdopciones(){
        $cadSQL="SELECT * FROM vista_adopcionesanimales where principal=1";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
}
?>