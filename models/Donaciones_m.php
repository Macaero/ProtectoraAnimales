<?php
class Donaciones_m extends Model{
    public function insertar($idusu,$fecha,$importe){
        $cadSQL="INSERT INTO donaciones (idusu, fecha, importe) VALUES ($idusu, '$fecha', '$importe')";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function verDonaciones($idusu){
        $cadSQL="SELECT * FROM donaciones WHERE idusu=$idusu";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
}
?>