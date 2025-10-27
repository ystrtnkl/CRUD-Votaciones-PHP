<?php

namespace Controllers\Interfaces;
//Metodos necesarios para borrar objetos
interface Borrar {
    public static function autorizarAccion($usuario, $contrasegna): bool;
    public static function borrar($uuid, $contrasegna): bool;
}