<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Leer;
    class LeerEncuesta implements Leer {
        public function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, y es admin o duegno del objeto
            return true;
        }

        public function leer($id) {
            //los datos de la encuesta con ese id y sus respuestas
            return $id;
        }
    
        public function leerTodos(): array {
            //igual que leer pero con todos, solo si es admin
            return [];
        }
    }