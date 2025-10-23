<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Leer;
    class LeerRespuesta implements Leer {
        public static function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, y es admin o duegno de la encuesta o de la respuesta
            return true;
        }

        public static function leer($id) {
            //datos de la respuesta y su posible duegno
            return $id;
        }
    
        public static function leerTodos(): array {
            //igual que leer pero con todos, solo si es admin
            return [];
        }
    }