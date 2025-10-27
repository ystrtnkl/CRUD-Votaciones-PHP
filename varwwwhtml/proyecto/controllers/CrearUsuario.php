<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Crear;
    use Controllers\EjecutarConsulta;
    class CrearUsuario implements Crear {
        public static function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario no existe aun, solo se validan los datos
            return true;
        }

        public static function crear($usuario) {
            //crea el usuario si es valido
            return $usuario;
        }
    

    }