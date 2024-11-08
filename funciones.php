<?php
    session_start();
    class Conexion{
        public $host= 'localhost';
        public $usuario= 'root';
        public $contrasena = '';
        public $nombreBaseDatos = "sistema_cliente_bd";
        public $conexion;

        public function _construct(){
        $this->conexion = mysqli_connect(
            $this->host,
            $this->usuario,
            $this->contrasena,
            $this->nombreBaseDatos
        );
    }
}

class Inicio_sesion extends Conexion{
    public $id;

    public function InicioSesion($nombrUsuario_Correo, $contrasena)
    {
        $consultaSql = mysqli_query($this->conexion,
        "SELECT * FROM cliente WHERE nombreUsuario = '$nombrUsuario_Correo' OR correoElectronico = '$nombrUsuario_Correo'");

        $columna = mysqli_fetch_assoc($consultaSql);

        if (mysqli_num_rows($consultaSql) > 0){
            if ($contrasena == $columna['contrasena'] ){
                $this->id = $columna['id'];
                return 1;
            }else{
                return 10;
            }
        }else{
            return 100;
        }
    }
    public function IdUsuario(){
        return $this->id;
    }
}

class Seleccion extends Conexion{
    public function SelectuserByUser($id){
        $resultado = mysqli_query($this->conexion, "SELECT * FROM cliente WHERE id= '$id'");
        return mysqli_fetch_assoc($resultado);
    }
}

class Registro extends Conexion{
    public function registrarse($nombreCompleto, $nombreUsuario, $correoElectronico, $contrasena, $confirmContrasena){
        $usuarioExiste = mysqli_query(
            $this->conexion, "SELECT * FROM cliente WHERE nombreUSuario = '$nombreUsuario' OR correoElectronico = '$correoElectronico'"
        );
        if (mysqli_num_rows($usuarioExiste) > 0){
            return 10;
        }else {
            if ($contrasena == $confirmContrasena){
                $consultaSqlRegistro = "INSERT INTO cliente VALUES ('','$nombreCompleto','$nombreUsuario','$correoElectronico','$contrasena')";
            
                mysqli_query($this-> conexion, $consultaSqlRegistro);
                return 1;
            }else{
                return 100;
            }
        }
    }
}

?>