<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Borrar;
    use \PDO;
    use Controllers\UtilidadesDB;
    use Controllers\LeerUsuario;
    include_once(DIR_FUNCTIONS . "c_esAdmin.php");
    class BorrarUsuario implements Borrar {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, tiene que ser admin o duegno del objeto
            return true;
        }

        public static function borrar(PDO $conexion, $uuid, $contrasegna, $correo): bool {
            try {
                $usuario = LeerUsuario::iniciarSesion($conexion, $correo, $contrasegna);
                if (!esAdmin() && !password_verify($contrasegna, $usuario->getContrasegna())) {
                    throw new Exception("No estas autorizado");
                }
                $preparada = $conexion->prepare(UtilidadesDB::$borrarUsuarioPorUuid);
                $preparada->bindValue('uuid',$uuid);
                $preparada->execute();
                if ($preparada->execute()) {
                    return true;
                }
            } catch (Exception $e) {
                echo $e;
                return false;
            }
            //borrar el usuario y sus encuestas y respuestas asociadas
            return false;
        }
    

    }