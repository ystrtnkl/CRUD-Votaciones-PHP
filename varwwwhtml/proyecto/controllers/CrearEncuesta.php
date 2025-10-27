<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Crear;
    use Controllers\EjecutarConsulta;
    class CrearEncuesta implements Crear {
        public static function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna
            return true;
        }

        public static function crear($encuesta) {
            //crea la encuesta con el usuario como duegno
            return $encuesta;
        }
    

    }