<?php
    namespace Controllers;
    use Exception;
    use Models\Encuesta;
    use Models\Usuario;
    use Models\Respuesta;
    use Controllers\Interfaces\Leer;
    use \PDO;
    use Controllers\UtilidadesDB;
    
    class LeerUsuario implements Leer {
        public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool {
            //el usuario existe y esa es su contrasegna (los usuarios son todos publicos)
            return true;
        }

        public static function leer(PDO $conexion, $uuid) {
            try {
                $preparada = $conexion->prepare(UtilidadesDB::$getUsuarioPorUuid);
                $preparada->bindValue('uuid',$uuid);
                $preparada->execute();
                $resultado = $preparada->fetchAll(PDO::FETCH_ASSOC)[0] ?? null;
                return new Usuario($resultado['nombre'] ?? null,  $resultado['correo'] ?? null, $resultado['contrasegna'] ?? null, $resultado['uuid'] ?? null, $resultado['fechaCreado'] ?? null, $resultado["esAdmin"], $resultado["urlFoto"]);
            } catch (Exception $e) {
                return null;
            }
        }

        public static function iniciarSesion(PDO $conexion, $correo, $contrasegna) {
            try {
                $preparada = $conexion->prepare(UtilidadesDB::$getUsuarioPorCorreo);
                $preparada->bindValue('correo',$correo);
                $preparada->execute();
                $resultado = $preparada->fetchAll(PDO::FETCH_ASSOC)[0] ?? null;
                if ($resultado === null) {
                    return null;
                }
                if (password_verify($contrasegna, $resultado['contrasegna'])) {
                    //$nombre, $correo, $contrasegna = "", $uuid = "", $fechaCreado = "", $esAdmin = 'n', $urlFoto = ""
                    //return new Usuario($resultado['nombre'], $resultado['correo'], $resultado['contrasegna'], $resultado['uuid'], $resultado['fechaCreado'], $resultado['esAdmin'], $resultado['urlFoto']);
                    return new Usuario(nombre: $resultado['nombre'] ?? null,  correo: $resultado['correo'] ?? null, contrasegna: $resultado['contrasegna'] ?? null, uuid: $resultado['uuid'] ?? null, fechaCreado: $resultado['fechaCreado'] ?? null, esAdmin:$resultado['esAdmin'] ?? 'n', urlFoto:$resultado['urlFoto']);
                }
                return null;
            } catch (Exception $e) {
                return null;
            }
        }
    
        public static function leerTodos(PDO $conexion): array {
            //igual que leer pero con todos, si es admin ademas ve respuestas y encuestas
            return [];
        }
    }