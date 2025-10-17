<?php

namespace Controllers\Interfaces;

interface Crear {
    public function autorizarAccion($usuario, $contrasegna): bool;
    public function crear($objeto);
}