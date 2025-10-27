<?php

namespace Controllers\Interfaces;
//Metodos necesarios para crear objetos
interface Crear {
    public static function autorizarAccion($usuario, $contrasegna): bool;
    public static function crear($objeto);
}