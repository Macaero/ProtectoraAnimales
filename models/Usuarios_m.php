<?php
Class Usuarios_m extends Model{
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
        $cadSQL="INSERT INTO usuarios ($columnas) VALUES ($parametros)";
        $this->consultar($cadSQL);   // Preparar sentencia
        for($ind=0;$ind<count($campos);$ind++){    // Enlace de parametros
            $this->enlazar($campos[$ind],$datos[array_keys($datos)[$ind]]);
        }
        return $this->ejecutar();
    }
    public function mostrar(){
        $cadSQL="SELECT * FROM usuarios ORDER BY 1";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function comprobarUsuario($nusuemail){
        $cadSQL="SELECT * FROM usuarios WHERE nusuario=:nusuemail OR email=:nusuemail";
        $this->consultar($cadSQL);
        $this->enlazar(":nusuemail",$nusuemail);
        return $this->fila();
    }
    public function activarUsuario($token){
        $cadSQL="UPDATE usuarios SET activo=1 WHERE token='$token'";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function leerUsuario($nusuario){
        $cadSQL="SELECT * FROM usuarios WHERE nusuario='$nusuario'";
        $this->consultar($cadSQL);
        return $this->fila();
    }
    public function leerEmail($email){
        $cadSQL="SELECT * FROM usuarios WHERE email='$email'";
        $this->consultar($cadSQL);
        return $this->fila();
    }
    public function editarUsuario($datos){
        $columnas=implode(",",array_keys($datos)); 
        // Campos de columnas
        $campos=array_map(
            function($col){
                return ":".$col;
            },array_keys($datos));
        $cadSQL="UPDATE usuarios SET ";
        // Poner todos los campos y parametros
        for($ind=0;$ind<count($campos);$ind++){
            $cadSQL.=array_keys($datos)[$ind]."=".$campos[$ind].",";
        }
        $cadSQL=substr($cadSQL,0,strlen($cadSQL)-1); // quitar la ultima coma
        $cadSQL.=" WHERE nusuario='$datos[nusuario]'"; // Añadir el WHERE
        $this->consultar($cadSQL);   // Preparar sentencia
        for($ind=0;$ind<count($campos);$ind++){    // Enlace de parametros
            $this->enlazar($campos[$ind],$datos[array_keys($datos)[$ind]]);
        }
        return $this->ejecutar();
    }
    public function borrar($id){
        $cadSQL="DELETE FROM usuarios WHERE id='$id'";
        $this->consultar($cadSQL);
        return $this->ejecutar();
    }
    public function comprobarDatos($idusu){
        $cadSQL="SELECT * FROM usuarios WHERE id=$idusu AND (apenom='' OR nif='' OR dirPostal='' OR tel='')";
        $this->consultar($cadSQL);
        return $this->fila();
    }
    public function verNombre($id){
        $cadSQL="SELECT nusuario FROM usuarios WHERE id=$id";
        $this->consultar($cadSQL);
        return $this->fila();
    }

}
?>