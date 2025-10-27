<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Leer;
    use Controllers\EjecutarConsulta;
    class LeerUsuario implements Leer {
        public static function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna (los usuarios son todos publicos)
            return true;
        }

        public static function leer($uuid) {
            //datos del usuario y posiblemente sus encuestas y respuestas dependiendo de autorizaciones
            //ejemplo 6b1f208d-b7ae-4bf0-b719-26ff92fc9648
            return new Usuario("hola",  "hola@hola.com", "a9sd8f793", $uuid);
        }

        public static function iniciarSesion($correo, $contrasegna) {
            //decodificar contrasegna y comparar
            return new Usuario("hola", $correo, $contrasegna, );
        }
    
        public static function leerTodos(): array {
            //igual que leer pero con todos, si es admin ademas ve respuestas y encuestas
            return [];
        }
    }