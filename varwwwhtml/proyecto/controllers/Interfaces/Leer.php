<?php

namespace Controllers\Interfaces;

interface Leer {
    public static function autorizarAccion($usuario, $contrasegna): bool;
    public static function leer($uuid);
    public static function leerTodos(): array;
}