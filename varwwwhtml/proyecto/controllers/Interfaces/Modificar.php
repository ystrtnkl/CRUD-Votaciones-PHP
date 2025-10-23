<?php

namespace Controllers\Interfaces;

interface Modificar {
    public static function autorizarAccion($usuario, $contrasegna): bool;
    public static function modificar($uuid, $objetoNuevo);
}