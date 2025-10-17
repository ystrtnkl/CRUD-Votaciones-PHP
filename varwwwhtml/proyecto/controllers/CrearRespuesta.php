<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Crear;
    class CrearRespuesta implements Crear {
        public function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, si no es admin tiene que estar autorizado para responder
            return true;
        }

        public function crear($respuesta) {
            //crea la respuesta asociada a la encuesta y al usuario que la hizo
            return $respuesta;
        }
    

    }