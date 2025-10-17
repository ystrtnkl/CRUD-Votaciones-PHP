<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Crear;
    class CrearEncuesta implements Crear {
        public function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna
            return true;
        }

        public function crear($encuesta) {
            //crea la encuesta con el usuario como duegno
            return $encuesta;
        }
    

    }