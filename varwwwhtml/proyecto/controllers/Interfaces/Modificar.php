<?php

namespace Controllers\Interfaces;
//Metodos necesarios para modificar o reemplazar objetos
interface Modificar {
    public static function autorizarAccion($usuario, $contrasegna): bool;
    public static function modificar($uuid, $objetoNuevo);
}