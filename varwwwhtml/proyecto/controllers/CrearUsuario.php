<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Crear;
    use \PDO;
    use Controllers\UtilidadesDB;
    class CrearUsuario implements Crear {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario no existe aun, solo se validan los datos
            return true;
        }

        public static function crear(PDO $conexion, $usuario) {
            //crea el usuario si es valido
            return $usuario;
        }
    

    }