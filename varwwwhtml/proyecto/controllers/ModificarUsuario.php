<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Modificar;
    use \PDO;
    use Controllers\UtilidadesDB;
    use Controllers\LeerUsuario;
    class ModificarUsuario implements Modificar {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, tiene que ser admin o duegno del objeto
            return true;
        }

        public static function modificar(PDO $conexion, $uuid, $contrasegna, $correo, $objetoNuevo) {
            try {
                $usuarioOriginal = LeerUsuario::iniciarSesion($conexion, $correo, $contrasegna);
                if ($_SESSION['esAdmin'] !== 's' && !password_verify($contrasegna, $usuarioOriginal->getContrasegna())) {
                    throw new Exception("No estas autorizado");
                }

                $nuevoNombre = $objetoNuevo->getNombre() === "" || $nuevoNombre === null ? "" : $nuevoNombre;

                $preparada = $conexion->prepare(UtilidadesDB::$actualizarUsuarioPorUuid);
                $preparada->bindValue('uuid',$uuid);
                $preparada->bindValue('nombre',$nombre);
                $preparada->bindValue('correo',$uuid);
                $preparada->bindValue('contrasegna',$uuid);
                $preparada->execute();
                if ($preparada->execute()) {
                    return true;
                }
            } catch (Exception $e) {
                return false;
            }
            //borrar el usuario y sus encuestas y respuestas asociadas
            return false;
        }
        
        public static function modificarFoto(PDO $conexion, $uuid, $contrasegna, $correo, $fotoNueva) {
            
            return true;
        }
    }