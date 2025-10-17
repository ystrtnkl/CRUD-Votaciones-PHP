<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Leer;
    class LeerUsuario implements Leer {
        public function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna (los usuarios son todos publicos)
            return true;
        }

        public function leer($uuid) {
            //datos del usuario y posiblemente sus encuestas y respuestas dependiendo de autorizaciones
            return $uuid;
        }
    
        public function leerTodos(): array {
            //igual que leer pero con todos, si es admin ademas ve respuestas y encuestas
            return [];
        }
    }