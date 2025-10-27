<?php

namespace Controllers\Interfaces;
//Metodos necesarios para leer 1 o varios objetos
interface Leer {
    public static function autorizarAccion($usuario, $contrasegna): bool;
    public static function leer($uuid);
    public static function leerTodos(): array;
}