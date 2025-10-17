<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    class EjecutarConsulta {
        public function ejecutar($consulta): bool {
            //conectar con la base de datos y ejecutar la consulta, si la consulta no es maliciosa
            return $this->comprobar($consulta);
        }

        public function comprobar($consulta): bool {

            return true;
        }
    

    }