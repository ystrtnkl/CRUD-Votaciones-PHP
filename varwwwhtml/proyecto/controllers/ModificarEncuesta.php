<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Modificar;
    use \PDO;
    use Controllers\UtilidadesDB;
    class ModificarEncuesta implements Modificar {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, tiene que ser admin o duegno del objeto
            return true;
        }

        public static function modificar(PDO $conexion, $id, $encuestaNueva): bool {
            //modifica datos basicos de la encuesta
            return true;
        }

    }