<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Crear;
    use \PDO;
    use Controllers\UtilidadesDB;
    class CrearUsuario implements Crear {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario no existe aun, solo se validan los datos
            return true;
        }

        public static function crear(PDO $conexion, $usuario) {
            try {
                $preparada = $conexion->prepare(UtilidadesDB::$crearUsuario);
                $preparada->bindValue('uuid',$usuario->getUuid());
                $preparada->bindValue('nombre',$usuario->getNombre());
                $preparada->bindValue('correo',$usuario->getCorreo());
                $preparada->bindValue('contrasegna',$usuario->getContrasegna());
                $preparada->bindValue('fechaCreado', (string) time());
                $preparada->bindValue('urlFoto', '');
                if ($preparada->execute()) {
                    return $usuario->getUuid();
                }
                return null;
            } catch (Exception $e) {
                return null;
            }
        }
    

    }