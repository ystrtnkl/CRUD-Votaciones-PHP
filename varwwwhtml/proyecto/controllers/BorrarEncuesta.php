<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Borrar;
    use Controllers\EjecutarConsulta;
    class BorrarEncuesta implements Borrar {
        public static function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, tiene que ser admin o duegno del objeto
            return true;
        }

        public static function borrar($uuid, $contrasegna): bool {
            //borrar la encuesta y sus respuestas asociadas
            return true;
        }
    

    }