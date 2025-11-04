<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Crear;
    use \PDO;
    use Controllers\UtilidadesDB;
    class CrearRespuesta implements Crear {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, si no es admin tiene que estar autorizado para responder
            return true;
        }

        public static function crear(PDO $conexion, $respuesta) {
            //crea la respuesta asociada a la encuesta y al usuario que la hizo
            return $respuesta;
        }
    

    }