<?php

namespace Controllers\Interfaces;

interface Modificar {
    public function autorizarAccion($usuario, $contrasegna): bool;
    public function modificar($uuid, $objetoNuevo);
}