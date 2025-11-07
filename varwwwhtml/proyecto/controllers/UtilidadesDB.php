<?php
namespace Controllers;
use \PDO;

class UtilidadesDB {

    //Consultas ya escritas
    public static $getTodosLosUsuarios = "SELECT * FROM USUARIOS;";
    public static $crearUsuario = "INSERT INTO USUARIO (uuid, nombre, correo, contrasegna, fechaCreado, esAdmin, urlFoto) VALUES (:uuid, :nombre, :correo, :contrasegna, :fechaCreado, 'n', :urlFoto);";
    public static $getUsuarioPorUuid = "SELECT * FROM USUARIO WHERE uuid = :uuid;";
    public static $borrarUsuarioPorUuid = "DELETE FROM USUARIO WHERE uuid = :uuid;";
    public static $actualizarUsuarioPorUuid = "UPDATE USUARIO SET nombre = :nombre, correo = :correo, contrasegna = :contrasegna WHERE uuid = :uuid;";
    public static $actualizarUsuarioFotoPorUuid = "UPDATE USUARIO SET urlFoto = :urlFoto WHERE uuid = :uuid;";
    public static $getUsuarioPorCorreo = "SELECT * FROM USUARIO WHERE correo = :correo;";

    //Devuelve una conexion PDO a MariaDB
    public static function getConexion($host = "mariadb-cont", $base = MARIADB_DATABASE, $usuario = MARIADB_USER, $contrasegna = MARIADB_PASSWORD): PDO | bool {
        $conexion = false;
        try {
            $conexion = new PDO("mysql:host=" . $host . ";dbname=" . $base, $usuario, $contrasegna);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $error){
            echo $error;
            return false;
        }
        return $conexion;
    }
}