<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Modificar;
    use \PDO;
    use Controllers\UtilidadesDB;
    class ModificarUsuario implements Modificar {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, tiene que ser admin o duegno del objeto
            return true;
        }

        public static function modificar(PDO $conexion, $uuid, $usuarioNuevo) {
            //modifica datos basicos del usuario, y comprobar que la imagen este guardada
            return true;
        }
        
        public static function modificarDatos(PDO $conexion, $uuid, $nombre, $correo, $contrasegna, $urlFoto) {
            //modifica solo los datos presentes
            $nombre = "hola"; $correo = "hola@hola.com"; $contrasegna = "a9sd8f793";
            return new Usuario($nombre, $correo, $contrasegna, $uuid);
            //FOTO

        }

    }