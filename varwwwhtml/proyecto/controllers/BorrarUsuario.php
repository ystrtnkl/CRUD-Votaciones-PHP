<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Borrar;
    class BorrarUsuario implements Borrar {
        public static function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, tiene que ser admin o duegno del objeto
            return true;
        }

        public static function borrar($uuid): bool {
            //borrar el usuario y sus encuestas y respuestas asociadas
            return true;
        }
    

    }