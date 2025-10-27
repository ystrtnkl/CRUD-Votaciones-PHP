<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Modificar;
    use Controllers\EjecutarConsulta;
    class ModificarUsuario implements Modificar {
        public static function autorizarAccion($usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, tiene que ser admin o duegno del objeto
            return true;
        }

        public static function modificar($uuid, $usuarioNuevo): bool {
            //modifica datos basicos del usuario, y comprobar que la imagen este guardada
            return true;
        }
        
        public static function modificarDatos($uuid, $nombre, $correo, $contrasegna, $urlFoto): bool {
            //modifica solo los datos presentes
            return true;
        }

    }