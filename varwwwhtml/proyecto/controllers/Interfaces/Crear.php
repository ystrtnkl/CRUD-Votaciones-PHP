<?php

namespace Controllers\Interfaces;

interface Crear {
    public static function autorizarAccion($usuario, $contrasegna): bool;
    public static function crear($objeto);
}