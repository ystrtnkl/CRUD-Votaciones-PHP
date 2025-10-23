<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    class EjecutarConsulta {
        public static function ejecutar($consulta): bool {
            //conectar con la base de datos y ejecutar la consulta, si la consulta no es maliciosa
            return EjecutarConsulta::comprobar($consulta);
        }

        public static function comprobar($consulta): bool {

            return true;
        }
    

    }