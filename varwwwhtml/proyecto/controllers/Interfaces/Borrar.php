<?php

namespace Controllers\Interfaces;
use \PDO;
//Metodos necesarios para borrar objetos
interface Borrar {
    public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool;
    public static function borrar(PDO $conexion, $uuid, $contrasegna, $correo): bool;
}