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
    include_once(DIR_FUNCTIONS . "c_esAdmin.php");
    class ModificarUsuario implements Modificar {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna, tiene que ser admin o duegno del objeto
            return true;
        }

        public static function modificar(PDO $conexion, $uuid, $contrasegna, $correo, $objetoNuevo) {
            try {
                $usuarioOriginal = LeerUsuario::iniciarSesion($conexion, $correo, $contrasegna);
                if (!esAdmin() && !password_verify($contrasegna, $usuarioOriginal->getContrasegna())) {
                    throw new Exception("No estas autorizado");
                }

                $nuevoNombre = $objetoNuevo["nombre"] === "" || $objetoNuevo["nombre"] === null ? $usuarioOriginal->getNombre() : $objetoNuevo["nombre"];
                $nuevoCorreo = $objetoNuevo["correo"] === "" || $objetoNuevo["correo"] === null ? $usuarioOriginal->getCorreo() : $objetoNuevo["correo"];
                $nuevaContrasegna = $objetoNuevo["contrasegna"] === "" || $objetoNuevo["contrasegna"] === null ? $usuarioOriginal->getContrasegna() : $objetoNuevo["contrasegna"];

                $preparada = $conexion->prepare(UtilidadesDB::$actualizarUsuarioPorUuid);
                $preparada->bindValue('uuid',$uuid);
                $preparada->bindValue('nombre',$nuevoNombre);
                $preparada->bindValue('correo',$nuevoCorreo);
                $preparada->bindValue('contrasegna',$nuevaContrasegna);
                $preparada->execute();
                if ($preparada->execute()) {
                    return new Usuario($nuevoNombre, $nuevoCorreo, $nuevaContrasegna, $uuid, $usuarioOriginal->getFechaCreado(), $usuarioOriginal->getEsAdmin(), $usuarioOriginal->getUrlFoto());
                }
            } catch (Exception $e) {
                return null;
            }
            return null;
        }
        
        public static function modificarFoto(PDO $conexion, $uuid, $contrasegna, $correo, $fotoNueva) {
            try {
                $usuarioOriginal = LeerUsuario::iniciarSesion($conexion, $correo, $contrasegna);
                if (!esAdmin() && !password_verify($contrasegna, $usuarioOriginal->getContrasegna())) {
                    throw new Exception("No estas autorizado");
                }

                $fotoNueva = $fotoNueva === "" || $fotoNueva === null ? $usuarioOriginal->getUrlFoto() : $fotoNueva;

                $preparada = $conexion->prepare(UtilidadesDB::$actualizarUsuarioFotoPorUuid);
                $preparada->bindValue('uuid',$uuid);
                $preparada->bindValue('urlFoto',$fotoNueva);
                $preparada->execute();
                if ($preparada->execute()) {
                    return true;
                }
            } catch (Exception $e) {
                return false;
            }
            return false;
        }
    }