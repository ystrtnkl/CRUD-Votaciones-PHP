<?php

namespace Controllers\Interfaces;
use \PDO;
//Metodos necesarios para leer 1 o varios objetos
interface Leer {
    public static function autorizarAccion(PDO $conexion, $usuario, $contrasegna): bool;
    public static function leer(PDO $conexion, $uuid);
    public static function leerTodos(PDO $conexion): array;
}