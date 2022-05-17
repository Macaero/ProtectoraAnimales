<?php
Class Animales_m extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertar($datos){
        // Recibimos los datos del formulario en un array
        // Obtenemos cadena con las columnas desde las claves del array asociativo
        $columnas=implode(",",array_keys($datos)); 
        // Campos de columnas
        $campos=array_map(
            function($col){
                return ":".$col;
            },array_keys($datos));
        $parametros=implode(",",$campos); // Parametros para enlazar
        $cadSQL="INSERT INTO animales ($columnas) VALUES ($parametros)";
        $this->consultar($cadSQL);   // Preparar sentencia
        for($ind=0;$ind<count($campos);$ind++){    // Enlace de parametros
            $this->enlazar($campos[$ind],$datos[array_keys($datos)[$ind]]);
        }
        return $this->ejecutar();
    }
    public function mostrar(){
        $cadSQL="SELECT * FROM animales ORDER BY 1";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function editarAnimal($datos){
        $columnas=implode(",",array_keys($datos)); 
        // Campos de columnas
        $campos=array_map(
            function($col){
                return ":".$col;
            },array_keys($datos));
        $cadSQL="UPDATE animales SET ";
        // Poner todos los campos y parametros
        for($ind=0;$ind<count($campos);$ind++){
            $cadSQL.=array_keys($datos)[$ind]."=".$campos[$ind].",";
        }
        $cadSQL=substr($cadSQL,0,strlen($cadSQL)-1); // quitar la ultima coma
        $cadSQL.=" WHERE nombre='$datos[nombre]'"; // Añadir el WHERE
        $this->consultar($cadSQL);   // Preparar sentencia
        for($ind=0;$ind<count($campos);$ind++){    // Enlace de parametros
            $this->enlazar($campos[$ind],$datos[array_keys($datos)[$ind]]);
        }
        return $this->ejecutar();
    }
    public function borrar($id){
        $cadSQL="DELETE FROM animales WHERE id='$id'";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function leerAnimal($id){
        $cadSQL="SELECT * FROM animales WHERE id='$id'";
        $this->consultar($cadSQL);
        return $this->fila();
    }
    public function leerImagenes($idanim){
        $cadSQL="SELECT * FROM animales_imagenes WHERE idanim='$idanim'";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function insertarImagen($idanim,$ruta,$principal){
        $cadSQL="INSERT INTO animales_imagenes VALUES (NULL,$idanim,'$ruta',$principal)";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function verUltId(){
        $cadSQL="SELECT MAX(id) FROM animales";
        $this->consultar($cadSQL);
        return $this->resultado(); 
    }
    public function verAnimales(){
        $cadSQL="SELECT * FROM vista_animalesimagenes WHERE principal=1 AND adoptado=0";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function mostrarAnimal($id){
        $cadSQL="SELECT * FROM vista_animalesimagenes WHERE id='$id'";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function busqueda($tipo,$raza,$sexo,$edad){
        $cadSQL="SELECT * FROM vista_animalesimagenes WHERE principal=1 AND adoptado=0 AND tipo LIKE '$tipo' AND raza LIKE '$raza' AND sexo LIKE '$sexo' AND edad <= '$edad'";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function adoptar($id){
        $cadSQL="UPDATE animales SET adoptado=1 WHERE id=$id";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function verNombre($id){
        $cadSQL="SELECT nombre FROM animales WHERE id=$id";
        $this->consultar($cadSQL);
        return $this->fila();
    }
}
?>