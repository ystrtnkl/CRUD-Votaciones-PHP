<?php

namespace Controllers\Interfaces;

interface Borrar {
    public static function autorizarAccion($usuario, $contrasegna): bool;
    public static function borrar($uuid, $contrasegna): bool;
}