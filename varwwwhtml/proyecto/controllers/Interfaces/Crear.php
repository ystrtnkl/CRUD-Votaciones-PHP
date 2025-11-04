<?php

namespace Controllers\Interfaces;
use \PDO;
//Metodos necesarios para crear objetos
interface Crear {
    public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool;
    public static function crear(PDO $conexion, $objeto);
}