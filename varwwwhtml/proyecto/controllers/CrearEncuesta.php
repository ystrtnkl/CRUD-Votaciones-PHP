<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Crear;
    use \PDO;
    use Controllers\UtilidadesDB;
    class CrearEncuesta implements Crear {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna
            return true;
        }

        public static function crear(PDO $conexion, $encuesta) {
            //crea la encuesta con el usuario como duegno
            return $encuesta;
        }
    

    }