<?php

namespace Controllers\Interfaces;
use \PDO;
//Metodos necesarios para modificar o reemplazar objetos
interface Modificar {
    public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool;
    public static function modificar(PDO $conexion, $uuid, $objetoNuevo);
}