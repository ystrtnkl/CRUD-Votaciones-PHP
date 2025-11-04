<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Borrar;
    use \PDO;
    use Controllers\UtilidadesDB;
    class BorrarUsuario implements Borrar {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, tiene que ser admin o duegno del objeto
            return true;
        }

        public static function borrar(PDO $conexion, $uuid, $contrasegna): bool {
            //borrar el usuario y sus encuestas y respuestas asociadas
            return true;
        }
    

    }