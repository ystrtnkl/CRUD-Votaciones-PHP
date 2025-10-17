<?php

namespace Controllers\Interfaces;

interface Borrar {
    public function autorizarAccion($usuario, $contrasegna): bool;
    public function borrar($uuid): bool;
}